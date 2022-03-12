
 
@extends('frontend.layout.master')
@php
    define('PAGE','destination')
@endphp
<style>
    .about-trip .head .nav-link{
font-weight: 500;
font-size: 18px;
color: #fff!important;

} 
.about-trip .head .nav-link i{
       font-size: 17px;


}
.about-trip .head .nav-link.active{
 color: rgb(42, 135, 183)!important;

}
.about-trip .head {
  background:   rgb(42, 135, 183)!important;
}
.about-trip ul li{
  outline: none!important;
  border: none;
}
.btn_sm{
    /* border-radius: 10px; */
}
.at-icon-wrapper{
    width: 38px!important;
    height:  38px!important;
    line-height: 38px!important;

}

.at-icon-wrapper svg{
    width: 38px!important;
    height:  38px!important;

}
</style>

@section('content')
@php
    $packages_id=$package->id;
    $arr = explode(' ', trim($package->name));
        // return isset() ? $arr[0] : $string;
@endphp
@if ($package->thumbnail==null || empty($package->thumbnail))
<x-page-header :title="$arr[0].' ' .$arr[1]" :route="route('package.detail',['url'=>$package->url])"  :beforeroute="route('destination',['id'=>$before->id,'url'=>$before->url])" :before="$before->name"/>
    
@else    
<x-page-header :title="$arr[0].' ' .$arr[1]" :route="route('package.detail',['url'=>$package->url])"  :beforeroute="route('destination',['id'=>$before->id,'url'=>$before->url])" :before="$before->name" :img="asset($package->thumbnail)"/>

@endif
 <div class="container-fluid px-0 mx-0">
    <div class="card">
        <div class="card-body py-1 my-0">
            <div class="row">
                <div class="col-md-5 offset-md-7 text-right">
                    <div class="d-flex justify-content-center justify-content-md-center flex-md-row flex-column">

@if ($package->video)
<div class="my-1 mx-1">
    <a href="#"class=" custom-bg-primary  text-decoration-none text-light btn_sm d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#video"><i class="fa fa-play-circle"></i>  
       &nbsp;
        Video</a>
</div>
@endif
                       
                <div class="my-1 mx-1 ">
                    <a href="#"class=" custom-bg-primary  text-decoration-none text-light btn_sm d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#customize"><i class="fa fa-recycle"></i>  
                       &nbsp;
                        Customize</a>
                </div>
                <div class="my-1 mx-1">
                    <a href="{{ route('print',$package->id) }}" class=" custom-bg-primary  text-decoration-none text-light btn_sm d-flex align-items-center justify-content-center"><i class="fa fa-print"></i>  
                       &nbsp;
                        Print This</a>
                </div>
                <div class="my-1 text-center mx-1">


                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox_w1qq"></div>
            
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60c809a3e6cdb001"></script>

                </div>
            </div>
        </div>
    </div>
</div>   
</div>   

    
<main>
   
    <section class="trip-desc my-3 my-md-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 my-1">
                    <div class="book-now mx-0 mx-md-4">
                            @if (!empty($package->duration))
                                
                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Duration</h2>
                               <p class='my-0 py-0'>{{ $package->duration }} </p>
                            </div>
                            @endif
                            
                                @if (!empty($package->discounted_price))
                                

                                <div class="col-12 py-2">

                                    <h2 class='my-0 py-0'>Previous Price</h2>
                                   <p class='my-0 py-0'>
                                {{ $package->price }} 
                                   </p></div>

                                   <div class="col-12 py-2">

                                    <h2 class='my-0 py-0'>Current Price</h2>
                                   <p class='my-0 py-0'>
                                   $USD  {{ $package->discounted_price }} 
                                   </p>
                                </div>
                                @else   
                            <div class="col-12 py-2">

                                <h2 class='my-0 py-0'>Price</h2>

                                 <span class="custom-text-primary">
<strong class="text-dark custom-fs-25 custom-fw-700">
    
    {{ $package->price }}
