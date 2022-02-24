<?php

namespace App\Http\Controllers\FrontEnd;

use App\Homesection;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Blog;
use App\Models\Booking;
use App\Models\Category;
use App\Models\CategoryDestination;
use App\Models\CategoryPlace;
use App\Models\Cms;
use App\Models\ContactDetail;
use App\Models\Customer;
use App\Models\Departure;
use App\Models\Destination;
use App\Models\Faq;
use App\Models\ImageUpload;
use App\Models\ImportantLink;
use App\Models\Invoice;
use App\Models\MainSlider;
use App\Models\Newsletter;
use App\Models\Package;
use App\Models\PackageFeatrured;
use App\Models\PopupBanner;
use App\Models\SectionControl;
use App\Models\Testimonial;
use App\Models\Video;
use App\Models\Usercrm;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use View;

class FrontEndController extends Controller
{
	private $status_message = NULL;
    private $alert_type = "success";
     private $testimonial_image_path = "uploads/testimonials";
	
	public function __construct() {
		$data['header_destinations'] = Destination::with('packages','categories_destinations')->orderBy('order')->where('status',1)->get();
		$data['cms_pages'] = Cms::where('status', 1)->where('main_or_sub',1)->where('hide_header',0)->orderBy('position')->with('child')->get();
    	$data['footer_about'] = SectionControl::find(14);
    	$data['footer_our_link'] = SectionControl::find(15);
    	$data['footer_our_link_2'] = SectionControl::find(16);
    	$data['footer_our_link_3'] = SectionControl::find(20);
    	$data['footer_our_link_4'] = SectionControl::find(21);
    	$data['footer_head_office'] = SectionControl::find(17);
    	$data['footer_branch1'] = SectionControl::find(18);
    	$data['footer_branch2'] = SectionControl::find(19);
 
    	 $data['destinations_search'] = Destination::orderBy('name')->pluck('name', 'id');
    	 $data['categories_search'] = CategoryDestination::orderBy('name')->pluck('name', 'id');
    	 $data['quick_trips'] = CategoryDestination::where('quick_trips',1)->orderBy('order')->get();
    	 $data['contact_detail'] = ContactDetail::first();
    	 $data['destination_not_nepal'] = Destination::whereIn('id',[10,11])->where('status',1)->get();
    	 // $data['important_links'] = ImportantLink::where('status',1)->orderBy('created_at','desc')->get();    	
// dd($data['home_welcome']);
	View::share($data);
	}

    public function getIndex() {
		$data['sliders'] = MainSlider::where('status',1)->get();
		$data['nepal'] = Destination::find(8)->load('categories_destinations');
		$data['home_welcome'] = SectionControl::find(1);
	
    	// new
	     $deal = Homesection::find(1);
	     $best_selling = Homesection::find(2);
	     
	    
		// highest_trekking_packages
	     $deal_package_id = explode(",",$deal->package_id);
	     $data['deal_packages'] = Package::find($deal_package_id);
		// best_selling_packages
	     $best_selling_id = explode(",",$best_selling->package_id);
	     $data['best_selling_packages'] = Package::find($best_selling_id)->take(8);
	     // remote_travel_packages
	     // $best_selling_2018_id = explode(",",$best_selling_2018->package_id);
	     // $data['best_selling_2018_packages'] = Package::find($best_selling_2018_id)->take(3);
	     

	    $data['home_welcome']=SectionControl::find(1);
	    $data['activities_to_do_home']=SectionControl::find(5);
	    $data['deals_discount_home']=SectionControl::find(6);
	    $data['best_selling_home']=SectionControl::find(7);
	    $data['top_trekking_package_home']=SectionControl::find(8);
	    $data['special_tour_home']=SectionControl::find(9);
	    $data['festival_home']=SectionControl::find(10);
	    $data['upcoming_event_home']=SectionControl::find(11);
	    $data['things_to_do_home']=SectionControl::find(12);
	    $data['instagram_home']=SectionControl::find(13);
	    // $video_detail=SectionControl::find(11);
	    // $home_modal=SectionControl::find(13);
	   
	  	return view('frontends.home.index',$data);
	}

	

