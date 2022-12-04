<?php

namespace Sixincode\HiveStream\Traits;

use Sixincode\HiveStream\Rules\Password;

trait HasPassword
{
  protected function passwordRules()
  {
      return ['required', 'string', new Password, 'confirmed'];
  }
}
