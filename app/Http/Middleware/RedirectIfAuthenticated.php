<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            if($user->role !== 'admin' &&  $user->role !== 'superadmin') {
                return redirect()->intended('/user/dashboard');
            }else if($user->role === 'superadmin'){
                return redirect()->intended('/superadmin/dashboard'); 
            }else
                return redirect()->intended('/admin/dashboard');
        }

        return $next($request);
    }
}