	public function getDestination($destination) {
		$destination = Destination::where('url', $destination)->first();
		// dd($destination);
		if(!$destination) abort(404);
		$categories = $destination->categories_destinations()->orderBy('created_at','desc')->get();
		return view('frontend.travel.destination.index', compact('destination','categories'));
	}

	

	public function getCategoriesDestinations($destination,$category_destination) {
		$regions=null;
		$packages=null;
		$category_destination = CategoryDestination::where('url', $category_destination)->first();
		if(!$category_destination) abort(404);
		if($category_destination->id==1){
			$regions = $category_destination->places()->where('status',1)->orderBy('created_at','desc')->get();
		}
		else{
			$packages = $category_destination->packages()->orderBy('created_at','desc')->where('status',1)->get();
		}
		// $packages = $category_destination->packages()->orderBy('created_at','desc')->where('status',1)->get();
		return view('frontend.travel.category_destination.index', compact('category_destination','destination','packages','regions'));
	}

	public function getPlaces($destination,$category_destination,$place) {
		$place = CategoryPlace::where('url', $place)->first();
		if(!$place) abort(404);
			$packages = $place->packages()->orderBy('created_at','desc')->where('status',1)->get();
		return view('frontend.travel.place.index', compact('place','packages','destination','category_destination'));
	}

	public function getPackage($package) {

		$package = Package::where('url', $package)->first();
		if(request()->ajax()){
		$reviews= $package->testimonials()->orderBy('created_at','desc')->where('status',1)->paginate(10);
			return $reviews;
		}
		$featured_package=null;
		if(!$package) abort(404);
		// $related_packages = Package::where('category_destination_id',$package->category_destination_id)->limit(2)->get();
		$featured_package_id = PackageFeatrured::where('package_id',$package->id)->pluck('featured_id')->toArray();

		if($featured_package_id) $featured_package = Package::find($featured_package_id);
		// dd($featured_package);
		$review= $package->testimonials()->orderBy('created_at','desc')->where('status',1)->first();
		$reviews= $package->testimonials()->orderBy('created_at','desc')->where('status',1)->paginate(10);

		// dd($review);
		
		return view('frontend.travel.package.index', compact('package','featured_package','review','reviews'));
	}
	public function printpackage($id){
		$package = Package::findOrFail($id);
		// dd($package);
		return view('frontend.home.print',compact('package'));
	}

	public function getPage($page) {
		$page = Cms::where('url', $page)->first();
		// $test=Cms::where('status', 1)->where('main_or_sub',1)->where('hide_header',0)->get();
		// dd($test);
		// $data['video']=Video::first();
		// dd($page);
		if(!$page) abort(404);
		$data['parent_page']=null;
		$data['child_pages']=null;
		$data['related_pages']=null;
		$data['page'] = $page;
		if($page->parent_id) {
			$data['related_pages'] = CMS::where('parent_id', $page->parent_id)->where('status',1)->get();
		} else {
			$data['related_pages'] = $page->child;
		}
		return view('frontend.cms.page', $data);
	}

	public function getpackagebooking($id=null,$date=null){
		// dd($date);
		// $data['id']=$id;
		$data['date']=$date;
		$data['package']=null;
		$data['booking']=Package::where('status', 1)->orderBy('name')->pluck('name','id');
		$data['review']= Testimonial::orderBy('created_at','desc')->first();
		// $data['agents']=User::getConnection('mysql2')->role('agent')->get(); 
		// $data['agents'] = json_decode(file_get_contents('http://nepalvisiontreks.com/nepalvision/public/agents'));
		// dd($data);
		if($id<>null) $data['package']=Package::find($id);

		return view('frontend.travel.booking',$data);
	}


