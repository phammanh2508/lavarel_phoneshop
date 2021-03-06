<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Admin
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
        if(Auth::check() && Auth::user()->role==="Admin")
        {
            return $next($request);
        }
        elseif(Auth::check() && Auth::user()->role!=="Admin") {
            // Auth::logout();
            return redirect('/');
        }
        else{
            return redirect('/login');
        }
        
    }
}
