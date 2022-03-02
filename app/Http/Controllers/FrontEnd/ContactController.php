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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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


      
	public function Enquery(Request $request) {
            $userIP = $request->ip();
            $ipdata=$this->IPtoLocation($userIP);

                  $request->validate([
                        'name'=>'required',
                        'email'=>'required|email',
                        'phone'=>'required',

                  ]);
            $url = $request->server('HTTP_REFERER');
            $user_agent = $request->server('HTTP_USER_AGENT');
          
                              $booking = Booking::create([
                                    'package'=>$request->booking,
                                    'date'	 =>$request->expected_date,
                                    'source'=>$request->source,
                                    'name'=>$request->name,
                                    'agent'=>$request->agent,
                                    'email' =>$request->email,
                                    'phone'=>$request->phone,
                                    'comment'=>$request->comment,
                                    'type'=>'enquiry',
                                 'no_traveller'=>$request->no_participants,	
                                 'country'=>$request->country,	
                                  'expected_date'=>$request->expected_date,	
                                  'longitude' => $ipdata['longitude'],
                                  'latitude' => $ipdata['latitude'],
                                  'actual_country' =>$ipdata['country_name'],
                                  'actual_place' => $ipdata['region_name'],
                                                     ]);
                        $agent=DB::connection('mysql2')->table('users')->where('id',$request->agent)->first()->name;
                        $data = [
                              'name' => $request->name,
                              'myemail' => $request->email,
                              'subject' =>($request->subject)?$request->subject:'Inquiry',
                              'mycontact'=>$request->phone,
                              'mycomment'=>$request->comment,	
                              'country'=>$request->country,	
                              'no_participants'=>$request->no_participants,	
                              'expected_date'=>$request->expected_date,
                              'package_name'=>$request->package_name,	
                              'user_info'=> "Url: {$url} <br> | IP:<a href='https://www.ip-tracker.org/locator/ip-lookup.php?ip={$userIP}'>Click here to view more info :{$userIP}</a>" ,
                              'source'=>$agent
                        ];
                        
            // return view('emails.contactus',$data);
                        $result = Mail::send('email.enquiry', $data, function ($message) use ($data){
                              $message->from('noreply@nepalvisiontreks.com','Nepal Vision');
                              $message->subject($data['subject']);
                              $message->to('sales@nepalvisiontreks.com');	
                              
                              $message->bcc('yubraj.misfit@gmail.com');			
                        });
                    
            
                        $notification=array(
                              'alert-type'=>'success',
                              'messege'=>'Thank you for contacting us.',
                             
                           );
            
                           return redirect()->route('pay.thanku')->with($notification);
                  }


                  







                  

function IPtoLocation($ip){ 
      $apiURL = 'https://freegeoip.app/json/'.$ip; 
       
      // Make HTTP GET request using cURL 
      $ch = curl_init($apiURL); 
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
      $apiResponse = curl_exec($ch); 
      if($apiResponse === FALSE) { 
          $msg = curl_error($ch); 
          curl_close($ch); 
          return false; 
      } 
      curl_close($ch); 
       
      // Retrieve IP data from API response 
      $ipData = json_decode($apiResponse, true); 
       
      // Return geolocation data 
      return !empty($ipData)?$ipData:false; 
  }



}
