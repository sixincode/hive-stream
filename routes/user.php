<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveStream\Http\Controllers\User as Controllers;
use Sixincode\HiveStream\Http\Livewire as Livewires;

Route::middleware(
  config('hive-stream-middlewares.user', ['web','auth:web']),
)->prefix(
  config('hive-stream-user.routes.prefix', 'home')
)->group(function () {
  Route::get('/profile',             [Controllers\HomeController::class, 'profilePage'])->name('profile.show');

  Route::name()->group(function (){
      // Route::get('/',             [Controllers\HomeController::class, 'homePage'])->name('home');
      Route::get('/profile',      [Controllers\HomeController::class, 'profilePage'])->name('profile.index');
      Route::get('/profile/show', [Controllers\HomeController::class, 'profilePageShow'])->name('profile.show');
      Route::get('/boarding',     [Controllers\BoardingController::class, 'boardingPage'])->name('boarding');

    if (check_hasApiFeatures()) {
      Route::get('/tokens', [Controllers\ApiTokenController::class, 'tokensPage'])->name('tokens.index');
    }
  });

});
