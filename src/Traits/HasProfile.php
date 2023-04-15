<?php

namespace Sixincode\HiveStream\Traits;

use Sixincode\HiveStream\Models\Profile;

trait HasProfile
{
  public function profiles()
  {
      return $this->morphMany(
        config('hive-stream.models.profile'),
        'owner'
      );
  }

  public function mainProfile()
  {
     return $this->profiles()->whereIsMain(true)->first();
  }
}
