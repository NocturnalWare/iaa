<?php

namespace App\Http\Middleware;

use Closure;

class checkForGod
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
        if(\App\Utilities\Utility::findGod() === true){
            return $next($request);
        }

        return redirect()->back();
    }
}
