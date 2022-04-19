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




public function blog() {
     
      return view('frontend.blogs');
}


public function BlogDetail($id) {
     $blog=Blog::find($id);
      return view('frontend.blog_detail',compact('blog'));
}




public function contactStore(Request $request) {
     
      $request->validate([
            'fname'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required',
      ]);
     $contact=new Contact;
     $contact->name=$request->fname.$request->lname;
     $contact->email=$request->email;
     $contact->phone=$request->phone;
     $contact->message=$request->message;
     $contact->status=0;
     $contact->save();

Notification::route('mail', ['info@falcontechnepal.com',$request->email])
  ->notify(new Enquiry($contact->id));


  $notification=array(
      'alert-type'=>'success',
      'messege'=>'Your query has been placed we will get back to you as soon as possible.',

   );
   return redirect()->back()->with($notification);

}




}