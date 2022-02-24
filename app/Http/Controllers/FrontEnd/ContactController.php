<?php

namespace App\Http\Controllers\FrontEnd;

use App\Homesection;
use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\MainSlider;
use App\Models\Package;
use App\Models\SectionControl;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Website;

class ContactController extends Controller
{

      public function index()
      {
            $detail = Website::where('id', 1)->first();
            return view('frontend.contact', compact('detail'));
      }



      public function Store(Request $request)
      {
            $request->validate([
                  'name' => 'required',
                  'email' => 'required|email',
                  'comment' => 'required',


            ]);
try {
      //code...
        $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->comment = $request->comment;
            $contact->save();
            $notification=array(
                  'alert-type'=>'success',
                  'messege'=>'Query placed sucessfully.',
                 
               );
      } catch (\Throwable $th) {
            $notification=array(
                  'alert-type'=>'error',
                  'messege'=>'Failed to place query. Try again.',
                 
               );

      }
      return redirect()->back()->with($notification);
          
           
      }
}
