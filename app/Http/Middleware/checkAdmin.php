<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkAdmin
{

    public function handle($request, Closure $next)
    {
        if(Auth::user() && Auth::user()->role === "admin"){
            return $next($request);
        }else{
            // return redirect('/login');
            return redirect()->route('login');
        }

      

    }
}
