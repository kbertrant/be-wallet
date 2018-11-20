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
            if(!Auth::user()->confirmed){
                return redirect('/login')->with('account_error', 'Your account isn\'t confirmed ! You can login');
            }
            return redirect('/home');
        }

        return $next($request);
    }
}
