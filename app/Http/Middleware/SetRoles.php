<?php

namespace App\Http\Middleware;

use Closure;

class SetRoles
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
        \Session::set('roles', \Auth::user()->roles);
        \Session::set('profile', \Auth::user()->profile);
        

        return $next($request);
    }
}
