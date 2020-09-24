<?php

namespace App\Http\Middleware;

use App\Http\Middleware\Auth;
use Closure;
use App\User;
class AdminMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        if($request->user()->level==$role){
            return $next($request);
        }
        return redirect('/welcome');
    }
}
