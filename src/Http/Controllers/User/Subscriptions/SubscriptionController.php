<?php

namespace Sixincode\HiveStream\Http\Controllers\User\Subscriptions;

use Illuminate\Routing\Controller;
use Sixincode\HiveStream\Models\SubscriptionPlan;

class SubscriptionController extends Controller
{
  public function showSubscription($plan)
  {
    return view('hive-stream::user.subscriptions.showSubscriptionPlan',[
      'plan' => $plan
    ]);
  }

  public function upgradeSubscription(SubscriptionPlan $plan)
  {
    if($plan->level > auth()->user()->mainPlanLevel())
    {

    }else{
      return;
    }
  }

  public function downgradeSubscription(SubscriptionPlan $plan)
  {
    if($plan->level < auth()->user()->mainPlanLevel())
    {

    }else{
      return;
    }
  }
}
