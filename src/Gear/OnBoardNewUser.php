<?php

namespace Sixincode\HiveStream\Gear;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Validation\Rule;

class OnBoardNewUser implements CreatesNewUsers
{
  use PasswordValidationRules;

  /**
   * Validate and create a newly registered user.
   *
   * @param  array<string, string>  $input
   */
  public function create(array $input): User
  {
      Validator::make($input, [
          'name'       => ['required_without:first_name,last_name', 'string', 'max:255'],
          'username'   => ['string', 'max:255', Rule::unique(User::class)],
          'first_name' => ['required_without:name', 'string', 'max:255', 'min:2'],
          'last_name'  => ['required_without:name', 'string', 'max:255','min:2'],
          'email'      => ['required','string','email','max:255', Rule::unique(User::class),],
          'password'   => $this->passwordRules(),
          'terms'      => check_hasTermsAndPrivacyPolicyFeatures() ? ['accepted', 'required'] : '',
      ])->validate();

      return DB::transaction(function () use ($input) {
          return tap(User::create([
              'first_name' => $input['first_name'],
              'last_name'  => $input['last_name'],
              'username'   => $input['username'],
              'email'      => $input['email'],
              'password'   => Hash::make($input['password']),
          ]), function (User $user) {
            if(check_hasTeamFeatures()){
              $this->getBehaviour($user);
            }
          });
      });
  }

  /**
   * Check team seetings to apply behaviour.
   */
  private function getBehaviour($user)
  {
    if(check_hasTeamAppDefaultMembershipFeatures()){
       $this->addToDefaultCommunity($user);
    }
    
    if(check_hasTeamOwnershipOnCreateFeatures()){
       $this->createTeam($user);
    }
  }

  /**
   * Create a personal team for the user.
   */
  protected function createTeam(User $user): void
  {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => $user->username,
            'personal_team' => true,
            'code'          => check_getDefaultTeamCode(),
            'reference'     => check_getDefaultTeamReference(),
        ]));
  }

  /**
   * Add user to default App Team.
   */
  protected function addToDefaultCommunity(User $user): void
  {
        $defaultTeam = Team::whereCode(check_getDefaultCommunityCode())->first();
        $defaultTeam->users()->attach($user);
  }
}
