<?php

namespace Sixincode\HiveStream;

// use Sixincode\HiveStream\Http\Middleware\HiveStreamAuthenticated;
// use Sixincode\HiveStream\Http\Middleware\HiveStreamApplyProfile;
// use Sixincode\HiveStream\Http\Middleware\HiveStreamIsVerified;
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
// use HiveCommunity\Models\TeamMembership;
// use HiveCommunity\Models\Team;
use App\Models\User;
use Sixincode\HiveStream\Gear\OnBoardNewUser;
use Illuminate\Foundation\AliasLoader;

class HiveStreamServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('hive-stream')
            ->hasConfigFile(['hive-stream','hive-stream-user','hive-stream-middlewares','hive-stream-features','hive-stream-components','hive-stream-auth-settings'])
            ->hasRoutes(['web','user','user-verification','user-teams','user-subscriptions','api'])
            ->hasViews()
            // ->hasAssets()
            // ->hasTranslations()
            // ->hasBladeComponents()
            // ->hasLayouts()
            // ->hasIcons()
            ->hasMigration('create_hive-stream_table')
            ->hasCommand(HiveStreamCommand::class);
            $this->app->register(\Laravel\Fortify\FortifyServiceProvider::class);
            $this->app->register(\Laravel\Jetstream\JetstreamServiceProvider::class);

            $this->registerHiveStreamDatabaseMethods();
    }

    public function registeringPackage()
    {
      $loader = AliasLoader::getInstance();
      $loader->alias('Laravel\Fortify\Contracts\CreatesNewUsers', 'Sixincode\HiveStream\Contracts\CreatesNewUsers');
    }

    public function bootingPackage()
    {
       $this->morphMapping();
       $this->bootLaravelFortifySettings();
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

    //  public function bootHiveStreamMiddlewares()
    //  {
    //   // $kernel = resolve(Kernel::class);
    //   $router = $this->app->make(Router::class);
    //   // $this->loadSeeders();
    //   $router->aliasMiddleware('user_verified', HiveStreamApplyProfile::class);
    //   $router->aliasMiddleware('hiveStreamAuth', HiveStreamAuthenticated::class);
    // }

    public function bootLaravelFortifySettings()
    {
      Fortify::loginView(function () {
          return check_hasLoginView();
      });
      Fortify::registerView(function () {
          return check_hasRegisterView();
      });
      Fortify::verifyEmailView(function () {
          return check_hasVerifyEmailView();
      });
      Fortify::twoFactorChallengeView(function () {
          return check_hasTwoFactorChallengeView();
      });
      Fortify::requestPasswordResetLinkView(function () {
          return check_hasRequestPasswordResetLinkView();
      });
      Fortify::resetPasswordView(function () {
          return check_hasResetPasswordView();
      });
      Fortify::confirmPasswordView(function () {
          return check_hasConfirmPasswordView();
      });
      // Fortify::ignoreRoutes();
      Fortify::createUsersUsing(check_hasCreateNewUserClass());
    }

    public function bootLaravelJetstreamSettings()
    {
      // Jetstream::useUserModel(User::class);
      // Jetstream::useTeamModel(Team::class);
      // Jetstream::useMembershipModel(TeamMembership::class);
      // Jetstream::createTeamsUsing(OnBoardNewUser::class);
    }

    public function morphMapping()
    {
      Relation::morphMap([
          'User' => 'App\Models\User',
      ]);
    }

}
