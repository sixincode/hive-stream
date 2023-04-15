<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveStream\Http\Controllers\Api as Controllers;
use Sixincode\HiveStream\Http\Livewire as Livewires;

Route::middleware(
  config('hive-stream.routes.central.middlewares.api', ['api']),
)->group(function () {
    //
});
