<?php

namespace Sixincode\HiveStream\Models;

use Sixincode\HiveAlpha\Models\HiveModel;
use Sixincode\HiveHelpers\Traits\IsActiveTrait;
use Sixincode\HiveHelpers\Traits\IsDefaultTrait;
use Sixincode\HiveHelpers\Traits\IsFeaturedTrait;
use Sixincode\HiveHelpers\Traits\IsPrivateTrait;
use Sixincode\HiveHelpers\Traits\sortOrderTrait;
use Sixincode\HiveHelpers\Traits\HasSlugTrait;

class SubscriptionPlan extends HiveModel
{
  use IsActiveTrait;
  use IsDefaultTrait;
  use IsFeaturedTrait;
  use IsPrivateTrait;
  use sortOrderTrait;
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
    $this->filterable[] = 'level';

    $this->orderable[] = 'id';
    $this->orderable[] = 'name';
    $this->orderable[] = 'type';

    $this->fillable[] = 'name';
    $this->fillable[] = 'description';
    $this->fillable[] = 'type';
    $this->fillable[] = 'level';
    $this->fillable[] = 'annual_price';
    $this->fillable[] = 'signup_fee';
    $this->fillable[] = 'trial_period';
    $this->fillable[] = 'trial_interval';
    $this->fillable[] = 'invoice_period';
    $this->fillable[] = 'invoice_interval';
    $this->fillable[] = 'grace_period';
    $this->fillable[] = 'grace_interval';
    $this->fillable[] = 'prorate_day';
    $this->fillable[] = 'prorate_period';
    $this->fillable[] = 'prorate_extend_due';
    $this->fillable[] = 'active_subscribers_limit';
  }
  protected $appends = [];
  protected $orderable = [];
  protected $filterable = [];
  protected $fillable = [];
  protected $translatable = [];
  // public $table = 'saas_plans';

  public function getTable()
  {
    return config('hive-stream.table_names.subscriptionPlans');
  }

  public function getDetailsArray()
  {
    return [
      "headline"      => $this->name,
      "body"          => $this->description,
      "routes"        => self::getRoutingArray(),
      "icon"          => "plan",
      "price_monthly" => $this->price['monthly'],
      "price_yearly"  => $this->price['monthly'],
    ];
  }

  public function getRoutingArray()
  {
    return [
      "index"     => route("subscriptionPlans.index"),
      "create"    => route("subscriptionPlans.show", $this->slug),
      "add"       => route("subscriptionPlans.add", $this->slug),
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

  public static function getDefaultUserPlan()
  {
    return self::whereLevel(2002)->first();
  }
  /**
   * The plan may have many features.
   *
   * @return \Illuminate\Database\Eloquent\Relations\morphedByMany
   */
  public function planFeatures()
  {
      return $this->belongsToMany(
        SubscriptionFeature::class,
        config('hive-stream.table_names.subscriptionFeaturePlan'),
        config('hive-stream.column_names.subscriptionPlans_morph_subscriptionPlan'),
        config('hive-stream.column_names.subscriptionFeatures_morph_subscriptionFeature')
      )->withPivot('is_active', 'properties');
  }

  /**
   * The plan may have many user subscriptions.
   *
   * @return \Illuminate\Database\Eloquent\Relations\morphedByMany
   */
  public function planUserSubscribers()
  {
      return $this->morphedByMany(
        config('hive-helpers.models.user'),
        config('hive-stream.column_names.subscriptionPlan_identifier')
      )->withPivot('trial_ends_at', 'starts_at','status');
   }

   /**
    * Check if plan is free.
    *
    * @return bool
    */
   public function isFree(): bool
   {
       return (float) $this->price <= 0.00;
   }

   /**
    * Check if plan has trial.
    *
    * @return bool
    */
   public function hasTrial(): bool
   {
       return $this->trial_period && $this->trial_interval;
   }

   /**
    * Check if plan has grace.
    *
    * @return bool
    */
   public function hasGrace(): bool
   {
       return $this->grace_period && $this->grace_interval;
   }

   /**
    * Get plan feature by the given slug.
    *
    * @param string $featureSlug
    *
    * @return SubscriptionFeature|null
    */
   public function getPlanFeatureBySlug(string $featureSlug): ?SubscriptionFeature
   {
       return $this->planFeatures()->where('slug', $featureSlug)->first();
   }

}
