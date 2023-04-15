<?php

namespace Sixincode\HiveStream\Http\Livewire\User\Profile;

use Livewire\Component;

class EditNotifications extends Component
{
  public array $notificationsGeneral;

  public function mount()
  {
    $this->notificationsGeneral = auth()->user()->getUserSettingsGeneralNotifications();
  }

  public function render()
  {
    return view('hive-stream::livewire.user.profile.editNotifications');
  }

  public function saveGeneralNotifications()
  {
    $mainSettings = auth()->user()->getUserSettings();
    $generalSettings = $mainSettings->properties->set([
      'notifications' => [
        'general' =>  $this->notificationsGeneral
        ],
    ]);
    $mainSettings->save();
  }

  // public function updating($field, $value)
  // {
  //     auth()->user()->setAttribute('user_settings_general_notifications', $this->notificationsGeneral)->save();
  // }


}
