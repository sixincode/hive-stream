<?php

namespace Sixincode\HiveStream\Traits;

use Sixincode\HiveStream\Models\SubscriptionPlan;
use Illuminate\Database\Eloquent\Builder;

trait IsFeatureToSubscriptionPlan
{
  public static function getsubscriptionPlanClassName(): string
  {
      return config('hive-stream.models.subscriptionPlan', SubscriptionPlan::class);
  }

  public function subscriptionPlans()
  {
    return $this->belongsToMany(
                    self::getsubscriptionPlanClassName(),
                    config('hive-stream.table_names.subscriptionFeaturePlan')
                    config('hive-stream.column_names.subscriptionFeatures_morph_subscriptionFeature'),
               );
  }

  /**
 * Scope models by plan id.
 *
 * @param \Illuminate\Database\Eloquent\Builder $builder
 * @param int                                   $planId
 *
 * @return \Illuminate\Database\Eloquent\Builder
 */
  public function scopeByPlanId(Builder $builder, int $planId): Builder
  {
      return $builder->where(config('hive-stream.column_names.subscriptionPlan_identifier'), $planId);
  }
}
