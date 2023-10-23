<?php

return [
    'hasJetstream' => false,
    'stack' => 'livewire',
    // 'features' => [Features::accountDeletion()],
    'profile_photo_disk' => 'public',
    'process' => [
      'createPersonalteamOnRegistration' => true,
      'defaultTeamCode' => '4000',

    ],
    'models'             => [
      'profile'                     => Sixincode\HiveStream\Models\Profile::class,
      'setting'                     => Sixincode\HiveStream\Models\Setting::class,
      'subscriptionPlan'            => Sixincode\HiveStream\Models\SubscriptionPlan::class,
      'subscriptionPlanx'           => Sixincode\HiveStream\Models\SubscriptionPlanx::class,
      'subscriptionFeature'         => Sixincode\HiveStream\Models\SubscriptionFeature::class,
      'subscriptionUsage'           => Sixincode\HiveStream\Models\SubscriptionUsage::class,
     ],

    'table_names'         => [
      'logins'                   => 'logins',
      'profiles'                 => 'profiles',
      'settings'                 => 'settings',
      'subscriptionPlans'        => 'saas_plans',
      'subscriptionPlansx'       => 'saas_plansx',
      'subscriptionFeatures'     => 'saas_services',
      'subscriptionFeaturePlan'  => 'saas_plan_service',
      'subscriptionUsages'       => 'saas_usages',
    ],
    'column_names'          => [
      'subscriptionPlans_morph_subscriptionPlan'         => 'saas_plan_id',
      'subscriptionPlansx_morph_subscriptionPlanx'       => 'saas_planx_id',
      'subscriptionFeatures_morph_subscriptionFeature'   => 'saas_service_id',
      'subscriptionPlans_morph_id'                       => 'saas_planx_id',
      'subscriptionPlans_morph_type'                     => 'saas_planx_type',
      'subscriptionPlan_identifier'                      => 'saas_planx',

    ],
    'routes' => [
      'central' =>   [
            'prefix' => null,
            'middlewares' => [
              'default' => ['web'],
            ],
       ],
      'admin' =>   [
           'prefix' => 'admin',
           'middlewares' => ['web','auth:web'],
       ],
      'user' =>   [
          'prefix' => 'home',
          'middlewares' =>      [
            'default'   =>  ['web','auth:web'],
            'verified'  =>  ['user_verified'],
          ],
        ],
       'api' =>   [
             'prefix' => 'api',
             'middlewares' => ['api'],
        ],
    ],
];
