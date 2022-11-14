<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveStream\Http\Controllers\User as Controllers;
use Sixincode\HiveStream\Http\Livewire as Livewires;

Route::middleware([
    'auth:sanctum',
    config('hive-stream.middleware_auth', ['auth'])
])->prefix('home')->name('user.')->group(function () {

  Route::get('/', [Controllers\HomeController::class, 'homePage'])->name('home');
  Route::get('/profile', [Controllers\HomeController::class, 'profilePage'])->name('profile.index');
  Route::get('/settings', [Controllers\SettingsController::class, 'settingsPage'])->name('settings.index');
  Route::get('/tokens', [Controllers\ApiTokenController::class, 'tokensPage'])->name('tokens.index');
});
