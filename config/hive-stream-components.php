<?php

use Sixincode\HiveStream\Http\Livewire as HiveStreamLivewire;


return [
  /*
  |--------------------------------------------------------------------------
  | Blade Components
  |--------------------------------------------------------------------------
  | Below are listed all the blade components that should be loaded
  | by the packageBooted method on the package ServiceProder.
  */

  'blade' => [
      //
    ],
  /*
  |--------------------------------------------------------------------------
  | Livewire Components
  |--------------------------------------------------------------------------
  | Below are listed all the Livewire components that should be loaded
  | by the bootingPackage method on the package ServiceProder.
  */
  'livewire' => [
    'login' => HiveStreamLivewire\Auth\Login::class,
    'register' => HiveStreamLivewire\Auth\Register::class,
    'confirm-password' => HiveStreamLivewire\Auth\ConfirmPassword::class,
    'forgot-password' => HiveStreamLivewire\Auth\ForgotPassword::class,
    'reset-password' => HiveStreamLivewire\Auth\ResetPassword::class,
    'two-factor-challenge' => HiveStreamLivewire\Auth\TwoFactorChallenge::class,
    'verify-email' => HiveStreamLivewire\Auth\VerifyEmail::class,

    'privacy-index' => HiveStreamLivewire\Central\Privacy\Index::class,
    'terms-index' => HiveStreamLivewire\Central\Terms\Index::class,

    'home-index' => HiveStreamLivewire\User\Home\Index::class,
    'profile-index' => HiveStreamLivewire\User\Profile\Index::class,
    'settings-index' => HiveStreamLivewire\User\Settings\Index::class,
    'subscriptions-show' => HiveStreamLivewire\User\Subscriptions\Show::class,
    'tokens-index' => HiveStreamLivewire\User\Tokens\Index::class,
    'verification-index' =>  HiveStreamLivewire\User\Verification\Request::class,

    'profile-edit-bio' => HiveStreamLivewire\User\Profile\EditBio::class,
    'profile-edit-billing' => HiveStreamLivewire\User\Profile\EditBilling::class,
    'profile-edit-notifications' => HiveStreamLivewire\User\Profile\EditNotifications::class,
    'profile-edit-security' => HiveStreamLivewire\User\Profile\EditSecurity::class,
    'profile-edit-subscriptions' => HiveStreamLivewire\User\Profile\EditSubscriptions::class,
  ],

  /*
  |--------------------------------------------------------------------------
  | Components Prefix
  |--------------------------------------------------------------------------
  |
  | This value will set a prefix for all Shopper Admin components.
  | By default it's shopper. This is useful if you want to avoid
  | collision with components from other libraries.
  |
  | For example, it's reference components like:
  |
  | <x-hive-index />
  | <livewire:hive-index />
  |
  */
  'prefix' => 'hive-stream',
];
