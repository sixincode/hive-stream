<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveStream\Http\Controllers\User as Controllers;
use Sixincode\HiveStream\Http\Livewire as Livewires;

Route::middleware(
  config('hive-stream.routes.user.middlewares.default', ['web','auth:web']),
)->prefix(
  config('hive-stream.routes.user.prefix', 'home')
)->name('user.')->group(function () {

  Route::get('/email/verify', [Controllers\VerifyEmailController::class, 'verifyPage'])->name('verify');
  Route::get('/email/verify/check/{token}', [Controllers\VerifyEmailController::class, 'checkTokenPage'])->name('verify.token');

  Route::middleware(
    config('hive-stream.routes.user.middlewares.verified', ['web','auth:web']),
    )->group(function () {
    Route::get('/', [Controllers\HomeController::class, 'homePage'])->name('home');
    Route::get('/profile', [Controllers\HomeController::class, 'profilePage'])->name('profile.index');
    Route::get('/settings', [Controllers\SettingsController::class, 'settingsPage'])->name('settings.index');
    Route::get('/tokens', [Controllers\ApiTokenController::class, 'tokensPage'])->name('tokens.index');
    Route::get('/boarding', [Controllers\HomeController::class, 'homePage'])->name('boarding');

    Route::get('/subscriptions/upgrade/{plan}', [Controllers\SubscriptionController::class, 'upgradeSubscription'])->name('subscriptions.upgrade');
    Route::get('/subscriptions/downgrade/{plan}', [Controllers\SubscriptionController::class, 'downgradeSubscription'])->name('subscriptions.downgrade');
    Route::get('/subscriptions/{plan}', [Controllers\SubscriptionController::class, 'showSubscription'])->name('subscriptions.show');
  });

});
