<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\CategoryDestination;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Contact ;
use App\Models\Departure;
use App\Models\Destination;
use App\Models\Testimonial;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB ;

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
      $reviews=DB::table('testimonials')->join('package_testimonial','package_testimonial.testimonial_id','testimonials.id')->where('testimonials.status',1)->where('package_testimonial.package_id',$id)->orderBy('testimonials.id','desc')->limit(20)->get();
      $features=DB::table('packages')->join('package_featured','packages.id','package_featured.featured_id')->where('package_featured.package_id',$id)->select('packages.*')->where('status',1)->get();
      $before=Destination::find($package->destination_id);

      return view('frontend.package_detail',compact('package','reviews','features','before'));
}

public function printpackage($id){
     $package = Package::findOrFail($id);
     // dd($package);
     return view('frontend.package_print',compact('package'));
}



public function Departure(Request $request){
     $package=Package::find($request->packageid);
      $departures=Departure::where('status',1)->orderBy('start_date')->where('package_id',$request->packageid)->whereYear('start_date', '=', $request->year)->whereMonth('start_date', '=', $request->month)->where('start_date', '>=', Carbon::today())->get();
     
     return view('frontend.departure',compact('departures','package'));

}



         

public function Testimonial(Request $request){
     $packages=Package::where('status',1)->get();
     // Carbon::now();
     if($request->package){
             $packagefinder=Package::find($request->package);
             $testimonials=$packagefinder->testimonials()->paginate(20);
            
     }
     else{
          $testimonials = Testimonial::where('status',1)->orderBy('id','desc')->paginate(20);
      
     }
     return view('frontend.testimonial',compact('testimonials','packages'));
}




public function testimonialStore(Request $request)
{
    try {
        DB::beginTransaction();
        $testimonials = new  Testimonial;
        $testimonials->name = $request->name;
        $testimonials->title = $request->title;
        $testimonials->content = $request->content;
        $testimonials->status = 1;
        $testimonials->rating = $request->rating;

        $testimonials->date = today();
        $banner = $request->file('file');
        if ($banner) {
            $fname = rand() . $request->name . $banner->getClientOriginalExtension();
            $testimonials->image = 'upload/testimonial/' . $fname;
            $banner->move(public_path() . '/upload/testimonial/', $fname);
        }
        if ($testimonials->save()) {
                $package_testmonial = [];
                $package_testmonial['package_id'] = $request->package;
                $package_testmonial['testimonial_id'] = $testimonials->id;
                DB::table('package_testimonial')->insert($package_testmonial);
        }

DB::commit();

        $notification = array(
            'alert-type' => 'success',
            'messege' => 'Successfully submitted testimonial',

        );
    } catch (\Throwable $qE) {
DB::rollBack();
        $notification = array(
            'alert-type' => 'error',
            'messege' => 'Failed to Added Testimonial.',

        );
    }

    return redirect()->back()->with($notification);
}


}