</strong>                                     
                                    Per Person</span></p>

                            </div>
                            @endif
                            @if (!empty($package->activity))

                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Trip Type</h2>
                               <p class='my-0 py-0'>{{$package->activity }}</p>
                            </div>
                            @endif
                            @if (!empty($package->difficulty))
                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Difficuilty</h2>
                               <p class='my-0 py-0'>
                               {{$package->difficulty}}
                                </p>
                            </div>
                            @endif

                            @if (!empty($package->meals))

                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Meal & Accommodation</h2>
                               <p class='my-0 py-0'>              
                                 {{$package->meals}}
                                </p>
                            </div>
                            @endif

                            @if (!empty($package->group_size))

                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Group Size</h2>
                               <p class='my-0 py-0'>                      
                                        {{$package->group_size}}
                                </p>
                            </div>
                            @endif

                            @if (!empty($package->transport))

                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Transport</h2>
                               <p class='my-0 py-0'>                      
                                        {{$package->transport}}
                                </p>
                            </div>
                            @endif

                            @if (!empty($package->arrival))

                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Arrival On</h2>
                               <p class='my-0 py-0'>                      
                                        {{$package->arrival}}
                                </p>
                            </div>
                            @endif


                            @if (!empty($package->departure_from))
                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Departure From</h2>
                               <p class='my-0 py-0'>                      
                                        {{$package->departure_from}}
                                </p>
                            </div>
                            @endif


                            @if (!empty($package->operation))
                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Operation</h2>
                               <p class='my-0 py-0'>                      
                                        {{$package->operation}}
                                </p>
                            </div>
                            @endif

                            @if (!empty($package->route_detail))
                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Route Detail</h2>
                               <p class='my-0 py-0'>                      
                                        {{$package->route_detail}}
                                </p>
                            </div>
                            @endif


                            @if (!empty($package->best_month))
                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Best Month</h2>
                               <p class='my-0 py-0'>                      
                                        {{$package->best_month}}
                                </p>
                            </div>
                            @endif

                            @if (!empty($package->departure_from))
                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Departure From</h2>
                               <p class='my-0 py-0'>                      
                                        {{$package->departure_from}}
                                </p>
                            </div>
                            @endif

                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Review</h2>
                               <p class='my-0 py-0'>
                                <div class="rating">
                                    @for ($i=1;$i<=$package->rating;$i++)
                                    <i class="fas fa-star text-warning"></i>
                                    @endfor
                                    @for ($i=1;$i<=5-$package->rating;$i++)
                                
                                        <i
                                            class="fas fa-star text-gray"></i>
                                            @endfor
                                </div>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <a class="btn btn-primary w-100" href="{{ route('booknow',['package_id'=>$package->id]) }}">Book Now</a>
                                </div>
    
                                <div class="col-md-6 py-2">
    
                                <a href="#"class=" btn btn-primary w-100 text-decoration-none " data-bs-toggle="modal" data-bs-target="#enquery">  
                                   
                                    Enquire</a>
                            </div>
                            </div>
                            
                    </div>
                </div>
                <div class="col-md-8 my-1">
                    <!-- RH: this is bootstrap 5 tabbed panel -->

  
                    <div class="about-trip">
                        <div class="head  ">
                                <ul class="nav nav-tabs d-flex justify-content-around" id="myTab" role="tablist">
                                    <li class="nav-item " role="presentation">
                                      <a class="nav-link active " id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-binoculars"></i> Overview</a>
                                    </li>
                                    <li class="nav-item " role="presentation">
                                      <a class="nav-link  font-weight-700 " id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-map-marker"></i> Itinerary</a>
                                    </li>

                                    <li class="nav-item " role="presentation">
                                        <a class="nav-link  font-weight-700 " id="profile-tab" data-bs-toggle="tab" href="#dateprice" role="tab" aria-controls="dateprice" aria-selected="false"><i class="fas fa-calendar"></i> Departure Date</a>
                                      </li>

                                     @if (!empty($package->faq))
                                    <li class="nav-item " role="presentation">
                                      <a class="nav-link  font-weight-700 " id="faq-tab" data-bs-toggle="tab" href="#faq" role="tab" aria-controls="faq" aria-selected="false"><i class="fas fa-question"></i> Faq</a>
                                    </li>
                                    @endif



                                    @if (!empty($package->useful_info))
                                    <li class="nav-item " role="presentation">
                                      <a class="nav-link  font-weight-700 " id="useful-tab" data-bs-toggle="tab" href="#useful" role="tab" aria-controls="useful" aria-selected="false"><i class="fas fa-info-circle"></i> Useful Info</a>
                                    </li>
                                    @endif

                                    
                                    @if (!empty($package->equiment))
                                    <li class="nav-item " role="presentation">
                                      <a class="nav-link  font-weight-700 " id="equiment-tab" data-bs-toggle="tab" href="#equiment" role="tab" aria-controls="equiment" aria-selected="false"><i class="fab fa-wrench"></i>Equiment</a>
                                    </li>
                                    @endif
                                   
                                    <li class="nav-item " role="presentation">
                                        <a class="nav-link  font-weight-700 " id="review-tab" data-bs-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false"> <i class="fas fa-comment"></i> Review</a>
                                      </li>











                                  </ul>
                        </div>
                    </div>
                    <div class="tab-content card" id="myTabContent">
                        <div class="tab-pane card-body fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            {!! $package->overview !!}
                            {!! $package->outline_itinerary !!}
                            {!! $package->include_exclude !!}
                            {!! $package->trip_excludes !!}


                        
                        </div>
                        <div class="tab-pane card-body fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            {!! $package->detailed_itinerary !!}

                        </div>

                        @if (!empty($package->faq))
                        <div class="tab-pane card-body fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                            {!! $package->faq !!}
                        </div>
                        @endif

                        <div class="tab-pane card-body fade" id="useful" role="tabpanel" aria-labelledby="useful-tab">
                            {!! $package->useful_info !!}
                        </div>

                        <div class="tab-pane card-body fade" id="equiment" role="tabpanel" aria-labelledby="equiment-tab">
                            {!! $package->equiment !!}
                        </div>





                        <div class="tab-pane fade card-body" id="datePrice" role="tabpanel" aria-labelledby="datePrice-tab">

                            <h2 class="mt-2">Departure dates for {{ $package->name }}</h2>

                            <p>We provide a series of fixed departure trek, tour and expeditions in Nepal, Bhutan, Tibet and India. If you are single and wishing to be with a group, you can join our fixed departure schedule. If the schedule dates are not convenient for you, contact us & let us know; we are more than happy to customize our trips to suit your needs. If any individuals or group doesn’t want to join with our other group, we can operate as per your wish and requirement. We are ground operator of these Himalayan destination and able to arrange your trip as per your interested date and choice.</p>

                            <form>

                                <div class="row">

                                    <div class="col-12">

                                        <p>Check out all the available dates</p>

                                    </div>

                                    <div class="col-12">

                                        <div class="row">

                                            <div class="col-6 col-lg-4">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa mx-1 fa-calendar  custom-text-primary"></i>

                                                    </span>
                                                 

                                                    <select class="form-control select-year" aria-describedby="basic-addon1">

                                                     {{--    <option disabled selected>Select Year</option> --}}
                                                      <option value="{{ date('Y') }}">Select Dates</option>
                                                       <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                                                       <option value="{{ date('Y')+1 }}">{{ date('Y')+1 }}</option>
                                                       <option value="{{ date('Y')+2 }}">{{ date('Y')+2 }}</option>
                                                     {{--   <option value="{{ date('Y')+2 }}">{{ date('Y')+2 }}</option>
                                                       <option value="{{ date('Y')+3 }}">{{ date('Y')+3 }}</option> --}}

                                                    </select>


                                                </div>

                                            </div>

                                            <div class="col-6 col-lg-4">

                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="fa mx-1 fa-calendar  custom-text-primary"></i>
    
                                                        </span>
                                                     
                                                    <select class="form-control" id="select-month" aria-describedby="basic-addon2">
                                                        {{-- <option disabled selected>Select Month</option> --}}
                                                        <option value="1">Jan</option>
                                                        <option value="2">Feb</option>
                                                        <option value="3">Mar</option>
                                                        <option value="4">Apr</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">Aug</option>
                                                        <option value="9">Sep</option>
                                                        <option value="10">Oct</option>
                                                        <option value="11">Nov</option>
                                                        <option value="12">Dec</option>
                                                    </select>



                                                </div>

                                            </div>

                                       

                                        </div>

                                    </div>

                                </div>

                            </form> 

                            <table class="table table-bordered text-center">

                              <thead>

                                <tr>

                                  <th scope="col">Start Date</th>

                                  <th scope="col">Finish Date</th>

                                  <th scope="col">Availability</th>

                                  <th scope="col">Price</th>

                                  <th scope="col">Action</th>

                              </tr>

                          </thead>

                          <tbody class="ajaxloadmoredeparture"> 
