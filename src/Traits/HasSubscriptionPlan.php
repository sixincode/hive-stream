<?php

namespace Sixincode\HiveStream\Traits;

use Sixincode\HiveStream\Models\SubscriptionPlan;
use Sixincode\HiveStream\Models\SubscriptionPlanx;
use Illuminate\Database\Eloquent\Builder;
use Sixincode\HiveStream\Services\TimePeriod;

trait HasSubscriptionPlan
{
  public static function getsubscriptionPlanClassName(): string
  {
      return config('hive-stream.models.subscriptionPlan', SubscriptionPlan::class);
  }

  public function subscriptionPlans()
  {
    return $this->morphToMany(
                    self::getsubscriptionPlanClassName(),
                    config('hive-stream.column_names.subscriptionPlan_identifier'),
                    config('hive-stream.table_names.subscriptionPlansx'),
                    config('hive-stream.column_names.subscriptionPlans_morph_id'),
                    config('hive-stream.column_names.subscriptionPlans_morph_subscriptionPlan')
                )->withPivot('trial_ends_at','starts_at', 'ends_at','status','cancels_at','canceled_at','timezone','is_active')->using(config('hive-stream.models.subscriptionPlanx', SubscriptionPlanx::class));
  }

  public function mainPlan()
  {
     return $this->subscriptionPlans()
                 ->whereType('main')
                 ->whereBetween('level',[2000,2999])
                 ->first();
  }

  public function mainPlanName()
  {
     return $this->mainPlan()->name;
  }

  public function mainPlanLevel()
  {
     return $this->mainPlan()->level;
  }

  public function mainPlanEndDate()
  {
    return $this->mainPlan()->pivot->ends_at->toFormattedDateString();
  }

  /**
 * Check if the subscriber subscribed to the given plan.
 *
 * @param int $planId
 *
 * @return bool
 */
  public function subscribedTo($planId): bool
  {
      $subscription = $this->subscriptionPlans()->where('plan_id', $planId)->first();
      return $subscription && $subscription->active();
  }


  public function newPlanSubscription(SubscriptionPlan $plan, Carbon $startDate = null, $trial = false)
  {
      if($trial){
        $trialPeriod  = new TimePeriod($plan->trial_interval, $plan->trial_period, $startDate ?? now());
        $trialEnd  = $trialPeriod->getEndDate();
        $planStart = $trialPeriod->getEndDate();
      }else{
        $trialEnd  =  null;
        $planStart = now();
      }

      $planPeriod = new TimePeriod($plan->invoice_interval, $plan->invoice_period, $planStart);
      $pivotData = [
          config('hive-stream.column_names.subscriptionPlans_morph_subscriptionPlan')  => $plan->getKey(),
          'trial_ends_at' => $trialEnd,
          'starts_at'     => $planPeriod->getStartDate(),
          'ends_at'       => $planPeriod->getEndDate(),
          'status'        => 1,
      ];
      return $this->subscriptionPlans()->attach($plan, $pivotData);
  }

}
