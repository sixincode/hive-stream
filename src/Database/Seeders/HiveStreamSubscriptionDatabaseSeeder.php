<?php

namespace Sixincode\HiveStream\Database\Seeders;

use Sixincode\HiveStream\Models\SubscriptionPlan;
use Sixincode\HiveStream\Models\SubscriptionFeature;
use Illuminate\Database\Seeder;
use App\Models\User;

class HiveStreamSubscriptionDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $faker = \Faker\Factory::create();
      $fakerFR = \Faker\Factory::create('fr_FR');

      SubscriptionPlan::create([
          'name' => [
            'en'=> 'Basic',
            'fr'=> 'Basic',
          ],
          'description' => [
            'en'=> 'Ideal for individuals that need a custom solution with custom tools.',
            'fr'=> 'Ideal pours les individus ayant besoin de solution sur mesure avec des outils personalises.',
          ],
          'level' => 2001,
          'price' => 5,
          'annual_price' => 50,
          'trial_period' => 14,
          'sort_order' => 1,
          // 'color' => 1,
          'is_active' => 1,
          'is_private' => 0,
      ]);

      SubscriptionPlan::create([
          'name' => [
            'en'=> 'Standard',
            'fr'=> 'Standard',
          ],
          'description' => [
            'en'=> 'Ideal for individuals that need custom tools and development solutions.',
            'fr'=> 'Ideal pours les individus ayant besoin d\'outils personalises des solutions de development.',
          ],
          'level' => 2002,
          'trial_period' => 7,
          'price' => 8,
          'annual_price' => 82,
          'sort_order' => 2,
          // 'color' => 1,
      ]);

      SubscriptionPlan::create([
          'name' => [
            'en'=> 'Advanced',
            'fr'=> 'Advanced',
          ],
          'description' => [
            'en'=> 'Ideal for businesses that need tailor made advanced  tools and solutions.',
            'fr'=> 'Ideal pours les businesses ayant besoin d\'outils et solutions sur mesure.',
          ],
          'trial_period' => 7,
          'level' => 2003,
          'price' => 12,
          'annual_price' => 130,
          'sort_order' => 3,
          // 'color' => 1,
      ]);

      SubscriptionFeature::create([
          'name' => [
            'en'=> 'Plus',
            'fr'=> 'Plus',
          ],
          'description' => [
            'en'=> 'Ideal for individuals that need a custom solution with custom tools and business solutions',
            'fr'=> 'Ideal pours les individus ayant besoin de solution sur mesure avec des outils personalises and business solutions',
          ],
          'code' => 2000,
          'is_active' => 1,
          'sort_order' => 3,
          // 'color' => 1,
      ]);

      $order= 0;
      foreach(range(1, 18) as $id){
        $order += 1;
        SubscriptionFeature::create([
         'name' => [
            'en'=> $faker->unique()->catchPhrase ,
            'fr'=> $fakerFR->unique()->catchPhrase ,
          ],
        'description' => [
          'en'=> $faker->unique()->paragraph,
          'fr'=> $fakerFR->unique()->paragraph,
          ],
        'code' => $faker->unique()->asciify('******'),
        'is_active' => 1,
        'sort_order' => $order,
       ]);
     }

     $subscriptionPlans         = SubscriptionPlan::whereBetween('level',[2000, 2999])->get();
     $subscriptionPlanTwo       = SubscriptionPlan::whereLevel(2002)->first();
     $subscriptionPlanThree     = SubscriptionPlan::whereLevel(2003)->first();
     $subscriptionFeaturesOne   = SubscriptionFeature::take(7)->pluck('id');
     $subscriptionFeaturesTwo   = SubscriptionFeature::whereNotIn('id',$subscriptionFeaturesOne)->take(3)->pluck('id');
     $subscriptionFeaturesThree = SubscriptionFeature::whereNotIn('id',$subscriptionFeaturesOne)->whereNotIn('id',$subscriptionFeaturesTwo)->take(3)->pluck('id');

       foreach($subscriptionPlans as $subscriptionPlan){
         $subscriptionPlan->planFeatures()->attach($subscriptionFeaturesOne);
       }
     $subscriptionPlanTwo->planFeatures()->attach($subscriptionFeaturesTwo);
     $subscriptionPlanThree->planFeatures()->attach($subscriptionFeaturesTwo);
     $subscriptionPlanThree->planFeatures()->attach($subscriptionFeaturesThree);
     $admin = User::whereUsername('admin')->first();
     $admin->newPlanSubscription($subscriptionPlanTwo);


    }
}
