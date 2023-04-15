<?php

namespace Sixincode\HiveStream\Traits;
use Sixincode\HiveStream\Models\SubscriptionPlan;

trait HiveStreamUser
{
  protected static function bootHiveStreamUser()
  {
    static::created(function ($user) {
      $subscriptionPlanDefault  = SubscriptionPlan::getDefaultUserPlan();
      if($subscriptionPlanDefault){
        $user->newPlanSubscription($subscriptionPlanDefault);
      }
    });
  }

}
