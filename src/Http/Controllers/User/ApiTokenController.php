<?php

namespace Sixincode\HiveStream\Http\Controllers\User;

use Illuminate\Routing\Controller;

class ApiTokenController extends Controller
{
  public function tokensPage()
  {
    return view('hive-stream::user.tokens.index');
  }
}
