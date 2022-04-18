<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\CategoryDestination;
use App\Models\Destination;
use App\Models\Cms;

class HomeController extends Controller
{



public function getIndex() {
     
      return view('frontend.index');
}




}