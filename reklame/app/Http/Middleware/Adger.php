<?php

namespace App\Http\Middleware;

use App\Http\Middleware\Auth;
use Closure;
use App\User;

class Adger
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
        if($request->user()->level=="admin"||$request->user()->level=="manager"){
            return $next($request);
        }
        return redirect('/home');
    }
}
