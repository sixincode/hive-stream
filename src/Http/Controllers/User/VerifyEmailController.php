<?php

namespace Sixincode\HiveStream\Http\Controllers\User;

use Illuminate\Routing\Controller;

class VerifyEmailController extends Controller
{
  public function verifyPage()
  {
    return view('hive-stream::user.verification.request');
  }

  public function checkTokenPage($token)
  {
    return view('hive-stream::user.verification.request');
  }
}
