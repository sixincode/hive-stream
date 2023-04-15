<?php

namespace Sixincode\HiveStream\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;

class SubscriptionPlanx extends MorphPivot
{


  public function __construct()
  {
    parent::__construct();
    $this->casts['starts_at'] = 'datetime';
    $this->casts['ends_at'] = 'datetime';

    $this->filterable[] = 'id';
    $this->filterable[] = 'starts_at';
    $this->filterable[] = 'ends_at';

    $this->orderable[] = 'id';
    $this->orderable[] = 'starts_at';
    $this->orderable[] = 'ends_at';

    $this->fillable[] = 'trial_ends_at';
    $this->fillable[] = 'starts_at';
    $this->fillable[] = 'ends_at';
    $this->fillable[] = 'status';
    $this->fillable[] = 'cancels_at';
    $this->fillable[] = 'canceled_at';
    $this->fillable[] = 'timezone';
    $this->fillable[] = 'is_active';
  }

  protected $appends = [];
  protected $orderable = [];
  protected $filterable = [];
  protected $fillable = [];
  protected $translatable = [];

  public function getTable()
  {
    return config('hive-stream.table_names.subscriptionPlansx');
  }



}
