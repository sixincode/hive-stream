<?php

namespace Sixincode\HiveStream\Models;

use Sixincode\HiveAlpha\Models\HiveModelMin;
use Sixincode\HiveAlpha\Traits\GlobalUniqueIdentifierTrait;
use Sixincode\HiveAlpha\Traits\HasDataAndProperties;
use Sixincode\HiveHelpers\Traits\HasOwnerTrait;

class Setting extends HiveModelMin
{
  use GlobalUniqueIdentifierTrait;
  use HasDataAndProperties;
  use HasOwnerTrait;

  public function __construct()
  {
    parent::__construct();

    $this->casts['bio'] = 'array';

    $this->filterable[] = 'id';
    $this->filterable[] = 'type';

    $this->fillable[] = 'type';
    $this->appends[] = 'notifications';

    $this->orderable[] = 'id';
    $this->orderable[] = 'type';
  }
  protected $appends = [];
  protected $orderable = [];
  protected $filterable = [];
  protected $fillable = [];
  public $timestamps = false;

  public static function getTableAttribute()
  {
    return config('hive-stream.tables_names.settings');
  }

  public function getDetailsArray()
  {
    return [
      "headline"      => $this->name,
      "body"          => $this->description,
      "routes"        => self::getRoutingArray(),
      "icon"          => "plan",
      "price_monthly" => $this->price['monthly'],
      "price_yearly"  => $this->price['year'],
    ];
  }

  public static function slugOriginElement()
  {
    return 'name';
  }

  public function getNotificationsAttributes()
  {
      return $this->properties->notifications ?? [];
  }

  public function getNotificationsPushArray()
  {
    return [
      "comments"      => $this->notifications->general->comments->push ?? false,
      "messages"      => $this->notifications->general->messages->push ?? false,
      "mentions"      => $this->notifications->general->mentions->push ?? false,
    ];
  }

}
