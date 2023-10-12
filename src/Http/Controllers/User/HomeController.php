<?php

namespace Sixincode\HiveStream\Http\Controllers\User;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
  public function homePage()
  {
    return view('hive-stream::user.home.index');
  }

  public function profilePage()
  {
    return view('hive-stream::user.profile.index');
  }

  public function profilePageShow()
  {
    return view('hive-stream::user.profile.show');
  }
}
