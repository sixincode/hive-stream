<?php

namespace Sixincode\HiveStream\Http\Controllers\User;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
  public function home()
  {
    return view('hive-stream::user.home.index');
  }

  public function profile()
  {
    return view('hive-stream::user.profile.index');
  }
}
