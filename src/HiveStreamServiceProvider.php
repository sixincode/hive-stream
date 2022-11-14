<?php

namespace Sixincode\HiveStream;

use Sixincode\ModulesInit\Package;
use Sixincode\ModulesInit\PackageServiceProvider;
use Sixincode\HiveStream\Commands\HiveStreamCommand;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Livewire;
use Sixincode\HiveStream\Http\Livewire\Auth\Login;
use Sixincode\HiveStream\Http\Livewire\Auth\Register;
use Sixincode\HiveStream\Http\Livewire\Central\Privacy\Index as PrivacyIndex;
use Sixincode\HiveStream\Http\Livewire\Central\Terms\Index as TermsIndex;
use Sixincode\HiveStream\Http\Livewire\User\Home\Index as HomeIndex;
use Sixincode\HiveStream\Http\Livewire\User\Profile\Index as HomeProfile;
use Sixincode\HiveStream\Http\Livewire\User\Settings\Index as HomeSettings;
use Sixincode\HiveStream\Http\Livewire\User\Tokens\Index as HomeTokens;

class HiveStreamServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('hive-stream')
            ->hasConfigFile()
            ->hasRoute(['web','user'])
            ->hasViews()
            ->hasMigration('create_hive-stream_table')
            ->hasCommand(HiveStreamCommand::class);
    }

    public function bootingPackage()
    {
      Livewire::component('hive-stream-login', Login::class);
      Livewire::component('hive-stream-register', Register::class);
      Livewire::component('hive-stream-privacy-index', PrivacyIndex::class);
      Livewire::component('hive-stream-terms-index', TermsIndex::class);
      Livewire::component('hive-stream-home-index', HomeIndex::class);
      Livewire::component('hive-stream-profile-index', HomeProfile::class);
      Livewire::component('hive-stream-settings-index', HomeSettings::class);
      Livewire::component('hive-stream-tokens-index', HomeTokens::class);

    }
}
