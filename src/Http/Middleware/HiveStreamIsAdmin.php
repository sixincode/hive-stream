<?php

namespace Sixincode\HiveStream\Http\Middleware;

use Closure;

class HiveStreamIsAdmin
{
  public function handle($request, Closure $next)
  {
    $response = $next($request);

    // Perform action

    return $response;
  }
}
