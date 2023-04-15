<?php

use Sixincode\HiveStream\Http\Livewire as HiveStreamLivewire;

return [
  /*
  |--------------------------------------------------------------------------
  | Blade Components
  |--------------------------------------------------------------------------
  */
 'notifications' => [
    'type' => [
        'p' => 'push',
        's' => 'sms',
        'e' => 'email'
    ],
  'default' => [
        'general' => [
            'comments'  => true,
            'mentions'  => true,
            'followings' => true,
          ],
      ],
    ],

];
