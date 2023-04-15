<?php

namespace Sixincode\HiveStream\Http\Livewire\User\Profile;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Livewire\Component;

class EditSecurity extends Component
{
  public $state = [
    'current_password' => '',
    'password' => '',
    'password_confirmation' => '',
  ];


  public function mount()
  {

  }

  public function updatePassword(UpdatesUserPasswords $updater)
  {
      $this->resetErrorBag();

      $updater->update(Auth::user(), $this->state);

      if (request()->hasSession()) {
          request()->session()->put([
              'password_hash_'.Auth::getDefaultDriver() => Auth::user()->getAuthPassword(),
          ]);
      }

      $this->state = [
          'current_password' => '',
          'password' => '',
          'password_confirmation' => '',
      ];

      $this->emit('saved');
  }

  /**
   * Get the current user of the application.
   *
   * @return mixed
   */
  public function getUserProperty()
  {
      return Auth::user();
  }

  public function render()
  {
    return view('hive-stream::livewire.user.profile.editSecurity');
  }

}
