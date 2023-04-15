<?php

namespace Sixincode\HiveStream\Models;

use Carbon\Carbon;
use Sixincode\HiveAlpha\Models\HiveModel;
use Sixincode\HiveHelpers\Traits\IsActiveTrait;
use Sixincode\HiveHelpers\Traits\IsDefaultTrait;
use Sixincode\HiveHelpers\Traits\IsFeaturedTrait;
use Sixincode\HiveHelpers\Traits\IsPrivateTrait;
use Sixincode\HiveHelpers\Traits\SortOrderTrait;
use Sixincode\HiveHelpers\Traits\HasSlugTrait;
use Sixincode\HiveHelpers\Services\TimePeriod;

class SubscriptionFeature extends HiveModel
{
  use IsActiveTrait;
  use IsDefaultTrait;
  use IsFeaturedTrait;
  use SortOrderTrait;
  use HasSlugTrait;

  public function __construct()
  {
    parent::__construct();
    $this->translatable[] = 'name';
    $this->translatable[] = 'description';

    $this->casts['name'] = 'array';
    $this->casts['description'] = 'array';

    $this->filterable[] = 'id';
    $this->filterable[] = 'name';
    $this->filterable[] = 'type';

    $this->orderable[] = 'id';
    $this->orderable[] = 'name';
    $this->orderable[] = 'type';

    $this->fillable[] = 'name';
    $this->fillable[] = 'description';
    $this->fillable[] = 'code';
  }

  protected $appends = [];
  protected $orderable = [];
  protected $filterable = [];
  protected $fillable = [];
  protected $translatable = [];

  public function getTable()
  {
    return config('hive-stream.table_names.subscriptionFeatures');
  }

  public function getDetailsArray()
  {
    return [
      "headline"      => $this->name,
      "body"          => $this->description,
      "routes"        => self::getRoutingArray(),
      "icon"          => "service",
    ];
  }

  public function getRoutingArray()
  {
    return [
      "index"     => route("subscriptionServices.index"),
      "create"    => route("subscriptionServices.show", $this->slug),
      "add"       => route("subscriptionServices.add", $this->slug),
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

  /**
   * Get feature's reset date.
   *
   * @param string $dateFrom
   *
   * @return \Carbon\Carbon
   */
  public function getResetDate(Carbon $dateFrom): Carbon
  {
      $period = new TimePeriod($this->resettable_interval, $this->resettable_period, $dateFrom ?? now());

      return $period->getEndDate();
  }

}