</tbody>

        </table>

    </div>



                        <div class="tab-pane card-body fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h2 class="custom-text-primary custom-fs-20">Traveller's Reviews
                                </h2>
                            </div>
                                <div class="col-md-3 offset-md-3 text-right">

                                  <a class="btn btn-primary" href="{{ route('testimonials') }}">Write Review</a>
                                </div>
                
                              </div>
                        @foreach ($reviews as $review)
                        <div class="card">

                        <div class="row">
                            <div class="col-md-4">
                               <div class="img card-body ">
                                   @if (!empty($review->image))
                                   <img src="{{ asset($review->image) }}" alt="" class="w-md-75 w-100 text-md-center img-fluid img-thumbnail">
                                       @else   
                                   <img src="{{ asset('frontend/assets/footer-img.png') }}" alt="" class="w-100 w-md-75 text-md-center img-thumbnail img-fluid">

                                   @endif
                                   <p class="mt-1 text-center py-0  mb-1">
                                    <strong class="custom-text-primary">
                                        {{ $review->name }}
                                    </strong>    
                                        </p>
                                   <div class="d-flex justify-content-between flex-row align-items-center">
                                   <div class="rating mt-2">
                                    @for ($i=1;$i<=$review->rating;$i++)
                                    <i class="fas fa-star text-warning"></i>
                                    @endfor
                                    @for ($i=1;$i<=5-$review->rating;$i++)
                                
                                        <i
                                            class="fas fa-star text-gray"></i>
                                            @endfor


                                </div>
                                <div class="mt-2">
                                     <strong class="custom-text-primary">{{ carbon\carbon::parse($review->date)->format('d M Y') }}</strong>
                                </div>
                               </div>
                            </div>

                            </div>
                            <div class="col-md-8 ">
                                <div class="card-body">
                                <h3 class="custom-text-primary custom-fs-18">{{ $review->title }}</h3>
                                <div class="comment">

                                    {!! strip_tags($review->content) !!}

                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                        @endforeach
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
    @if (count($features)>0)
        
    <section class="packages">
        <div class="container-fluid">
            <div class="heading my-5">
                <h2 class='my-0 py-0'>Feautre Packages</h2>
            </div>
            <div class="row">
                @foreach ($features as $packaged)
                <div class="col-md-3 col-sm-4">
           
                <div class="card-style-2 ">
                    <a href="{{ route('package.detail',['id'=>$packaged->id,'url'=>$packaged->url]) }}" class="text-decoration-none">
                    <div class="img-container">
                       
                        @if ($packaged->banner==null)
                        <img src="{{ asset('frontend/assets/tour-1.png')}}" alt="" class="img-fluid w-100 w-100">
                        @else 
                        <img src="{{ asset($packaged->banner)}}" alt="{{$packaged->name  }}" class="img-fluid w-100">
                        @endif
                    </div>
                    
                    <div class="img-desc">
                        <div class="about-img row">
                            <div class="col-12">
                               <p class="px-0 mx-0">
                                @if (!empty($packaged->duration))
                                {{ $packaged->duration }} |
                                @endif
                                @if (!empty($packaged->activity))
                              {{ Str::limit($packaged->activity,38) }}
                                    
                                @endif
                                   </p> 

                        </div>
                        <div class="col-6 ">

                            <div class="rating">
                                @for ($i=1;$i<=$packaged->rating;$i++)
                                <i class="fas fa-star text-warning"></i>
                                @endfor
                                @for ($i=1;$i<=5-$packaged->rating;$i++)
                                <i class="far fa-star text-gray"></i>
                                @endfor
                             
                            </div>
                        </div>
                        <div class="col-6">
                        <span class="custom-fs-18 custom-fw-600 custom-text-primary">
                            $USD {{ $packaged->price }}

                        </span>
                        </div>
                        </div>
                        <div class="title mt-1 custom-fs-18">
                            {{ $packaged->name }}
                        </div>
                        
                    </div>
                </a>

                </div>
            </div>
            @endforeach
              
            </div>
        </div>
