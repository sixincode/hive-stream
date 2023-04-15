<?php

namespace Sixincode\HiveStream\Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HiveStreamDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
              HiveStreamSubscriptionDatabaseSeeder::class,
            ]);
    }
}
