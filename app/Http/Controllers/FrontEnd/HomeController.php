<?php

namespace App\Http\Controllers\FrontEnd;

use App\Homesection;
use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\MainSlider;
use App\Models\Package;
use App\Models\SectionControl;
use App\Models\Cms;


class HomeController extends Controller
{

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