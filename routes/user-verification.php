<?php

use Illuminate\Support\Facades\Route;

Route::middleware(
  config('hive-stream-middlewares.non_verified', ['auth:web'])
)->group(function () {

  Route::get('/email/verify', [Controllers\VerifyEmailController::class, 'verifyPage'])
       ->name('verify');
  Route::get('/email/verify/check/{token}', [Controllers\VerifyEmailController::class, 'checkTokenPage'])
       ->name('verify.token');

});
