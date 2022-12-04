<?php

namespace Sixincode\HiveStream;

use Sixincode\HiveStream\Http\Middleware\HiveStreamAuthenticated;
use Sixincode\HiveStream\Http\Middleware\HiveStreamApplyProfile;
use Sixincode\HiveStream\Http\Middleware\HiveStreamIsVerified;
use Sixincode\ModulesInit\Package;
use Sixincode\ModulesInit\PackageServiceProvider;
use Sixincode\HiveStream\Commands\HiveStreamCommand;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Livewire;
use Illuminate\Routing\Router;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Database\Schema\Blueprint;
use Sixincode\HiveStream\Gear\OnBoardNewUser;
use Laravel\Fortify\Fortify;
use Sixincode\HiveStream\Http\Livewire as HiveStreamLivewire;

class HiveStreamServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('hive-stream')
            ->hasConfigFile()
            ->hasRoutes(['web','user','api'])
            ->hasViews()
            ->hasMigration('create_hive-stream_table')
            ->hasCommand(HiveStreamCommand::class);
    }

    public function bootingPackage()
    {
      $this->bootHiveStreamMiddlewares();
      $this->bootLaravelFortifySettings();
      $this->bootHiveStreamLivewireComponents();
    }

    public function bootHiveStreamLivewireComponents()
    {
      Livewire::component('hive-stream-login', HiveStreamLivewire\Auth\Login::class);
      Livewire::component('hive-stream-register', HiveStreamLivewire\Auth\Register::class);
      Livewire::component('hive-stream-confirm-password', HiveStreamLivewire\Auth\ConfirmPassword::class);
      Livewire::component('hive-stream-forgot-password', HiveStreamLivewire\Auth\ForgotPassword::class);
      Livewire::component('hive-stream-reset-password', HiveStreamLivewire\Auth\ResetPassword::class);
      Livewire::component('hive-stream-two-factor-challenge', HiveStreamLivewire\Auth\TwoFactorChallenge::class);
      Livewire::component('hive-stream-verify-email', HiveStreamLivewire\Auth\VerifyEmail::class);

      Livewire::component('hive-stream-privacy-index', HiveStreamLivewire\Central\Privacy\Index::class);
      Livewire::component('hive-stream-terms-index', HiveStreamLivewire\Central\Terms\Index::class);

      Livewire::component('hive-stream-home-index', HiveStreamLivewire\User\Home\Index::class);
      Livewire::component('hive-stream-profile-index', HiveStreamLivewire\User\Profile\Index::class);
      Livewire::component('hive-stream-settings-index', HiveStreamLivewire\User\Settings\Index::class);
      Livewire::component('hive-stream-tokens-index', HiveStreamLivewire\User\Tokens\Index::class);
      Livewire::component('hive-stream-verification-index', VerificationRequest::class);
    }

    public function bootHiveStreamMiddlewares()
    {
      // $kernel = resolve(Kernel::class);
      $router = $this->app->make(Router::class);
      $router->aliasMiddleware('user_verified', HiveStreamApplyProfile::class);
      $router->aliasMiddleware('hiveStreamAuth', HiveStreamAuthenticated::class);
    }

    public function bootLaravelFortifySettings()
    {
      Fortify::loginView(function () {
          return view('hive-stream::auth.login');
      });
      Fortify::registerView(function () {
          return view('hive-stream::auth.register');
      });
      Fortify::verifyEmailView(function () {
          return view('hive-stream::auth.verify-email');
      });
      Fortify::twoFactorChallengeView(function () {
          return view('hive-stream::auth.two-factor-challenge');
      });
      Fortify::requestPasswordResetLinkView(function () {
          return view('hive-stream::auth.forgot-password');
      });
      Fortify::resetPasswordView(function () {
          return view('hive-stream::auth.reset-password');
      });
      Fortify::confirmPasswordView(function () {
          return view('hive-stream::auth.confirm-password');
      });
      Fortify::createUsersUsing(OnBoardNewUser::class);
    }
}
