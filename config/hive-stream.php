<?php

return [
    'stack' => 'livewire',
    'middleware_web' => 'web',
    'middleware_auth' => 'hiveStreamAuth',
    // 'features' => [Features::accountDeletion()],
    'profile_photo_disk' => 'public',
    'process' => [
      'createPersonalteamOnRegistration' => true,
      'defaultTeamCode' => '4000',

    ],
    'routes' => [
      'central' =>   [
            'prefix' => null,
            'middlewares' => [
              'default' => ['web'],
            ],
       ],
      'admin' =>   [
           'prefix' => 'admin',
           'middlewares' => ['web','auth:web'],
       ],
       'user' =>   [
            'prefix' => 'home',
            'middlewares' =>      [
              'default'   =>  ['web','auth:web'],
              'verified'  =>  ['user_verified'],
            ],
          ],
    ],
];
