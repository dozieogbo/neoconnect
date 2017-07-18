<?php

namespace App\Http\Controllers;

use App\Member;
use App\Level;
use App\MemberRegister;
use App\Compensation;
use App\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function dashboard(){
        $parent = Auth::user()->member->parent;
        $my_id = Auth::id();
        $downlines_count = Member::where('ancestors', 'like', "%{$my_id}%")->count();
        $upline_id = $parent == null ? "" : $parent->member_id;
        return view('user.dashboard', ['upline_id' => $upline_id, 'downlines_count' => $downlines_count]);
    }

    public function profile(){
        return view('user.profile');
    }

    public function editprofile(Request $request){
        $this->validate($request, [
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => ['required','string', 'email', 'max:255', 
                        Rule::unique('users')->ignore(Auth::id())],
            'phone_no' => ['required', 'regex:/^([0]\d{10})$/']
        ]);
        $user = Auth::user();
        $user->firstname = $request->firstname;
        $user->surname = $request->lastname;
        $user->middlename = $request->middlename;
        $user->lga_id = $request->lga_id;
        $user->phone_no = $request->phone_no;
        $user->email = $request->email;

        $user->save();
        return view('user.profile')->with('profile_success', true);
    }

    public function downline(){
        $user = Auth::user();
        $downlines = Member::where('ancestors', 'like', "%{$user->id}%")->with(['level'])->join('users', 'users.id', 'members.user_id')->orderBy('users.created_at', 'asc')->paginate(10);
        return view('user.downline', ['downlines' => $downlines]);
    }

    public function adddownline(Request $request){
        try{
        $this->validate($request, [
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone_no' => ['required', 'regex:/^([0]\d{10})$/'],
        ]);
        $sponsor_id = Auth::user()->member->member_id;
        $request['sponsor_id'] = $sponsor_id;
        $data = $request->all();
        $register = new MemberRegister();
        $user = $register->create_user($data);
            return view('user.createdownline', ['status' => 'success']);
        }catch(Exception $e){
            return view('user.createdownline', ['status' => 'failure']);
        }
    }

    public function downlineTree(){
        $user = Auth::user();
        $downlines = Member::where('parent_id', $user->id);
        return view('user.downline.tree', ['downlines' => $downlines, 'user' => $user]);
    }

    public function compensation(){
        $user = Auth::user();
        $compensations = Compensation::where('member_id', $user->id)->with(['member.user'])->join('levels', 'levels.id', 'compensations.level_id')->orderBy('levels.number', 'asc')->paginate(10);
        return view('user.compensation', ['compensations' => $compensations]);
    }

    public function get_level_counts(){
        $member = Auth::user()->member;
        $u = new Utils();
        $data = array();
        $level_array = $u->get_children_per_level($member);
        $levels = Level::orderBy('number', 'asc')->get();
        foreach($levels as $l){
            $data[] = ['name' => $l->name, 'percent' => array_key_exists($l->number, $level_array) ? round(($level_array[$l->number]/(3 * $l->number)) * 100) : 0];
        }
        return response()->json($data);
    }

    public function feedback(){
        return view('user.compensation');
    }
}
