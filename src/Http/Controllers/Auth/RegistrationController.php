<?php

namespace Sixincode\HiveStream\Http\Controllers\Auth;

use Illuminate\Routing\Controller;

class RegistrationController extends Controller
{
  public function registrationPage()
  {
    return view('hive-stream::auth.register');
  }
}
