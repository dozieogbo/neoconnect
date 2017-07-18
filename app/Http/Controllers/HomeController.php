<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Announcement;
use App\Country;
use App\State;
use App\Town;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
            return redirect()->route('user.dashboard');
        return view('home');
    }

    public function getannouncements(){
        $ann = Announcement::orderBy('created_at', 'asc')->take(5)->get();
        return response()->json($ann);
    }

    public function getcountries(){
        $country = Country::orderBy('name', 'asc')->get();;
        return response()->json($country);
    }

    public function getstates($id){
        $state = State::where('country_id', $id)->orderBy('name', 'asc')->get();;
        return response()->json($state);
    }

    public function getcities($id){
        $cities = Town::where('state_id', $id)->orderBy('name', 'asc')->get();;
        return response()->json($cities);
    }
}
