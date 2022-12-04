<?php

namespace Sixincode\HiveStream\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Sixincode\HiveStream\Gear\OnBoardNewUser;
use Sixincode\HiveStream\Contracts\OnBoardNewUserResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationControllerxx extends Controller
{

  protected $guard;

  /**
   * Create a new controller instance.
   *
   * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
   * @return void
   */
  public function __construct(StatefulGuard $guard)
  {
      $this->guard = $guard;
  }
  public function registrationPage()
  {
    return view('hive-stream::auth.register');
  }

  public function registrationSubmit(Request $request,
                                     OnBoardNewUser $creator)
  {
    event(new Registered($user = $creator->create($request->all())));
    // dd($user);
    // auth()->login($user);
    // auth()->guard('web')->login($user);
     Auth::guard('web')->login($user);
     return redirect()->route('user.home')->with('success','Welcome !');
  }
}
