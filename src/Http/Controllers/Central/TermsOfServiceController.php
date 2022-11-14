<?php

namespace Sixincode\HiveStream\Http\Controllers\Central;

use Illuminate\Routing\Controller;

class TermsOfServiceController extends Controller
{
  public function showTerms()
  {
    return view('hive-stream::central.terms.index');
  }
}