	public function bookstep2(Request $request){
		// dd($request->all());
		$booking = $request->booking;
		$departure_date = $request->departure_date;
		$no_traveller =$request->no_traveller;
		$source =$request->source;
		$agent =$request->agent;
		return view('frontend.travel.bookingstep2',compact('booking','departure_date','no_traveller','source','agent'));
	}

	public function booking(Request $request){
		// dd($request->all());
		$agent=\DB::connection('mysql2')->table('users')->where('id',$request->agent)->first()->name;

		// dd($data);
		// $no_traveller=count($request->f_name);
		$booking=Package::find($request->booking);
		try {
			$booking1 = Booking::create([
			'package'=>$request->booking,
			'date'	 =>$request->departure_date,
			'no_traveller'=>$request->no_traveller,
			'source'=>$request->source,
			'agent'=>$request->agent,
			'type'=>'booking',

			
		]);
		for ($i=0; $i < $request->no_traveller; ++$i) 
            {
                // print_r($request['itenerary_outline'][$i]);
                $customer_detail= new Customer;        
                $customer_detail->fname = $request['f_name'][$i];
                $customer_detail->detail_mail_address = $request['mailing_address'][$i];
                $customer_detail->email = $request['email'][$i];
                $customer_detail->phone = $request['phone_day'][$i];
                $customer_detail->dob = $request['dob'][$i];
                $customer_detail->passport_no = $request['passport_no'][$i];
                $customer_detail->expiry = $request['expiry_date'][$i];
                $customer_detail->emergency_contact = $request['emergency_contact'][$i];
                $customer_detail->country = $request['country'][$i];
                $customer_detail->booking_id = $booking1->id;
                $customer_detail->save();  
            }
            // dd($booking);
			// $book=Booking::create($request->all());
		$user_agent = $request->server('HTTP_USER_AGENT');
		$userIP = $request->ip();
			// 'title','f_name','l_name','mailing_address','email','country','occupation','phone_day','phone_evening','passport_no','passport_place_issue','expiry_date','emergency_contact','booking','departure_date','no_traveller','insurance'
			$data = [
				'userIP'=>$userIP,
				'departure_date'=>$request->departure_date,
				'dob'=>$request->dob,
				'phone_day'=>$request->phone_day,
				'phone_evening'=>$request->phone_evening,
				'no_traveller'=>$request->no_traveller,
				// 'title' => $request->title,
				'f_name' => $request->f_name,
				// 'middleName' => $request->middleName,
				'l_name' => $request->l_name,
				'mailing_address' => $request->mailing_address,
				'myemail12' => $request->email,
				'country' => $request->country,
				'occupation' => $request->occupation,
				// 'mobile' =>$request->mobile,
				// 'landline'=>$request->landline,
				'passport_no'=>$request->passport_no,	
				'passport_place_issue'=>$request->passport_place_issue,	
				'issue_date'=>$request->issue_date,	
				'expiry_date'=>$request->expiry_date,	
				'emergency_contact'=>$request->emergency_contact,	
				'booking'=>$booking,	
				'departure_date'=>$request->departure_date,	
				// 'no_traveller'=>$request->no_traveller,	
				'insurance'=>$request->insurance,	
				'source'=>$agent
			];
		// dd($no_traveller);
			// dd($data);
			// return view('emails.booking',$data);
			Mail::send('emails.booking', $data, function($message) use ($data) {
              $message->from('noreply@nepalvisiontreks.com');
                $message->to('sales@nepalvisiontreks.com');
                $message->to('inquiry@nepalvisiontreks.com');
              
                //$message->bcc('yubraj.misfit@gmail.com');
                // $message->cc('booking@test.com');
                $message->subject('booking a package');
            });		
            
            if($request->bookandpay) return redirect()->route('frontend.bookpay',$request->booking);	
			$this->status_message = "Successfully Booked a pakage.";
		} catch (QueryException $e) {
			return $e->getMessage();
			$this->status_message = "Failed to Book package, Try again.";
            $this->alert_type = "danger";
            
		}
		return redirect()->route('frontend.thanks')->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
	}

