<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Package;
use App\Notifications\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification ;



class HomeController extends Controller
{



public function getIndex() {

      return view('frontend.index');
}




public function about() {

      return view('frontend.about');
}



public function packages() {
     $packages=Package::where('status',1)->where('price','!=',null)->get();
      return view('frontend.packages',compact('packages'));
}




public function packageDetail($id) {
     $packages=Package::inRandomOrder()->limit(4)->get();
     $package=Package::find($id);
      return view('frontend.package_detail',compact('packages','package'));
}



public function contact() {

      return view('frontend.contact');
}







public function contactStore(Request $request) {

      $request->validate([
            'name'=>'required',
            'email'=>'nullable|email',
            'phone'=>'required',
      ]);
     $contact=new Contact;
     $contact->name=$request->name;
     $contact->email=$request->email??'disha.samanta@gmail.com';
     $contact->phone=$request->phone;
     $contact->location=$request->location;
     $contact->message=$request->message??"Vehicle booking request";
     $contact->departure_date=$request->departure_date;
     $contact->departure_to=$request->departure_to;
     $contact->type=$request->type??'contact';
     $contact->no_of_person=$request->no_of_person;

     $contact->status=0;
     $contact->save();

     if ($request->type=='vehicle') {
Notification::route('mail', ['disha.samanta@gmail.com'])
  ->notify(new Enquiry($contact->id));
}


  $notification=array(
      'alert-type'=>'success',
      'messege'=>'Your query has been placed we will get back to you as soon as possible.',

   );
   return redirect()->back()->with($notification);

}


public function search(Request $request){
      $keyword=$request->keyword;
      $packages=Package::where('name','LIKE',"%$keyword%")->get();
      return view('frontend.packages',compact('packages'));

}

}
