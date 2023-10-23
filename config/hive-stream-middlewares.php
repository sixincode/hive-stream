<?php

use Laravel\Jetstream\Http\Middleware\AuthenticateSession;
use Sixincode\HiveStream\Http\Middleware\HiveStreamAuthenticated;
use Sixincode\HiveStream\Http\Middleware\HiveStreamApplyProfile;
use Sixincode\HiveStream\Http\Middleware\HiveStreamIsVerified;

return [
  // 'admin'           => ['auth:admin'],
  'central'         => ['web'],
  'user'            => ['web','auth:web',HiveStreamIsVerified::class,AuthenticateSession::class],
  'api'             => ['api'],
  'non_verified'    => ['web','auth:web'],
  'user_verified'   =>  HiveStreamApplyProfile::class,
  'hiveStreamAuth'  =>  HiveStreamAuthenticated::class,
];