	public function getTestimonials(Request $request){
		$packages=Package::where('status',1)->pluck('name','id');
		// Carbon::now();
		if($request->package){

			// $testimonials=Testimonial::whereHas('packages', function($query) use ($request) {
   //                      $query->where('package_id', '=', 2);
   //                  })->with('packages')->paginate(10);
   		// $test=Testimonial::with('packages');
   		// $testimonials=$test->packages()->where('package_id',1);
	   		$packagefinder=Package::find($request->package);
	   		$testimonials=$packagefinder->testimonials()->paginate(10);
	   		$total = $packagefinder->testimonials()->where('status',1)->count();
			$excellent_rating=$packagefinder->testimonials()->where('status',1)->where('rating',5)->count();
			$verygood_rating=$packagefinder->testimonials()->where('status',1)->where('rating',4)->count();
			$good_rating=$packagefinder->testimonials()->where('status',1)->where('rating',3)->count();
			$fair_rating=$packagefinder->testimonials()->where('status',1)->where('rating',2)->count();
			$poor_rating=$packagefinder->testimonials()->where('status',1)->where('rating',1)->count();
			$excellent_rating_percent = round($excellent_rating *100/$total) ;
			$verygood_rating_percent = round($verygood_rating *100/$total) ;
			$good_rating_percent = round($good_rating *100/$total) ;
			$fair_rating_percent = round($fair_rating *100/$total) ;
			$poor_rating_percent = round($poor_rating *100/$total) ;
		}
		else{
			$testimonials = Testimonial::where('status',1)->paginate(10);
			$total = Testimonial::where('status',1)->count();
			$excellent_rating=Testimonial::where('status',1)->where('rating',5)->count();
			$verygood_rating=Testimonial::where('status',1)->where('rating',4)->count();
			$good_rating=Testimonial::where('status',1)->where('rating',3)->count();
			$fair_rating=Testimonial::where('status',1)->where('rating',2)->count();
			$poor_rating=Testimonial::where('status',1)->where('rating',1)->count();
			$excellent_rating_percent = round($excellent_rating *100/$total) ;
			$verygood_rating_percent = round($verygood_rating *100/$total) ;
			$good_rating_percent = round($good_rating *100/$total) ;
			$fair_rating_percent = round($fair_rating *100/$total) ;
			$poor_rating_percent = round($poor_rating *100/$total) ;
		}
		// dd($testimonials->last()->packages());
		return view('frontend.travel.testimonial',compact('testimonials','packages','excellent_rating_percent','verygood_rating_percent','good_rating_percent','fair_rating_percent','poor_rating_percent'));
	}


	public function postTestimonial(Request $request){
		// $requestData = $request->all();
		// dd($requestData);
			
  //          	if($request->hasFile($request->imageupload)) {
  //               // Uplaod Image
  //               $file = $request->file('imageupload');
  //               $filename = time()."-".$file->getClientOriginalName();
  //               dd($filename);
  //               $image = $this->testimonial_image_path. '/' .$filename;
  //               $upload_success= $file->move($this->testimonial_image_path, $filename);
  //               $upload = Image::make($image);
  //               // $upload->fit(800, 400)->save($testimonial_image_path .'/'. $filename);
  //               $upload->fit(250,250)->save($this->testimonial_image_path .'/'. $filename);
  //               $requestData['image'] = $filename;
  //           }
		if($request->hasFile('imageupload')) {
                // Uplaod Image
                $file = $request->file('imageupload');
                $fileName = time()."-".$file->getClientOriginalName();
                $imageupload = $this->testimonial_image_path. '/' .$fileName;
                $upload_success= $file->move($this->testimonial_image_path, $fileName);
                $upload = Image::make($imageupload);
                $upload->fit(100,100)->save($this->testimonial_image_path .'/'. $fileName);
                
                $request['image'] = $fileName;
            }
            // $blog = Blog::create($request->all());
         // dd($requestData);
        $testimonials=Testimonial::create($request->all());
        if($request->packages) $testimonials->packages()->sync($request->input('packages'));
        return redirect()->route('frontend.thanks')->with(['status_message' => "Successfully submitted testimonial", 'alert_type' => "success"]);
	}