</section>

@endif

</main>






{{-- video Model  --}}
<!-- Modal -->
<div class="modal fade " id="video" tabindex="-1" aria-labelledby="videoy" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
       
<div style="width:200px!important;">
    {!! $package->video!!}
</div>
        </div>
      
      </div>
    </div>
  </div>







{{-- Enquery Model  --}}
<!-- Modal -->
<div class="modal fade " id="enquery" tabindex="-1" aria-labelledby="enquery" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title">
                <p class="custom-text-18 custom-fw-700 my-0 py-0">Enquire Us</p>
<small>
    Required Field <span class="text-danger">*</span>
</small>            
            </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
            @php
            $agents = DB::connection('mysql2')->table('users')->where('email_verified_at','!=',null)->get();
        @endphp
            <div class="card-body">
                <form action="{{ route('enquery.post') }}" method="POST">
                    @csrf
                
                  
                               <input type="hidden" value="{{ $package->id }}" name="booking">
                      

                    <div class="form-group row my-3">
                        <div for="tripName" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500"> Full Name<span class="text-danger">*</span>: </div>
                        <div class="col-md-8">
                    <input type="text" name="name" class="form-control" placeholder="Enter you full name" required>
                        </div>
                    </div>
                    <div class="form-group row my-3">
                        <div for="tripName" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500"> Email<span class="text-danger">*</span>: </div>
                        <div class="col-md-8">
                    <input type="text" name="email" class="form-control" placeholder="Enter your email address" required>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <div for="tripName" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500"> Phone<span class="text-danger">*</span>: </div>
                        <div class="col-md-8">
                    <input type="number" name="phone" class="form-control" placeholder="Mobile Number" required>
                        </div>
                    </div>


                    <div class="form-group row my-3">
                        <div for="tripdate" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500"> Expected Date<span class="text-danger">*</span>:</div>
                        <div class="col-md-8">
                            
                                    <input type="text" class="form-control" id="datepicker" name="expected_date" required placeholder="Enter date" @if (!empty($data))
                                        value="{{ $date }}"
                                    @endif autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row my-3">
                        <div for="travellers" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500">Number Of Travellers<span class="text-danger">*</span>:</div>
                        <div class="col-md-8">
                            
                                <select name="no_participants" class="form-select form-control" required>
                                    <?php for($i=1; $i<=20; $i++){ ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php } ?>
                                </select>

                        </div>
                    </div>


                    <div class="form-group row my-3">
                        <div for="travellers" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500">How did you find us?<span class="text-danger">*</span>:</div>
                        <div class="col-md-8">
                            
                            <select name="agent" class="form-select form-control" required>
                                @foreach($agents as $agent)
                                <option value="{{$agent->id}}">{{$agent->name}}</option>
                                @endforeach
                               
                            </select>

                        </div>
                    </div>
                    <div class="form-group row my-3">
                        <div for="travellers" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500">Your Mesage<span class="text-danger">*</span>:</div>
                        <div class="col-md-8">
                            
                            <textarea name="comment" class="form-control" placeholder="Enter your message" id="message" required></textarea>


                        </div>
                    </div>
                    
                    <div class="mt-2 text-center">
                        <button type="submit" class="btn btn-primary btn-block">Enquire now</button> 
                    </div>
                </form>
            </div>
        </div>
      
      </div>
    </div>
  </div>




