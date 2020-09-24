<?php

namespace App\Http\Middleware;

use Closure;

class RoleCek
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
        if($request->user()->id_jabatan)
        {
            return $next($request);
        }
        return '/';
    }
}
