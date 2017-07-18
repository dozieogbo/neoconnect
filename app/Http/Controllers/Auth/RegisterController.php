<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Member;
use App\Level;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Ds\Queue;
use App\Utils;
use App\MemberRegister;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
        'lga_id.required_if' => 'Please select an lga']
        ;
        return Validator::make($data, [
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'sponsor_id' => 'nullable|exists:members,member_id',
            'phone_no' => ['required', 'regex:/^([0]\d{10})$/'],
            'country' => ['required', 'exists:countries,id'],
            'lga_id' => ['required_if:country,566|exists:towns,id']
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $register = new MemberRegister();
        
        $user = $register->create_user($data);

        return $user;
    }

    protected function authenticated($request, $user)
    {
        if($user->role !== 'admin' &&  $user->role !== 'superadmin') {
            return redirect()->intended('/user/dashboard');
        }else if($user->role === 'superadmin'){
            return redirect()->intended('/superadmin/dashboard');        
        }else
            return redirect()->intended('/admin/dashboard');
    }

}
