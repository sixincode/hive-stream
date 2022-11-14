<?php

namespace Sixincode\HiveStream\Http\Controllers\User;

use Illuminate\Routing\Controller;

class ApiTokenController extends Controller
{
  public function tokens()
  {
    return view('hive-stream::user.tokens.index');
  }
}
