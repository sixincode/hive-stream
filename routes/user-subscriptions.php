<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveStream\Http\Controllers\User\Subscriptions as Controllers;

Route::middleware(
  config('hive-stream-middlewares.user', ['web','auth:web']),
)->group(function () {

  if (check_hasSubscriptionFeatures()) {
    Route::get('/subscriptions/upgrade/{plan}', [Controllers\SubscriptionController::class, 'upgradeSubscription'])
         ->name('subscriptions.upgrade');
    Route::get('/subscriptions/downgrade/{plan}', [Controllers\SubscriptionController::class, 'downgradeSubscription'])
         ->name('subscriptions.downgrade');
    Route::get('/subscriptions/{plan}', [Controllers\SubscriptionController::class, 'showSubscription'])
         ->name('subscriptions.show');
  }

});
