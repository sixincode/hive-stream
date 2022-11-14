<?php

namespace Sixincode\HiveStream;

use Sixincode\ModulesInit\Package;
use Sixincode\ModulesInit\PackageServiceProvider;
use Sixincode\HiveStream\Commands\HiveStreamCommand;

class HiveStreamServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('hive-stream')
            ->hasConfigFile()
            ->hasRoute('web')
            ->hasViews()
            ->hasMigration('create_hive-stream_table')
            ->hasCommand(HiveStreamCommand::class);
    }
}
