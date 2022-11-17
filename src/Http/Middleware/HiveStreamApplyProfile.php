<?php

namespace Sixincode\HiveStream\Http\Middleware;

use Closure;

class HiveStreamApplyProfile
{
  public function handle($request, Closure $next)
  {
    $response = $next($request);

    // Perform action

    return $response;
  }
}
