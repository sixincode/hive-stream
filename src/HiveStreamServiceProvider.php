<?php

namespace Sixincode\HiveStream;

use Sixincode\HiveStream\Http\Middleware\HiveStreamAuthenticated;
use Sixincode\HiveStream\Http\Middleware\HiveStreamApplyProfile;
use Sixincode\HiveStream\Http\Middleware\HiveStreamIsVerified;
use Sixincode\ModulesInit\Package;
use Sixincode\ModulesInit\PackageServiceProvider;
use Sixincode\HiveStream\Commands\HiveStreamCommand;
use Illuminate\Routing\Router;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Database\Schema\Blueprint;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;
use Sixincode\HiveStream\Traits\HiveStreamDatabase;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use HiveCommunity\Models\TeamMembership;
use HiveCommunity\Models\Team;
use App\Models\User;
use Sixincode\HiveStream\Gear\OnBoardNewUser;

class HiveStreamServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('hive-stream')
            ->hasConfigFile(['hive-stream','hive-stream-components','hive-stream-auth-settings'])
            ->hasRoutes(['web','user','api'])
            ->hasViews()
            ->hasMigration('create_hive-stream_table')
            ->hasCommand(HiveStreamCommand::class);
            $this->app->register(\Laravel\Fortify\FortifyServiceProvider::class);
            $this->app->register(\Laravel\Jetstream\JetstreamServiceProvider::class);

            $this->registerHiveStreamDatabaseMethods();
    }

    public function bootingPackage()
    {
      $this->bootHiveStreamMiddlewares();
      $this->morphMapping();
      $this->bootLaravelFortifySettings();
      $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function packageBooted()
    {
      $this->bootHiveStreamBladeAndLivewireComponents();
    }

    public function bootHiveStreamBladeAndLivewireComponents()
    {
      $prefix = config('hive-stream-components.prefix', 'hive-stream');
      foreach (config('hive-stream-components.livewire', []) as $alias => $component) {
          $alias = $prefix ? "$prefix-$alias" : $alias;
          Livewire::component($alias, $component);
        }
     }

     private function registerHiveStreamDatabaseMethods(): void
     {
       Blueprint::macro('addSubscriptionPlanFields', function (Blueprint $table, $properties = []) {
         HiveStreamDatabase::addSubscriptionPlanFields($table, $properties);
       });

       Blueprint::macro('addSubscriptionFeatureFields', function (Blueprint $table, $properties = []) {
         HiveStreamDatabase::addSubscriptionFeatureFields($table, $properties);
       });

       Blueprint::macro('addSubscriptionFeaturePlanFields', function (Blueprint $table, $properties = []) {
         HiveStreamDatabase::addSubscriptionFeaturePlanFields($table, $properties);
       });

       Blueprint::macro('addSubscriptionPlanxFields', function (Blueprint $table, $properties = []) {
         HiveStreamDatabase::addSubscriptionPlanxFields($table, $properties);
       });

       Blueprint::macro('addSubscriptionUsageFields', function (Blueprint $table, $properties = []) {
         HiveStreamDatabase::addSubscriptionUsageFields($table, $properties);
       });

       Blueprint::macro('addProfileFields', function (Blueprint $table, $properties = []) {
         HiveStreamDatabase::addProfileFields($table, $properties);
       });

       Blueprint::macro('addSettingsFields', function (Blueprint $table, $properties = []) {
         HiveStreamDatabase::addSettingsFields($table, $properties);
       });

       Blueprint::macro('addLoginFields', function (Blueprint $table, $properties = []) {
         HiveStreamDatabase::addLoginFields($table, $properties);
       });
     }

     public function bootHiveStreamMiddlewares()
     {
      // $kernel = resolve(Kernel::class);
      $router = $this->app->make(Router::class);
      // $this->loadSeeders();
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

    public function bootLaravelJetstreamSettings()
    {
      Jetstream::useUserModel(User::class);
      Jetstream::useTeamModel(Team::class);
      Jetstream::useMembershipModel(TeamMembership::class);
      Jetstream::createTeamsUsing(OnBoardNewUser::class);
    }

    public function morphMapping()
    {
      Relation::morphMap([
          'User' => 'App\Models\User',
      ]);
    }

    // protected function loadSeeders(){
    //     $this->callAfterResolving(
    //       Database\Seeders\DatabaseSeeder::class, function ($seeder) {
    //                  $seeder->call(Sixincode\HiveStream\Database\Seeders\HiveStreamDatabaseSeeder::class );
    //                 // Code that will print out in console after migration is succesful
    //          });
    // }
}
