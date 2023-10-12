<?php

namespace Sixincode\HiveStream\Http\Controllers\User;

use Illuminate\Routing\Controller;

class BoardingController extends Controller
{
  public function boardingPage()
  {
    return view('hive-stream::user.boarding.index');
  }
}
