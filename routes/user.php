<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveStream\Http\Controllers\User as Controllers;
use Sixincode\HiveStream\Http\Livewire as Livewires;

Route::middleware(
    // array_values(array_filter([config('hive-stream-middlewares.auth', ['auth:web']),
    //                            config('hive-stream-middlewares.auth_session', ['auth:web'])
    //                           ]))
  config('hive-stream-middlewares.auth', ['auth:web'])
)->prefix(
  config('hive-stream-user.routes.prefix', 'home')
)->name('user.')->group(function () {

      Route::get('/',             [Controllers\HomeController::class, 'homePage'])->name('home');
      Route::get('/profile',      [Controllers\HomeController::class, 'profilePage'])->name('profile.index');
      Route::get('/profile/show', [Controllers\HomeController::class, 'profilePageShow'])->name('profile.show');
      Route::get('/boarding',     [Controllers\BoardingController::class, 'boardingPage'])->name('boarding');

    if (check_hasApiFeatures()) {
      Route::get('/tokens', [Controllers\ApiTokenController::class, 'tokensPage'])->name('tokens.index');
    }

});
