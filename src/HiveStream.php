<?php

namespace Sixincode\HiveStream;

use Sixincode\HiveStream\Database\Seeders\HiveStreamDatabaseSeeder;

class HiveStream
{
  public function seed()
  {
    return HiveStreamDatabaseSeeder::class;
  }
}
