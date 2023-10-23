<?php

namespace Sixincode\HiveStream\Traits;

use Sixincode\HiveStream\Models\Setting;

trait HasSettings
{
  use UserHasNotificationsTrait;

  protected static function bootHasSettings()
  {
    static::created(function ($user) {
      if(check_hasDefaultSettingModel()){
        $this->setUserSettings();
      }
    });
  }

  public function getUserSettings()
  {
    $userSettings = auth()->user()->settings()->firstOrCreate(
     // return $this->settings()->firstOrNew([
       [],
       ['properties' => ['sdsfsd' => 'blue']]
     );
     return $userSettings;
  }

  public function settings()
  {
      return $this->morphOne(
        config('hive-stream.models.setting'),
        'owner'
      );
  }


  public function setUserSettings()
  {
    $mainSettings = $this->getUserSettings();
    $mainSettingNotifications = $this->setUserSettingsNotifications($mainSettings);
    $mainSettingPrivacy       = $this->setUserSettingsPrivacy($mainSettings);
  }

  public function setUserSettingsNotifications($settings)
  {
    $mainSettings = $settings->properties->set([
      'notifications' => [
        'general' => [
          'comments'   => config('hive-stream-auth-settings.notifications.default.general.comments'),
          'mentions'   => config('hive-stream-auth-settings.notifications.default.general.mentions'),
          'followings' => config('hive-stream-auth-settings.notifications.default.general.followings'),
          ],
        ],
    ]);
    // $mainSettings->properties->set([
    //   'red' => true,
    //   'square' => 'triangle'
    // ]);
    // $mainSettings->type = 'addd';
    $settings->save();
    return $mainSettings->properties;
  }

  public function setUserSettingsPrivacy($settings)
  {
    $mainSettings = $settings->properties->set([
      'privacy' => [
        'general' => [
          'activity'  => false,
          'groups'    => true,
          'profile'   => true,
          ],
        ],
    ]);
    $settings->save();
    return $mainSettings->properties;
  }


}
