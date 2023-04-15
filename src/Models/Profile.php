<?php

namespace Sixincode\HiveStream\Models;

use Sixincode\HiveAlpha\Models\HiveModel;
use Sixincode\HiveHelpers\Traits\IsActiveTrait;
use Sixincode\HiveHelpers\Traits\IsDefaultTrait;
use Sixincode\HiveHelpers\Traits\IsFeaturedTrait;
use Sixincode\HiveHelpers\Traits\IsPrivateTrait;
use Sixincode\HiveHelpers\Traits\sortOrderTrait;
use Sixincode\HiveHelpers\Traits\HasOwnerTrait;

class Profile extends HiveModel
{
  use IsActiveTrait;
  use IsDefaultTrait;
  use IsFeaturedTrait;
  use IsPrivateTrait;
  use sortOrderTrait;
  use HasOwnerTrait;

  public function __construct()
  {
    parent::__construct();
    $this->translatable[] = 'bio';

    $this->casts['bio'] = 'array';
    $this->casts['billing_date'] = 'date';

    $this->filterable[] = 'id';
    $this->filterable[] = 'genre';
    $this->filterable[] = 'type';

    $this->fillable[] = 'bio';
    $this->fillable[] = 'genre';
    $this->fillable[] = 'notifications';
    $this->fillable[] = 'billing_date';
    $this->fillable[] = 'billing_cycle';
    $this->fillable[] = 'vat_gst';

    $this->orderable[] = 'id';
    $this->orderable[] = 'genre';
    $this->orderable[] = 'type';
  }
  protected $appends = [];
  protected $orderable = [];
  protected $filterable = [];
  protected $fillable = [];
  protected $translatable = [];

  public static function getTableAttribute()
  {
    return config('hive-stream.tables_names.profiles');
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

  public function getRouteKeyName()
  {
      return 'slug';
  }

}
