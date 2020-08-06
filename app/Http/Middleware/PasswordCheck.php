<?php

namespace App\Http\Middleware;

use Closure;

class PasswordCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::check() && password_verify('password', \Auth::user()->password)) {
            return redirect('/admin/profile')->with('flashed', 'Please change your password');
        }

        return $next($request);
    }
}
