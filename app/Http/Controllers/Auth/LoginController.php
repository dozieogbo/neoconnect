<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request, $user)
    {
        if($user->role !== 'admin' &&  $user->role !== 'superadmin') {
            if(!$user->is_active){
                Auth::logout();
                return redirect()->route('login')->withInput()->with('block', true);
            }
            return redirect()->intended('/user/dashboard');
        }else if($user->role === 'superadmin'){
            return redirect()->intended('/superadmin/dashboard');        
        }else
            return redirect()->intended('/admin/dashboard');
    }
}
