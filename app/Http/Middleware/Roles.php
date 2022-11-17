<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Roles
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

    public function handle($request, Closure $next,$roless)
    {
      $data=explode('|',$roless);

      foreach($data as $role) {
        // Check if user has the role This check will depend on how your roles are set up
        if($role==($request->session()->get('level')))
          return $next($request);
      }
      
      return redirect('home');
    }
}