	public function getContact(Request $request){
		$package=null;
		if($request->action=="customize") $package=Package::find($request->id);
			// dd($package);
		return view('frontends.home.contactus',compact('package'));
	}

	public function referFriend(Request $request){
		// dd($request->all());
		$data = [
			'name' => $request->name,
			'myemail' => $request->myemail,
			'subject' =>'Refer a Friend',
			'friendemail'=>$request->email,
			'mycomment'=>$request->comment,				
		];
		// return view('emails.contactus',$data);
		$result = Mail::send('emails.referFriend', $data, function ($message) use ($data){
			$message->from('noreply@nepalvisiontreks.com',$data['name']);
			$message->subject($data['subject']);
			$message->to($data['friendemail']);			
			$message->cc($data['myemail'],$data['name']);
			// $message->bcc('yubraj.misfit@gmail.com');
			$message->bcc('sales@nepalvisiontreks.com');

		});

		$this->alert_type = "success";
		$this->status_message = "Message sent..";
        return back()->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
	}

	public function postContactUs(Request $request) {
dd($request->all());
		
			$booking = Booking::create([
				'package'=>$request->booking,
				'date'	 =>date('Y-m-d'),
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
				
			]);
		$url = $request->server('HTTP_REFERER');
		$userIP = $request->ip();
		$agent=\DB::connection('mysql2')->table('users')->where('id',$request->agent)->first()->name;
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
		$result = Mail::send('emails.contactus', $data, function ($message) use ($data){
			$message->from('noreply@nepalvisiontreks.com','Nepal Vision');
			$message->subject($data['subject']);
			$message->to('sales@nepalvisiontreks.com');	
			
			$message->bcc('yubraj.misfit@gmail.com');			
		});
            // Mail::send('emails.contactus', $data, function($message) use ($data) {
            //   $message->from('dotwebinc.submission@gmail.com');
            //     $message->to('treksplannernepal@gmail.com');
            //     $message->cc('inquiry@treksplannernepal.com');
            //     $message->subject($data['subject']);
            // });

		$this->alert_type = "success";
		$this->status_message = "Thank you for contacting us.";
		

        return redirect()->route('frontend.thanks')->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
	}

	public function getblogdetails($id){
		$blog=Blog::find($id);
		if(!$blog) abort(404);
		return view('frontend.home.blogdetail',compact('blog'));
	}

	public function getblogs(){
		$blogs=Blog::where('status',1)->orderBy('created_at','desc')->paginate(20);
		// if(!$blog) abort(404);
		return view('frontend.home.blogs',compact('blogs'));
	}
	
