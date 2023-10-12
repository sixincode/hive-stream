<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveStream\Http\Controllers\User\Settings as Controllers;

Route::middleware(
  config('hive-stream-middlewares.auth', ['auth:web'])
)->group(function () {

  if(check_hasTeamFeatures()) {

    Route::get('/teams/create', [TeamController::class, 'create'])
         ->name('teams.create');
    Route::get('/teams/{team}', [TeamController::class, 'show'])
         ->name('teams.show');
    Route::put('/current-team', [CurrentTeamController::class, 'update'])
         ->name('current-team.update');

    Route::get('/team-invitations/{invitation}', [TeamInvitationController::class, 'accept'])
         ->middleware(['signed'])
         ->name('team-invitations.accept');
  }
});
