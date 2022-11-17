<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Sessions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }

    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('email')) {
            // user value cannot be found in session
            return redirect('login');
        }

        return $next($request);
    }
}
