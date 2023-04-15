<?php

namespace Sixincode\HiveStream\Http\Livewire\User\Subscriptions;

use Livewire\Component;
use Sixincode\HiveStream\Models\SubscriptionPlan;

class Show extends Component
{
  public $subscription;

  public function mount(SubscriptionPlan $subscription)
  {
    $this->subscription = $subscription;
  }

  public function render()
  {
    return view('hive-stream::livewire.user.subscriptions.show');
  }

}
