<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\CategoryDestination;
use App\Models\CategoryPlace;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Destination;
use DB;
use Str;

class DestinationController extends Controller
{

public function index($id,$url) {
	$categories = CategoryDestination::where('destination_id',$id)->where('status',1)->get();
	$packages = Package::where('destination_id',$id)->where('status',1)->where('price','!=',0)->limit(8)->orderBy('id','desc')->get();
	$data = Destination::where('id',$id)->first();

      return view('frontend.destination',compact('categories','packages','data'));
}

public function loadCategory($data) {
      // dd($request->all());
  $categories = CategoryDestination::where('destination_id', $data)->where('status',1)->orderBy('name')->get();
  return $categories;
}

public function loadRegion($data) {
  $categories = CategoryPlace::where('category_destination_id', $data)->where('status',1)->orderBy('name')->get();
  return $categories;
}

public function search(Request $request) {
  $query="SELECT * FROM  `packages` WHERE `status`=1 ";

  if(isset($request->destination)&&!empty($request->destination)){
    $query.=" AND `destination_id`=$request->destination ";
  }
  $query="SELECT * FROM  `packages` WHERE `status`=1  ";
  if(isset($request->category)&&!empty($request->category)){
    $query.=" AND `category_destination_id`=$request->category ";
}

if(isset($request->month)&&!empty($request->month)){
  $query.=" AND `best_month` LIKE '%$request->duration%' ";
  
}
$package_s=DB::select($query);

  if(count($package_s)>0){
    $packages= $package_s;

  }else{
    $query="SELECT * FROM  `packages` WHERE `status`=1 ";
    if(isset($request->destination)&&!empty($request->destination)){
      $query.=" AND `destination_id`=$request->destination ";
    }
    if(isset($request->category)&&!empty($request->category)){
        $query.=" AND `category_destination_id`=$request->category ";
    }

    $packages=DB::select($query);
  }

    
      $data=Destination::find($request->destination);
      $categories=CategoryDestination::where('destination_id',$request->destination)->where('status',1)->get();

      $durations=Package::groupBy('duration')->select('duration')->where('destination_id',$request->destination)->where('duration','!=',null)->where('status',1)->get();
      $activities=Package::groupBy('activity')->select('activity')->where('destination_id',$request->destination)->where('activity','!=',null)->where('status',1)->get();

      return view('frontend.search',compact('packages','data','categories','durations','activities'));
    }





    public function getAjaxpackage(Request $request) {
       $query="SELECT * FROM  `packages` WHERE `status`=1 AND `destination_id`=$request->destination ";
      if(isset($request->category)&&!empty($request->category)){
          $query.=" AND `category_destination_id`=$request->category ";
      }
      if(isset($request->duration)&&!empty($request->duration)){
        $query.=" AND `duration`= '$request->duration' ";
        
      }

      if(isset($request->activity)&&!empty($request->activity)){
        $query.=" AND `activity`= '$request->activity' ";
        
      }
      
      $packages=DB::select($query);
$data='';
   foreach($packages as $package){
        $data.= "<div class='col-md-4 col-sm-6 col-12'>
       <div class='card-style-2 '>
            <a href='". route('package.detail',['url'=>$package->url]) ."' class='text-decoration-none'>
           <div class='img-container'>
               <img src='".asset('frontend/assets/tour-1.png')."' alt='' class='img-fluid w-100 w-100'>
           </div>
           <div class='img-desc'>
               <div class='about-img row'>
                   <div class='col-6'>
                      <p class='px-0 mx-0'>";

                       if (!empty($package->duration))
                       {
                        $data.= $package->duration ."|";

                       }
                       
                       if (!empty($package->activity))
                       {
                        $data.= Str::limit($package->activity,20) ;

                       }
                           
                       
                       $data.=  " </p> 

               </div>
               <div class='col-6 '>

                   <div class='rating'>";
                       for ($i=1;$i<=$package->rating;$i++)
                       {

                       
                        $data.="<i class='fas fa-star'></i> ";
                        }
                       for ($i=1;$i<=5-$package->rating;$i++)
                       {
                        $data.=   "<i class='far fa-star'></i> ";
                       
                      }
                    
                      $data.=   "</div>
               </div>
               </div>
               <div class='title'>";
               $data.=Str::limit($package->name,35,'...');
               
               $data.=" </div>
               <div class='price'>
                       \$USD  $package->price .

                   
               </div>
           </div>
   </a>

       </div>
   </div>";
       }
      return $data;
    }









}