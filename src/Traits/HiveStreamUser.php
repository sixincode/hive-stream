<?php

namespace Sixincode\HiveStream\Traits;
use Sixincode\HiveStream\Models\SubscriptionPlan;

trait HiveStreamUser
{
  protected static function bootHiveStreamUser()
  {
    static::created(function ($user) {
      if(check_hasDefaultSubscriptionPlan()){
        $subscriptionPlanDefault  = SubscriptionPlan::getDefaultUserPlan();
        $user->newPlanSubscription($subscriptionPlanDefault);
      }
    });
  }

}
