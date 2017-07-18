<?php

namespace App;

use App\Member;
use App\Level;
use App\Compensation;

class Utils{

    private $level_count = array();

    public static function get_member_id(){
        return 'NEO' . date('dmyHis');
    }

    public static function upgrade_member(Member $member){
        $next_level = Level::where('number', $member->level->number + 1)->first();
        if($next_level != null){
            $member->level_id = $next_level->id;
            $member->save();
            $has_compensation = Compensation::where('member_id', $member->user_id)->where('level_id', $next_level->id)->first() != null;
            if(!$has_compensation){
                $compensation = Compensation::create([
                    'level_id' => $next_level->id,
                    'member_id'=> $member->user_id
                ]);
                $compensation->save();
            }
        }
    }

    public static function get_children_count(Member $parent, int $step){
        $sum = 0;
        for($i = 1; $i <= $step; $i++){
            $sum += $parent->children()->count();
            if($step > 1){
                $parent->children()->each(function($child) use ($i, $sum){
                    $sum += Utils::get_children_count($child, $i - 1);
                });
            }
        }
        return $sum;
    }

    public static function get_expected_count(int $step){
        
        $numerator = pow(3, $step) - 1;
        if($step == 3)
        dd((3 * $numerator)/2);
        return (3 * $numerator)/2;
    }

    public function get_children_per_level(Member $parent, int $step = 1){
        $children = $parent->children();
        if($children->count() > 0){
            if(!array_key_exists($step, $this->level_count))
                $this->level_count[$step] = 0;
            $this->level_count[$step] += $children->count();
            $step++;
            $children->each(function($child) use ($step){
                $this->get_children_per_level($child, $step);
            });
        }
        return $this->level_count;
    }

}