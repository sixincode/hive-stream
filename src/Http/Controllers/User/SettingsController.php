<?php

namespace Sixincode\HiveStream\Http\Controllers\User;

use Illuminate\Routing\Controller;

class SettingsController extends Controller
{
  public function tokens()
  {
    return view('hive-stream::user.settings.index');
  }
}
