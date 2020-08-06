<?php

namespace App\Http\Middleware;

use Closure;

class ActiveCheck
{
    public function handle($request, Closure $next)
    {
        if (!$request->user()->active) {
            \Auth::logout();
            return redirect('/admin/login')->with('inactive', 'That account is inactive.<br>Please contact the administrators.');
        }
        return $next($request);
    }
}
