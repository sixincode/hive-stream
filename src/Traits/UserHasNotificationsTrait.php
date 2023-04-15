<?php

namespace Sixincode\HiveStream\Traits;

use Sixincode\HiveStream\Rules\Password;

trait UserHasNotificationsTrait
{
  public function initializeUserHasNotificationsTrait()
  {
    // $this->appends[] = 'user_settings_general_notifications';
  }

  public function getUserSettingsGeneralNotifications()
  {
      return [
           'comments'   => $this->getSettingsNotificationsGeneralComments(),
           'mentions'   => $this->getSettingsNotificationsGeneralMentions(),
           'followings' => $this->getSettingsNotificationsGeneralFollowings(),
       ];
  }

  public function settingsNotifications()
  {
    return $this->settings()->first()->properties->notifications ?? [];
  }

  public function settingsNotificationsGeneral()
  {
    return $this->settingsNotifications()['general'] ?? [];
  }

  // Comments
  public function settingsNotificationsGeneralComments()
  {
    return $this->settingsNotificationsGeneral()['comments'] ?? [];
  }

  public function getSettingsNotificationsGeneralComments()
  {
    return $this->settingsNotificationsGeneral()['comments']
            ?? config('hive-stream-auth-settings.notifications.default.general.comments');
  }

  // Mentions
  public function settingsNotificationsGeneralMentions()
  {
    return $this->settingsNotificationsGeneral()['mentions'] ?? [];
  }

  public function getSettingsNotificationsGeneralMentions()
  {
    return $this->settingsNotificationsGeneral()['mentions']
            ?? config('hive-stream-auth-settings.notifications.default.general.mentions');
  }

  // Followings
  public function settingsNotificationsGeneralFollowings()
  {
    return $this->settingsNotificationsGeneral()['followings'] ?? [];
  }

  public function getSettingsNotificationsGeneralFollowings()
  {
    return $this->settingsNotificationsGeneral()['followings']
            ?? config('hive-stream-auth-settings.notifications.default.general.followings');
  }

}
