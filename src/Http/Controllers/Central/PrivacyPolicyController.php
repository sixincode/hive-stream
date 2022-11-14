<?php

namespace Sixincode\HiveStream\Http\Controllers\Central;

use Illuminate\Routing\Controller;

class PrivacyPolicyController extends Controller
{
  public function showPrivacy()
  {
    return view('hive-stream::central.privacy.index');
  }
}
