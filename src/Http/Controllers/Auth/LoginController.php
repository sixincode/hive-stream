<?php

namespace Sixincode\HiveStream\Http\Controllers\Auth;

use Illuminate\Routing\Controller;

class LoginController extends Controller
{
  public function loginPage()
  {
    return view('hive-stream::auth.login');
  }

  public function loginSubmit()
  {
    // return view('hive-stream::auth.register');
  }
}
