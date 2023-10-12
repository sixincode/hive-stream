<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveStream\Http\Controllers as Controllers;
use Sixincode\HiveStream\Http\Livewire as Livewires;

Route::middleware(
  config('hive-stream-middlewares.central', ['web']),
)->group(function () {

  if(check_hasTermsAndPrivacyPolicyFeatures()) {
    Route::get('/terms', [Controllers\Central\TermsOfServiceController::class, 'showTerms'])->name('terms.show');
    Route::get('/privacy', [Controllers\Central\PrivacyPolicyController::class, 'showPrivacy'])->name('policy.show');
  }

  if(check_hasRegistrationFeatures()) {

    // Route::get('/register',  [Controllers\Auth\RegistrationController::class, 'registrationPage'])
    //      ->name('register');

    // Route::post('/register', [Controllers\Auth\UserRegistrationController::class, 'registrationSubmit'])
    //      ->name('register.submit');

    // Route::get('/login',     [Controllers\Auth\LoginController::class, 'loginPage'])->name('login');
    // Route::post('/login',     [Controllers\Auth\LoginController::class, 'loginSubmit'])->name('login.submit');
  }

});
