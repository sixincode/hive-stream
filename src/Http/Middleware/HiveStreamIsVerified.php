<?php

namespace Sixincode\HiveStream\Http\Middleware;

use Closure;

class HiveStreamIsVerified
{
  public function handle($request, Closure $next)
  {
    $response = $next($request);

    // if(! auth()->check())
    // {
    //   return route('user.verification.pending');
    // }

    return $response;
  }
}
