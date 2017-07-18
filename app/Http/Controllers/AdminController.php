<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Level;
use App\Member;
use App\Announcement;
use App;
use Validator;

class AdminController extends Controller
{
    public function dashboard(){
        $levels = Level::orderBy('number', 'asc')->withCount('members')->get();
        $users_count = Member::count();
        return view('admin.dashboard', ['levels' => $levels, 'users_count' => $users_count]);
    }

    public function users(Request $request){
        $query = array_filter($request->only(['level', 'country', 'state']));
        $members = Member::with(['level'])->join('users', 'users.id', 'members.user_id')->orderBy('users.created_at', 'desc');
        if(array_key_exists('level', $query) && !empty($query['level']))
            $members = $members->join('levels', 'levels.id', 'members.level_id')->where('levels.name', $query['level']);
        if(array_key_exists('state', $query) && !empty($query['state']))
            $members = $members->join('lgas', 'lgas.id', 'members.users.lga_id')->join('states', 'states.id', 'lgas.state_id')->where('states.name', $query['state']);
        if(array_key_exists('country', $query) && !empty($query['country']))
            $members = $members->where('country', $query['country']);
        $members = $members->paginate(10);
        return view('admin.users', ['members' => $members, 'query' => $query]);
    }

    public function viewuser($id){
        $member = User::find($id);
        if($member == null)
            App::abort(404);
        return view('admin.user', ['member' => $member]);
    }

    public function changeuserstatus($id, $status){
        $member = User::find($id);
        if($member == null)
            App::abort(404);
        $member->is_active = $status == 'activate';
        $member->save();
        return back()->with(['user_status' => 'success', 'is_active' => $member->is_active]);
    }

    public function compensations(){
        $levels = Level::orderBy('number', 'asc')->get();
        return view('admin.compensation', ['levels' => $levels]);
    }

    public function update_compensations(Request $request){
        $validator = Validator::make($request->all(), [
            'level_id' => 'required',
            'compensation' => 'required'
        ]);

        if($validator->fails())
            return redirect()->route('admin.compensations')->with('status', 'failure');
        $level = Level::find($request['level_id']);
        if($level == null)
            return redirect()->route('admin.compensations')->with('status', 'failure');
        else{
            $level->rewards = $request['compensation'];
            $level->save();
            return redirect()->route('admin.compensations')->with('status', 'success');
        }
    }

    public function announcements(){
        $announcements = Announcement::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.announcements', ['announcements' => $announcements]);
    }

    public function create_announcement(Request $request){
        $this->validate($request, [
            'content' => 'required|string'
        ]);

        $ann = new Announcement();
        $ann->content = $request['content'];
        $ann->save();
        return view('admin.createannouncements')->with('status',  'succes');
    }
}
