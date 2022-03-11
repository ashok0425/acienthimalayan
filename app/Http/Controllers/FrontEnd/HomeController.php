<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\CategoryDestination;
use App\Models\Destination;
use App\Models\Cms;

class HomeController extends Controller
{

// function __construct()
// {
      
//       $data['quick_trips'] = CategoryDestination::where('quick_trips',1)->where('status',1)->orderBy('order')->get();
//       $data['destination_not_nepal'] = Destination::whereIn('id',[10,11])->where('status',1)->get();

//       view()->share($data);
// }


public function getIndex() {
     
      return view('frontend.index');
}


public function Page($page) {
      $data = Cms::where('status', 1)->where('main_or_sub',1)->where('url',$page)->orderBy('position')->with('child')->first();
      return view('frontend.page',compact('data'));
}

public function PageDetail($page,$url=null) {
      if (!isset($url)) {
            $data = Cms::where('status', 1)->where('url',$page)->first();

      }else{
            $data = Cms::where('status', 1)->where('parent_id',$page)->where('url',$url)->first();
             $page=Cms::where('id',$page)->value('url');
      }
      return view('frontend.page_detail',compact('data','page'));
}



}