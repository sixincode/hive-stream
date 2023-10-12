<?php

use Laravel\Jetstream\Http\Middleware\AuthenticateSession;
use Sixincode\HiveStream\Http\Middleware\HiveStreamAuthenticated;
use Sixincode\HiveStream\Http\Middleware\HiveStreamApplyProfile;
use Sixincode\HiveStream\Http\Middleware\HiveStreamIsVerified;

return [
  // 'admin'           => ['auth:admin'],
  // 'user'            => ['auth'],
  'central'         => ['web'],
  'auth'            => ['auth:web', AuthenticateSession::class, 'verified' ],
  'api'             => ['api'],
  'non_verified'    => ['auth:web'],
  'user_verified'   =>  HiveStreamApplyProfile::class,
  'hiveStreamAuth'  =>  HiveStreamAuthenticated::class,
  // 'auth_session' => AuthenticateSession::class,

];
