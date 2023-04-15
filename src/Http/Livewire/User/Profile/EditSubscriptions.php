<?php

namespace Sixincode\HiveStream\Http\Livewire\User\Profile;

use Livewire\Component;
use Sixincode\HiveStream\Models\SubscriptionPlan;
use Sixincode\HiveStream\Models\SubscriptionFeature;

class EditSubscriptions extends Component
{
  public $subscriptionPlans;

  public function mount()
  {
    $this->subscriptionPlans = SubscriptionPlan::whereIsActive(true)
                    ->whereIsPrivate(false)->with('planFeatures')->get();
  }

  public function render()
  {
    return view('hive-stream::livewire.user.profile.editSubscriptions');
  }
}
