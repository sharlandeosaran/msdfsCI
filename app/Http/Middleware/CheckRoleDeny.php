<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoleDeny
{
	public function handle($request, Closure $next, $roles)
	{
		foreach (explode('.', $roles) as $role) {
			if ($request->user()->role->slug == $role) {
				return back()->with('flashed', 'Unauthorised to access that page!!');
			}
		}
		return $next($request);
	}
}
