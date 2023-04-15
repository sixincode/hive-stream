<?php

namespace Sixincode\HiveStream\Gear;

use Sixincode\HiveCommunity\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Sixincode\HiveStream\Contracts\OnBoardNewUsers;
use Sixincode\HiveStream\Traits\HasPassword;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;

class OnBoardNewUser extends Controller
{
 use HasPassword;

 public function create(array $input)
 {
     Validator::make($input, [
         'name' => ['required_without:first_name,last_name', 'string', 'max:255'],
         'username' => ['string', 'max:255', 'unique:users'],
         'first_name' => ['required_without:name', 'string', 'max:255', 'min:2'],
         'last_name' => ['required_without:name', 'string', 'max:255','min:2'],
         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
         'password' => $this->passwordRules(),
         // 'terms' =>  ['accepted', 'required'],
     ])->validate();

     // return DB::transaction(function () use ($input) {
     //     $input['password'] = Hash::make($input['password']);
     //     return tap(
     //       User::create($input),
     //          function (User $user) {
     //             $this->getBehaviour($user);
     //         }
     //    );
     // });
     return DB::transaction(function () use ($input) {
         return tap(User::create([
             'username' => $input['username'],
             'first_name' => $input['first_name'],
             'last_name' => $input['last_name'],
             'email' => $input['email'],
             'password' => Hash::make($input['password']),
         ]), function (User $user) {
             $this->getBehaviour($user);
         });
     });
 }

 protected function getBehaviour($user)
 {
   if(config('hive-stream.process.createPersonalteamOnRegistration')){
      $this->createTeam($user);
   }else{
      $this->addToDefault($user);
   }
 }


 protected function addToDefault(User $user)
 {
   // $defaultTeam = Team::first();
   $defaultTeam =
   Team::firstOrCreate([
     'code' => config('hive-stream.process.defaultTeamCode'),
     'personal_team' => false,
     ]);
   $defaultTeam->users()->attach($user);

 }

 protected function createTeam(User $user)
 {
   $user->ownedTeams()->save(
     Team::forceCreate([
       'user_id' => $user->id,
       'name' => $user->username,
       'personal_team' => true,
     ]),
   );
  }
}
