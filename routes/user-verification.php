<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveStream\Http\Controllers\User as Controllers;

Route::middleware(
  config('hive-stream-middlewares.non_verified', ['web','auth:web'])
)->name('verification.')->group(function () {

  // Route::get('/email/verify', [Controllers\VerifyEmailController::class, 'verifyPage'])
  //      ->name('notice');
  // Route::get('/email/verify/check/{token}', [Controllers\VerifyEmailController::class, 'checkTokenPage'])
  //      ->name('verify.token');

});
