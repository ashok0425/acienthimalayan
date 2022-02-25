<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\CategoryDestination;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Contact ;
use App\Models\Destination;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class PackageController extends Controller
{
 public function destination($id,$url) {
      $packages = Package::where('destination_id',$id)->where('status',1)->where('price','!=',0)->orderBy('id','desc')->paginate(12);
      $data=Destination::find($id);
      return view('frontend.package',compact('packages','data'));
 }

 public function all() {
     $packages = Package::where('status',1)->where('price','!=',0)->orderBy('id','desc')->paginate(20);
     $data=Destination::find(8);
     return view('frontend.package',compact('packages','data'));
}

 public function category($id,$url) {
      $packages = Package::where('category_destination_id',$id)->where('status',1)->where('price','!=',0)->orderBy('id','desc')->paginate(12);
      $data=CategoryDestination::find($id);
      return view('frontend.package',compact('packages','data'));
 }

public function show($id,$url) {
	$package = Package::where('id',$id)->first();
      $reviews=FacadesDB::table('testimonials')->join('package_testimonial','package_testimonial.testimonial_id','testimonials.id')->where('testimonials.status',1)->where('package_testimonial.package_id',$package->id)->orderBy('testimonials.id','desc')->get();
      $features=DB::table('packages')->join('package_featured','packages.id','package_featured.featured_id')->where('package_featured.package_id',$package->id)->where('status',1)->get();
      $before=Destination::find($package->destination_id);
      return view('frontend.package_detail',compact('package','reviews','features','before'));
}

public function printpackage($id){
     $package = Package::findOrFail($id);
     // dd($package);
     return view('frontend.package_print',compact('package'));
}





         









}