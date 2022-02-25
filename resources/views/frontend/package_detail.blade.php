
 
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
</style>

@section('content')

<x-page-header :title="$package->name" :route="route('package.detail',['url'=>$package->url])"  :beforeroute="route('destination',['id'=>$before->id,'url'=>$before->url])" :before="$before->name"/>
 <div class="container-fluid px-0 mx-0">
    <div class="card">
        <div class="card-body py-1 my-0">
            <div class="row">
                <div class="col-md-2 offset-md-8 text-right">
                    <a href="{{ route('print',$package->id) }}" class="w-75 custom-bg-primary  text-decoration-none text-light btn_sm d-flex align-items-center justify-content-center"><i class="fa fa-print"></i>  
                       &nbsp;
                        Print This</a>
                </div>
                <div class="col-md-2 text-left">


                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox_w1qq"></div>
            
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60c809a3e6cdb001"></script>

                </div>
            </div>
        </div>
    </div>
</div>   
    
<main>
   
    <section class="trip-desc">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="book-now">
                            @if (!empty($package->duration))
                                
                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Duration</h2>
                               <p class='my-0 py-0'>{{ $package->duration }} </p>
                            </div>
                            @endif

                            <div class="col-12 py-2">
                                <h2 class='my-0 py-0'>Price</h2>
                               <p class='my-0 py-0'>
                               $USD
                                @if (!empty($package->discounted_price))
                                {{ $package->offer }} 

                                <s>{{ $package->price }}  </s>

                                @else   
                                {{ $package->price }}  
                                @endif <span class="custom-text-primary">Per Person</span></p>

                            </div>
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
                                    <i class="fas fa-star"></i>
                                    @endfor
                                    @for ($i=1;$i<=5-$package->rating;$i++)
                                
                                        <span><i
                                            class="fas fa-star"></i></span>
                                            @endfor
                                </div>
                                </p>
                            </div>
                            <div class="col-12 py-2">
                                <a class="btn btn-primary w-100" href="{{ route('booknow',['package_id'=>$package->id]) }}">Book Now</a>
                            </div>
                    </div>
                </div>
                <div class="col-md-8">
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
                                   
                                    @if (count($reviews)>0)
                                    <li class="nav-item " role="presentation">
                                        <a class="nav-link  font-weight-700 " id="review-tab" data-bs-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false"> <i class="fas fa-comment"></i> Review</a>
                                      </li>
                                      @endif
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

                        <div class="tab-pane card-body fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                         
                        @foreach ($reviews as $review)
                        <div class="card">

                        <div class="row">
                            <div class="col-md-4">
                               <div class="img card-body border">
                                   @if (!empty($review->image))
                                   <img src="{{ asset($review->image) }}" alt="" class="w-75">
                                       @else   
                                   <img src="{{ asset('frontend/assets/footer-img.png') }}" alt="">

                                   @endif
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
                @foreach ($features as $package)
                <div class="col-md-3 col-sm-4">
           
                <div class="card-style-2 ">
                    <a href="{{ route('package.detail',['id'=>$package->id,'url'=>$package->url]) }}" class="text-decoration-none">
                    <div class="img-container">
                       
                        @if ($package->banner==null)
                        <img src="{{ asset('frontend/assets/tour-1.png')}}" alt="" class="img-fluid w-100 w-100">
                        @else 
                        <img src="{{ asset($package->banner)}}" alt="{{$package->name  }}" class="img-fluid w-100">
                        @endif
                    </div>
                    <div class="img-desc">
                        <div class="about-img row">
                            <div class="col-6">
                               <p class="px-0 mx-0">
                                @if (!empty($package->duration))
                                   {{ $package->duration }} |
                                   @endif
                                   @if (!empty($package->activity))
                                 {{ Str::limit($package->activity,20) }}
                                       
                                   @endif
                                   </p> 

                        </div>
                        <div class="col-6 ">

                            <div class="rating">
                                @for ($i=1;$i<=$package->rating;$i++)
                                <i class="fas fa-star"></i>
                                @endfor
                                @for ($i=1;$i<=5-$package->rating;$i++)
                                <i class="far fa-star"></i>
                                @endfor
                             
                            </div>
                        </div>
                        </div>
                        <div class="title">
                            {{ Str::limit($package->name,20,'...') }}
                        </div>
                        <div class="price ">
                                $USD {{ $package->price }}

                            
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

@endsection

@push('scripts')
<script type="text/javascript"
src="https://www.viralpatel.net/demo/jquery/jquery.shorten.1.0.js"></script>

<script>
	$(document).ready(function() {
	
		$(".comment").shorten(
            {
                "showChars" : 300,
	"moreText"	: "See More",
	"lessText"	: "See Less",
            }
        );
	
	});
</script>
@endpush