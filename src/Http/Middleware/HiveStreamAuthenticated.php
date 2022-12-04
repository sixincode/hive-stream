<?php

namespace Sixincode\HiveStream\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HiveStreamAuthenticated
{
  public function handle($request, Closure $next, ...$guards)
  {
    // $response = $next($request);
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
        if(Auth::guard($guard)->check()) {
            return $next($request);
        }
    }
    // if (auth()->check())
    // {
    //     if ($request->ajax())
    //     {
    //         return response('Unauthorized.', 401);
    //     }
    //     else
    //     {
    //         return redirect()->route('login');
    //     }
    // }
    // Perform action

    // return $response;
    return redirect()->route('login');
  }
}