	public function ajaxsearchdeparture(Request $request){
		// dd($request->all());
		$package=Package::find($request->packageid);
		 $departure_dates=Departure::where('status',1)->orderBy('start_date')->where('package_id',$request->packageid)->whereYear('start_date', '=', $request->year)->whereMonth('start_date', '=', $request->month)->where('start_date', '>=', Carbon::today())->get();
		// $year = date('Y', strtotime($in_date));
		// $departure_dates=Departure::where('status',1)->orderBy('start_date')->where('package_id',$request->packageid)->whereYear('start_date', '=', $request->year)->where('start_date', '>=', Carbon::today())->get();
		
		// $departure_dates=Departure::where('status',1)->where('package_id',$request->packageid)->where('start_date', '>=', Carbon::today())->whereYear('start_date', '=', $request->year)->limit(50)->get();
		return view('frontend.travel.package.departure',compact('departure_dates','package'));
		// $departure_dates=Departure::where('status',1)->orderBy('start_date')->where('package_id',$request->packageid)->whereYear('start_date', '=', $request->year)->whereMonth('start_date', '=', $request->month)->where('start_date', '>=', Carbon::today())->get();
		// $month = $request->month;
  //       $year = $request->year;
  //       // $start_date = "01-".$month."-".$year;
  //       $start_date = $year."-".$month."-01";
  //       if($start_date<Carbon::today()){
  //       	$start_date=Carbon::today();
  //       }
  //       // return $start_date;
  //       // $start_date = date("Y-m-d");
  //       $start_time = strtotime($start_date);
		// $end_time = strtotime("+1 month", $start_time);
		// return view('frontend.travel.package.departure',compact('departure_dates','package','start_time','end_time'));
	
	}

	public function getThanks(){
		return view('frontend.home.thanks');
	}
	public function getfaq($package=null){
		if($package){
			$data['faqs']=Package::where('url',$package)->first()->faqs()->paginate(9);
			// dd($package_select);
		}
		else{
			$data['faqs']=Faq::orderBy('created_at','desc')->paginate(9);
		}
		return view('frontend.travel.faq',$data);

	}

	public function getSearch(Request $request)
	{
		$data['packages']=null;
		// dd($request->all());
		if($request->search){
			$data['packages'] = Package::where('name', 'LIKE', '%' . $request->search . '%')->paginate(12);
			// $data['packages']=Package::where('destination_id',$request->destination_id)->where('category_destination_id',$request->category_destination_id)->paginate(12);
		}
		else{
			$data['packages'] = Package::where('status',1)->paginate(12);
		// if($request->category_destination_id && $request->destination_id) {
			// $data['packages']=Package::where('destination_id',$request->destination)->where('category_destination_id',$request->category_destination_id)->paginate(12);
			// $data['destination']=Destination::find($request->destination_id);
// 			$category=CategoryDestination::where('name',$request->categories_destination)->first();
// if($category) $data['packages'] =$category->packages()->paginate(12);
			// packages()->paginate(12);
		}
		// dd($data);
		return view('frontend.home.searchresult',$data);
	}

	public function getbannerSearch(Request $request){
			$data['packages']=Package::where('category_destination_id',$request->category_destination_id)->paginate(12);
			$data['destination']=Destination::find($request->destination_id);
			$data['category']=CategoryDestination::find($request->category_destination_id);
			// dd($data);
			return view('frontend.home.searchresult',$data);
	}



	public function getFixedDeparture(){
		$data['fixed_departures']=Departure::where('status',1)->orderBy('start_date')->where('availability','Join A group')->where('start_date', '>=', Carbon::today())->get();
    	// $data['fixed_departure_content'] = SectionControl::find(12);

		// dd($data);

		return view('frontend.home.fixed-departure',$data);
	}

