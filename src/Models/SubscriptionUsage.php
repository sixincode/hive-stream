<?php

namespace Sixincode\HiveStream\Models;

use Sixincode\HiveAlpha\Models\HiveModelMin;
use Sixincode\HiveHelpers\Traits\IsActiveTrait;

class SubscriptionUsage extends HiveModelMin
{
  use IsActiveTrait;


  public function __construct()
  {
    parent::__construct();

    $this->casts['deadline'] = 'date';
    $this->casts['status'] = 'integer';

    $this->filterable[] = 'deadline';
    $this->filterable[] = 'status';

    $this->orderable[] = 'deadline';
    $this->orderable[] = 'status';

    $this->fillable[] = 'deadline';
    $this->fillable[] = 'status';
  }

  protected $appends = [];
  protected $orderable = [];
  protected $filterable = [];
  protected $fillable = [];

  public function getTable()
  {
    return config('hive-stream.table_names.subscriptionUsages');
  }

  public function getDetailsArray()
  {
    return [
      "deadline"      => $this->name,
      "is_active"     => $this->is_active,
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
