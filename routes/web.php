<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controllers;

use Sixincode\HiveStream\Http\Controllers as HiveStreamControllers;
use Sixincode\HiveStream\Http\Livewire as HiveStreamLivewires;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => config('hive-stream.middleware', ['web'])], function () {

  Route::get('/register',  [Controllers\RegistrationController::class, 'registrationPage'])->name('register');
  Route::get('/login',     [Controllers\Posts\TestingPostController::class, 'index'])->name('posts.index');


});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});
