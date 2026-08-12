<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->utype === 'ADM'){   // auth()->check we can use it instead of Auth::check()
            return $next($request);
        }
        else{
            return redirect()->route('login')->with('error', 'You are not authorized to access this page');
        }
        
    }
}
