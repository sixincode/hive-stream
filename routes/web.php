<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveStream\Http\Controllers as Controllers;
use Sixincode\HiveStream\Http\Livewire as Livewires;

Route::group([
    'middleware' => config('hive-stream.middleware', ['web'])
  ], function () {
    Route::get('/register',  [Controllers\Auth\RegistrationController::class, 'registrationPage'])->name('register');
    Route::get('/login',     [Controllers\Auth\LoginController::class, 'loginPage'])->name('login');

    Route::get('/terms', [Controllers\Central\TermsOfServiceController::class, 'showTerms'])->name('terms.show');
    Route::get('/privacy', [Controllers\Central\PrivacyPolicyController::class, 'showPrivacy'])->name('privacy.show');
});
