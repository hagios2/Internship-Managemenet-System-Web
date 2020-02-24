<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfMainCordinator
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'main_cordinator')
	{
	    if (Auth::guard($guard)->check()) {
	        return redirect('/main-cordinator/dashboard');
	    }

	    return $next($request);
	}
}