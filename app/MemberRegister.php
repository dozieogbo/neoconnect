<?php

namespace App;

use App\User;
use App\Utils;
use App\Member;
use App\Level;
use Ds\Queue;
use Illuminate\Support\Facades\DB;

class MemberRegister{
    
    private $parents_map;
    private $parents_queue;

    public function __construct()
    {
        $this->parents_map = array();
    }

    public function create_user(array $data){
        $parent = $this->get_parent($data['sponsor_id']);
        $parent_id = $parent['user_id'];
        
        $user = new User([
            'firstname' => $data['firstname'],
            'surname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 'user',
            'phone_no' => $data['phone_no'],
            'lga_id' => $data['lga_id'],
            'country' => $data['country']
        ]);

        $member = new Member([
                'member_id' => Utils::get_member_id(),
                'level_id' => 1,
                'parent_id' => $parent_id
        ]);

        DB::transaction(function () use ($user, $member, $parent_id) {
            $user->save();
            $ancestors = $this->upgrade_then_get_parents($parent_id);
            $member['ancestors'] = implode(',', $ancestors);
            $user->member()->save($member);
        });

        return $user;
    }

    public function get_parent(string $sponsor_id){
        $parent = Member::where('member_id', $sponsor_id)->first();
        $this->parents_queue = new Queue();
        $this->parents_queue->push($parent);
        $this->parents_map[$parent->user_id] = $parent;
        while(true){
            if(count($this->parents_queue) == 0)
                break;
            $current = $this->parents_queue->pop();
            if($current->children()->count() == 3){
                $current->children()->each(function($child){
                    $this->parents_queue->push($child);
                    $this->parents_map[$child->user_id] = $child;
                });
            }else{
                $parent = $current;
                break;
            }
        }
        return $parent;
    }

    public function upgrade_then_get_parents(string $parentId){
        $id = $parentId; $step = 1;
        $ancestors = array();
        while($id != null){
            if(array_key_exists($id, $this->parents_map))
                $parent = $this->parents_map[$id];
            else
                $parent = Member::find($id);
            $ancestors[] = $parent->user_id;
            if($parent->children()->count() + ($step == 1 ? 1 : 0) == 3){
                if(Utils::get_children_count($parent, $step) + 1 == Utils::get_expected_count($step)){
                    Utils::upgrade_member($parent);
                    $id = $parent->parent_id;
                    $step++;
                }else
                    break;
            }else
                $id = $parent->parent_id;
        }
        return $ancestors;
    }

}