{{-- Customization  Model  --}}
<!-- Modal -->
<div class="modal fade " id="customize" tabindex="-1" aria-labelledby="customize" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title">         <p class="custom-text-18 custom-fw-700 my-0 py-0">Customize Package</p>
                <small>
                    Required Field <span class="text-danger">*</span>
                </small> </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
            @php
            $agents = DB::connection('mysql2')->table('users')->where('email_verified_at','!=',null)->get();
        @endphp
            <div class="card-body">
                <form method="post" action="{{ route('enquery.post') }}" class="non-rounded-form">
        
                  {{ csrf_field() }}
        
                  <div class="row">
        
        
                    
        
                  <div class="col-12 col-sm-6 col-md-12 col-lg-6 my-2">
        
                      <div class="form-group">
        
                        <label for="name">Full Name<span class="text-danger">*</span></label>
        
                        <input type="text" name="name" class="form-control" placeholder="Enter your full name" id="name" required>
        
                    </div>
        
                </div>
        
                <div class="col-12 col-sm-6 col-md-12 col-lg-6 my-2">
        
                  <div class="form-group">
        
                    <label for="email">Email<span class="text-danger">*</span></label>
        
                    <input type="text" name="email" class="form-control" placeholder="Enter your email address" id="email" required>
        
                </div>
        
            </div>
        
                  @if($package)
                  <input type="hidden" name="subject" class="form-control" placeholder="Enter your subject" id="subject" value="Customize Trip">
                  <input type="hidden" name="package_name" class="form-control" placeholder="Enter your subject" id="subject" value="{{ $package->name }}">
                  <div class="col-12 col-sm-6 col-md-12 col-lg-6 my-2 {{-- swapped-element --}}">
        
                      <div class="form-group">
        
                        <label for="country">Select Country<span class="text-danger">*</span></label>
        
                        <select class="form-control" id="country" name="country" required>
        
                            <option disabled="disabled" selected="selected"> Select your country</option>
        
                            <option value="Afghanistan">Afghanistan</option>
        
                            <option value="Albania">Albania</option>
        
                            <option value="Algeria">Algeria</option>
        
                            <option value="Argentina">Argentina</option>
        
                            <option value="Australia">Australia</option>
        
                            <option value="Austria">Austria</option>
        
                            <option value="Azerbaijan">Azerbaijan</option>
        
                            <option value="Bahamas">Bahamas</option>
        
                            <option value="Bahrain">Bahrain</option>
        
                            <option value="Bangladesh">Bangladesh</option>
        
                            <option value="Belarus">Belarus</option>
        
                            <option value="Belgium">Belgium</option>
        
                            <option value="Belize">Belize</option>
        
                            <option value="Benin">Benin</option>
        
                            <option value="Bermuda">Bermuda</option>
        
                            <option value="Bhutan">Bhutan</option>
        
                            <option value="Bolivia">Bolivia</option>
        
                            <option value="Botswana">Botswana</option>
        
                            <option value="Brazil">Brazil</option>
        
                            <option value="Bulgaria">Bulgaria</option>
        
                            <option value="Burkina Faso">Burkina Faso</option>
        
                            <option value="Burundi">Burundi</option>
        
                            <option value="Cambodia">Cambodia</option>
        
                            <option value="Cameroon">Cameroon</option>
        
                            <option value="Canada">Canada</option>
        
                            <option value="Chad">Chad</option>
        
                            <option value="Chile">Chile</option>
        
                            <option value="China">China</option>
        
                            <option value="Colombia">Colombia</option>
        
                            <option value="Comoros">Comoros</option>
        
                            <option value="Costa Rica">Costa Rica</option>
        
                            <option value="Cote D'Ivoire">Cote D'Ivoire</option>
        
                            <option value="Cyprus">Cyprus</option>
        
                            <option value="Czech Republic">Czech Republic</option>
        
                            <option value="Denmark">Denmark</option>
        
                            <option value="Djibouti">Djibouti</option>
        
                            <option value="Dominican Republic">Dominican Republic</option>
        
                            <option value="Ecuador">Ecuador</option>
        
                            <option value="Egypt">Egypt</option>
        
                            <option value="El Salvador">El Salvador</option>
        
                            <option value="Estonia">Estonia</option>
        
                            <option value="Fiji">Fiji</option>
        
                            <option value="Finland">Finland</option>
        
                            <option value="France">France</option>
        
                            <option value="Gabon">Gabon</option>
        
                            <option value="Gambia">Gambia</option>
        
                            <option value="Georgia">Georgia</option>
        
                            <option value="Germany">Germany</option>
        
                            <option value="Ghana">Ghana</option>
        
                            <option value="Gibraltar">Gibraltar</option>
        
                            <option value="Greece">Greece</option>
        
                            <option value="Greenland">Greenland</option>
        
                            <option value="Grenada">Grenada</option>
        
                            <option value="Guatemala">Guatemala</option>
        
                            <option value="Guinea">Guinea</option>
        
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
        
                            <option value="Guyana">Guyana</option>
        
                            <option value="Haiti">Haiti</option>
        
                            <option value="Honduras">Honduras</option>
        
                            <option value="Hong Kong">Hong Kong</option>
        
                            <option value="Hungary">Hungary</option>
        
                            <option value="Iceland">Iceland</option>
        
                            <option value="India">India</option>
        
                            <option value="Indonesia">Indonesia</option>
        
                            <option value="Iran (Islamic Republi">Iran (Islamic Republi</option>
        
                            <option value="Iraq">Iraq</option>
        
                            <option value="Ireland">Ireland</option>
        
                            <option value="Israel">Israel</option>
        
                            <option value="Italy">Italy</option>
        
                            <option value="Jamaica">Jamaica</option>
        
                            <option value="Japan">Japan</option>
        
                            <option value="Jordan">Jordan</option>
        
                            <option value="Kazakhstan">Kazakhstan</option>
        
                            <option value="Kenya">Kenya</option>
        
                            <option value="Korea (South)">Korea (South)</option>
        
                            <option value="Kuwait">Kuwait</option>
        
                            <option value="Latvia">Latvia</option>
        
                            <option value="Lebanon">Lebanon</option>
        
                            <option value="Lesotho">Lesotho</option>
        
                            <option value="Liberia">Liberia</option>
        
                            <option value="Libyan Arab Jamahiriy">Libyan Arab Jamahiriy</option>
        
                            <option value="Lithuania">Lithuania</option>
        
                            <option value="Luxembourg">Luxembourg</option>
        
                            <option value="Madagascar">Madagascar</option>
        
                            <option value="Malawi">Malawi</option>
        
                            <option value="Malaysia">Malaysia</option>
        
                            <option value="Mali">Mali</option>
        
                            <option value="Mauritania">Mauritania</option>
        
                            <option value="Mauritius">Mauritius</option>
        
                            <option value="Mexico">Mexico</option>
        
                            <option value="Mongolia">Mongolia</option>
        
                            <option value="Morocco">Morocco</option>
        
                            <option value="Mozambique">Mozambique</option>
        
                            <option value="Myanmar">Myanmar</option>
        
                            <option value="Namibia">Namibia</option>
        
                            <option value="Nauru">Nauru</option>
        
                            <option value="Nepal">Nepal</option>
        
                            <option value="Netherlands">Netherlands</option>
        
                            <option value="New Zealand">New Zealand</option>
        
                            <option value="Nicaragua">Nicaragua</option>
        
                            <option value="Niger">Niger</option>
        
                            <option value="Nigeria">Nigeria</option>
        
                            <option value="Norway">Norway</option>
        
                            <option value="Oman">Oman</option>
        
                            <option value="Pakistan">Pakistan</option>
        
                            <option value="Panama">Panama</option>
        
                            <option value="Papua New Guinea">Papua New Guinea</option>
        
                            <option value="Paraguay">Paraguay</option>
        
                            <option value="Peru">Peru</option>
        
                            <option value="Philippines">Philippines</option>
        
                            <option value="Poland">Poland</option>
        
                            <option value="Portugal">Portugal</option>
        
                            <option value="Qatar">Qatar</option>
        
                            <option value="Saudi Arabia">Saudi Arabia</option>
        
                            <option value="Senegal">Senegal</option>
        
                            <option value="Sierra Leone">Sierra Leone</option>
        
                            <option value="Singapore">Singapore</option>
        
                            <option value="Somalia">Somalia</option>
        
                            <option value="South Africa">South Africa</option>
        
                            <option value="Spain">Spain</option>
        
                            <option value="Sri Lanka">Sri Lanka</option>
        
                            <option value="Sudan">Sudan</option>
        
                            <option value="Suriname">Suriname</option>
        
                            <option value="Swaziland">Swaziland</option>
        
                            <option value="Sweden">Sweden</option>
        
                            <option value="Switzerland">Switzerland</option>
        
                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
        
                            <option value="Taiwan">Taiwan</option>
        
                            <option value="Tajikistan">Tajikistan</option>
        
                            <option value="Thailand">Thailand</option>
        
                            <option value="Togo">Togo</option>
        
                            <option value="Trinidad And Tobago">Trinidad And Tobago</option>
        
                            <option value="Tunisia">Tunisia</option>
        
                            <option value="Turkey">Turkey</option>
        
                            <option value="Turkmenistan">Turkmenistan</option>
        
                            <option value="Uganda">Uganda</option>
        
                            <option value="Ukraine">Ukraine</option>
        
                            <option value="United Arab Emirates">United Arab Emirates</option>
        
                            <option value="United Kingdom">United Kingdom</option>
        
                            <option value="United States">United States</option>
        
                            <option value="Uruguay">Uruguay</option>
        
                            <option value="Uzbekistan">Uzbekistan</option>
        
                            <option value="Venezuela">Venezuela</option>
        
                            <option value="VietNam">VietNam</option>
        
                            <option value="Yemen">Yemen</option>
        
                            <option value="Yugoslavia">Yugoslavia</option>
        
                            <option value="Zambia">Zambia</option>
        
                            <option value="Zimbabwe">Zimbabwe</option>
        
                        </select>
        
                    </div>
        
                </div>
        
                <div class="col-12 col-sm-6 col-md-12 col-lg-6 my-2 {{-- swapped-element --}}">
        
                  <div class="form-group">
        
                    <label for="participants">No Of Participants</label>
        
                    <input type="number" name="no_participants" class="form-control" placeholder="Enter number of participants" id="participants">
        
                </div>
        
            </div>
            <div class="col-12 col-sm-6 col-md-12 col-lg-6 my-2 {{-- swapped-element --}}">
        
              <div class="form-group">
        
                <label for="travelDate">Expected Travel Date<span class="text-danger">*</span></label>
        
                <input type="text" name="expected_date" class="form-control date-picker" placeholder="Enter your expected travel date" id="travelDate" required>
        
            </div>
        
        </div>
        <div class="col-12 col-sm-6 col-md-12 col-lg-6 my-2 {{-- swapped-element --}}">
        
          <div class="form-group">
        
            <label for="contactNumber">Contact Number<span class="text-danger">*</span></label>
        
            <input type="text" name="phone" class="form-control" placeholder="Enter your contact address" id="contactNumber" required>
        
        </div>
        
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 my-2 {{-- swapped-element --}}">
        
        
        <div class="form-group">
            <label for="How did you find us?">How did you find us?<span class="text-danger">*</span></label>
           <select name="agent" class="form-control" required>
               {{--  <option value="Past Traveller">Past Traveller</option>
                <option value="Search Engine">Search Engine</option> --}}
                {{-- <option value="Agent">Agent</option> --}}
                 @foreach($agents as $agent)
                <option value="{{$agent->id}}">{{$agent->name}}</option>
                @endforeach
                {{-- <option value="Anjan Shrestha">Anjan Shrestha</option> --}}
            </select>
                                            
        </div>
        
        </div>
        @endif
        
        
        
        <div class="col-12">
        
          <div class="form-group">
        
            <label for="message">Your Message<span class="text-danger">*</span></label>
        
            <textarea name="comment" class="form-control" placeholder="Enter your message" id="message" required></textarea>
        
        </div>
        
        </div>
        <input type="hidden" name="booking" value="{{$package->id}}">
        <div class="col-12">
        
          <div class="form-group">
        
            <button type="submit" class="btn btn-primary mt-2">Submit <i class="fa fa-paper-plane"></i></button>
        
        </div>
        
        </div>
        
        </div>
        
        </form>
              </div>
        </div>
      
      </div>
    </div>
  </div>





@endsection

@push('scripts')
<script type="text/javascript"
src="https://www.viralpatel.net/demo/jquery/jquery.shorten.1.0.js"></script>

<script>
	$(document).ready(function() {
	
		$(".comment").shorten(
            {
                "showChars" : 450,
	"moreText"	: "See More",
	"lessText"	: "See Less",
            }
        );
	
	});
</script>
@endpush

@push('scripts')
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {

    $("#datepicker").datepicker();
    $("#travelDate").datepicker();


});
</script>

   <script>
    function adjustMonths() {
     var thisYear = new Date().getFullYear() + "";
     var thisMonth = new Date().getMonth()+1 + "";
     var selectedYear = $(".select-year").val();
     if (thisMonth.length == 1) {
      thisMonth = "0" + thisMonth;
    }

    var yearAndMonth = parseInt(thisYear+thisMonth);

    $('#select-month option').each(function() {

      var selectMonth = $(this).prop('value');
      
      if (selectMonth.length == 1) {
       selectMonth = "0" + selectMonth;
     }

     if (parseInt(selectedYear + selectMonth) < yearAndMonth) {
       $(this).hide();
     } else {
       $(this).show();
     }

   });

    $("#select-month option").prop(':selected', false);

    $('#select-month option').each(function () {
      if ($(this).css('display') != 'none') {
        $(this).prop("selected", true);
        return false;
      }
    });

  }

  $(document).ready(function() {
    adjustMonths();
    
    $('.select-year').change(function() {
      adjustMonths();
    })

 });
</script>
<script type="text/javascript">
  $(document).ready(function() {
   ajaxdate();
   $("#select-month, .select-year").change(function(e) {
        e.preventDefault();    
        $('#ajaxloader').show();
        // console.log('changed');
        ajaxdate();
    });
    function ajaxdate(){
        $.ajax({
          type: 'GET',
          url: '{{ route('departure') }}',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          
          data: {
            packageid : {{ $packages_id }},
            year: $(".select-year").val(),
            month: $("#select-month").val()
          },
          success: function(data) {
            $(".ajaxloadmoredeparture").empty();
            $(".ajaxloadmoredeparture").append(data);
            $('#ajaxloader').hide();

          }
        });
      }
    });
</script>




@endpush 
@push('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 


@endpush