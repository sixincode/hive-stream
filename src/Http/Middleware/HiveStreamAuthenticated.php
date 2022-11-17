<?php

namespace Sixincode\HiveStream\Http\Middleware;

use Closure;

class HiveStreamAuthenticated extends Controller
{
  public function handle($request, Closure $next)
  {
    $response = $next($request);

    // Perform action

    return $response;
  }
}
