<?php

namespace Sixincode\HiveStream\Traits;

use Illuminate\Database\Schema\Blueprint;
use Sixincode\HiveHelpers\Traits\FieldsTrait;
use Sixincode\HiveAlpha\Traits\HiveAlphaDatabase;

trait HiveStreamDatabase
{
  use FieldsTrait, HiveAlphaDatabase;

  public static function addsubscriptionPlanFields(Blueprint $table , $properties =[]): void
  {
    $table->addAlphaModelFields($table);
    $table->integer('level')->default(2000);
    $table->string('type')->default('main');
    $table->decimal('price')->default('0.00');
    $table->decimal('annual_price')->nullable();
    $table->decimal('signup_fee')->default('0.00');
    $table->string('currency',4)->default('CAD');
    $table->smallInteger('trial_period')->unsigned()->default(7);
    $table->string('trial_interval')->default('day');
    $table->smallInteger('invoice_period')->unsigned()->default(1);
    $table->string('invoice_interval')->default('month');
    $table->smallInteger('grace_period')->unsigned()->default(3);
    $table->string('grace_interval')->default('day');
    $table->tinyInteger('prorate_day')->unsigned()->nullable();
    $table->tinyInteger('prorate_period')->unsigned()->nullable();
    $table->tinyInteger('prorate_extend_due')->unsigned()->nullable();
    $table->smallInteger('active_subscribers_limit')->unsigned()->nullable();
    $table->string('colour')->nullable();
    $table->isFeaturedField();
    $table->isDefaultField();
    $table->isPrivateField();
    $table->isActiveField();
    $table->sortOrderField();
  }

  public static function addSubscriptionFeatureFields(Blueprint $table , $properties = []): void
  {
    $table->addAlphaModelFields($table);
    $table->string('code',16)->nullable();
    $table->smallInteger('resettable_period')->unsigned()->default(0);
    $table->string('resettable_interval')->default('month');
    $table->isFeaturedField();
    $table->isDefaultField();
    $table->isActiveField();
    $table->sortOrderField();
  }

  public static function addSubscriptionFeaturePlanFields(Blueprint $table , $properties = []): void
  {
    $table->foreignId(config('hive-stream.column_names.subscriptionPlans_morph_subscriptionPlan'))
          ->constrained(config('hive-stream.table_names.subscriptionPlans'))
          ->onDelete('cascade')
          ;

    $table->foreignId(config('hive-stream.column_names.subscriptionFeatures_morph_subscriptionFeature'))
          ->constrained(config('hive-stream.table_names.subscriptionFeatures'))
          ->onDelete('cascade')
          ;

    $table->propertiesSchemaField();
    $table->isActiveField();

    $table->unique([
      config('hive-stream.column_names.subscriptionPlans_morph_subscriptionPlan'),
      config('hive-stream.column_names.subscriptionFeatures_morph_subscriptionFeature')
    ]);
  }

  public static function addSubscriptionPlanxFields(Blueprint $table , $properties = []): void
  {
    $table->id();
    $table->foreignId(config('hive-stream.column_names.subscriptionPlans_morph_subscriptionPlan'))
          ->constrained(config('hive-stream.table_names.subscriptionPlans'))
          ->onDelete('cascade');
    $table->morphs(config('hive-stream.column_names.subscriptionPlan_identifier'));
    $table->dateTime('trial_ends_at')->nullable();
    $table->dateTime('starts_at')->nullable();
    $table->dateTime('ends_at')->nullable();
    $table->tinyInteger('status')->default(0);
    $table->dateTime('cancels_at')->nullable();
    $table->dateTime('canceled_at')->nullable();
    $table->string('timezone')->nullable();
    $table->isActiveField();
    $table->propertiesSchemaField();
    $table->timestamps();

    $table->unique([
      config('hive-stream.column_names.subscriptionPlans_morph_subscriptionPlan'),
      config('hive-stream.column_names.subscriptionPlans_morph_id'),
      config('hive-stream.column_names.subscriptionPlans_morph_type')
    ]);
  }

  public static function addSubscriptionUsageFields(Blueprint $table , $properties = []): void
  {
      $table->increments('id');
      $table->foreignId(config('hive-stream.column_names.subscriptionPlansx_morph_subscriptionPlanx'))
            ->constrained(config('hive-stream.table_names.subscriptionPlansx'))
            ->onDelete('cascade');
      $table->isActiveField();
      $table->dateTime('deadline')->nullable();
      $table->string('timezone')->nullable();
      $table->tinyInteger('status')->nullable();
      $table->timestamps();
      $table->softDeletes();
      $table->globalField();

      $table->unique([config('hive-stream.column_names.subscriptionPlansx_morph_subscriptionPlanx'), 'deadline']);
  }

  public static function addProfileFields(Blueprint $table , $properties = []): void
  {
      $table->addAlphaModelFields($table);
      $table->string('type')->default();
      $table->string('genre')->nullable();
      $table->date('billing_date')->nullable();
      $table->integer('billing_cycle')->default(12);
      $table->isFeaturedField();
      $table->isDefaultField();
      $table->isPrivateField();
      $table->sortOrderField();
      $table->morphToOwner();
  }

  public static function addSettingsFields(Blueprint $table , $properties = []): void
  {
      $table->id();
      $table->string('type')->nullable();
      $table->morphToOwner();
      $table->propertiesSchemaField();
      $table->dataSchemaField();
      $table->globalField();
  }

  public static function addLoginFields(Blueprint $table , $properties = []): void
  {
    $table->id();
    $table->ipAddress('ip_address')->nullable();
    $table->timestamp('time');
    $table->dataSchemaField();
  }



}