	public function test(){
		return "manish";
	}
	public function sitemap(){
			$packages=Package::where('status',1)->orderBy('created_at','desc')->get();
		
    		return response()->view('frontend.home.sitemap',compact('packages'))->header('Content-Type', 'text/xml;charset=utf-8');
	}
	public function ajaxSearchCategory(Request $request) {
		// dd($request->all());
        $categories = CategoryDestination::where('destination_id', $request->destination_id)->orderBy('name')->get();
        return $categories;
    }
    public function ajaximage(Request $request) {
		$gallaryimages=ImageUpload::orderBy('filename')->select('filename','id')->get();
        return $gallaryimages;
    }
    public function postNewsletter(Request $request) {
// dd($request->all());
		Newsletter::create($request->all());
		$url=url()->previous();
			// $user_info = $request->ip();
			$userIP = $request->ip();
	       // $data   = file_get_contents("https://ipapi.co/{$userIP}/json");
	       // $data   = json_decode($data);
	        // dd($data);
	$user_info = "Url: {$url} |IP: {$userIP} <br>";
	       // $user_info = "Url: {$url} |IP: {$data->ip} <br> [ Country: <b>{$data->country_name}</b> | City: {$data->city} | Timezone: {$data->timezone} | Lat/Long: {$data->latitude}/{$data->longitude} ]";
		$data = [
			
			'myemail' => $request->email,
			'subject' =>'Newsletter Subscription',
			
			'user_info'=>$user_info,
			
		];

            Mail::send('emails.newsletter', $data, function($message) use ($data) {
              	$message->from('noreply@nepalvisiontreks.com','Nepal Vision');
				$message->subject($data['subject']);
				$message->to('sales@nepalvisiontreks.com');			
				
				// $message->bcc('yubraj.misfit@gmail.com');
            });
		$this->alert_type = "success";
		$this->status_message = "Thank you for Subscribing us.";	

        return redirect()->route('frontend.thanks')->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
	}

	public function bookpay(Request $request,$id=null){
// dd($id);
        $packagename=null;
        if($id<>null)$packagename = Package::where('id',$id)->first();
            $package = Package::pluck('name','name');
        // dd($package);
        return view('frontend.home.bookpay', [
            'packagename' => $packagename,
            'package'     => $package
        ]);
    }
    public function confirmpayment(Request $request){
        // dd($request->all());
        $invoice=Invoice::find(1);
        $data['invoiceNo']=$invoice->content;
        // $data['menubar_data']=$this->menubar_data();
        $data['productName']=$request->productName;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $amount=$request->amount;
        $data['amount']=104/100 *$amount;
        $invoice1=($invoice->content)+1;

        $invoice->update(['content'=>$invoice1]);
        // dd($data);
        return view('frontend.home.confirmpayment',$data);
    }

    public function getPayment(Request $request){
    	// return "test";
    	// dd($request->all());
    	$paymentGatewayID = '';
         $respCode = '';
          $pan = '';
          $amount = '';
          $invoiceNo ='';
          $tranRef = '';
          $approvalCode = '';
          $eci = '';
          $dateTime = '';
          $status = '';

         $data['paymentID'] = $request->paymentGatewayID;
        $data['respCode'] = $request->respCode;
        $data['pan'] = $request->pan;
        // $data['amount'] = $request->Amount;
        $data['invoiceNo'] = $request->invoiceNo;
        $data['tranRef'] = $request->tranRef;
        $data['approvalCode'] = $request->approvalCode;
        $data['eci'] = $request->eci;
        $data['dateTime'] = $request->dateTime;
        $data['email'] = $request->userDefined1;
        $data['amount'] = $request->userDefined2;
        $data['name'] = $request->userDefined4;
        $data['package_name'] = $request->userDefined5;
        $data['status'] = $request->status;
        // dd($data);
        // return view('emails.sendpaymentdetails',$data);
        if($data['respCode']=='00'){
        Mail::send('emails.sendpaymentdetails', $data, function ($message) use ($data) {
                $message->from('noreply@nepalvisiontreks.com');
                // $message->to($data['email']);
                 $message->to('info@nepalvisiontreks.com');
                  
                // $message->bcc('yubraj.misfit@gmail.com');
                              
                $message->subject('payment received for Nepal Vision');
                // $message->replyTo($details['email'], $details['fullname']);
                
            });
        return redirect()->route('frontend.thanks')->with(['status_message' => 'Thanks for payment', 'alert_type' => 'danger']);
        }
// return "done";
        return redirect()->route('frontend.thanks')->with(['status_message' => 'Sorry! Your Payment could not be processed', 'alert_type' => $this->alert_type]);
        // return view('frontend.home.thanks',$data);
    }

}
