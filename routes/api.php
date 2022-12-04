<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveStream\Http\Controllers as Controllers;
use Sixincode\HiveStream\Http\Livewire as Livewires;

Route::middleware(
  config('hive-stream.routes.central.middlewares.default', ['web']),
)->group(function () {
    // Route::get('/register',  [Controllers\Auth\RegistrationController::class, 'registrationPage'])
    //      ->name('register');
    //
    Route::post('/register', [Controllers\Auth\RegistrationController::class, 'registrationSubmit']);
    // Route::get('/login',     [Controllers\Auth\LoginController::class, 'loginPage'])->name('login');
    // Route::post('/login',     [Controllers\Auth\LoginController::class, 'loginSubmit'])->name('login.submit');

    Route::get('/terms', [Controllers\Central\TermsOfServiceController::class, 'showTerms'])->name('terms.show');
    Route::get('/privacy', [Controllers\Central\PrivacyPolicyController::class, 'showPrivacy'])->name('privacy.show');
});
