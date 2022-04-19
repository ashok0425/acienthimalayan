@extends('frontend.layout.master')

@section('content')
 
<section class="detail__banner">
    @if($package->cover!=null)
    <img src="{{asset($package->cover)}}" alt="cover image" class="img-fluid banner__image">

    @else 
    <img src="{{asset('frontend/img/ashok-acharya-mYjORLebCyM-unsplash.jpg')}}" alt="cver image" class="img-fluid banner__image">

    @endif 

    <div class="container">
        <div class="text">
            <h1 >{{$package->name}}</h1>

            {{-- <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="#" class="btn btn_transparent"  data-aos-delay="200">Book This Your</a>
                <a href="#" class="btn btn_transparent"  data-aos-delay="300">View Photos</a>
                <a href="#" class="btn btn_transparent"  data-aos-delay="400">Video Preview</a>
            </div> --}}
        </div>
    </div>
</section>

<section class="detail py-5">
    <div class="container">

        <div class="row">
            <div class="col-lg-3 order-1 order-lg-0">
                <h2 class="custom-fs-24 my-5 text-uppercase custom-fw-600">Other Tours</h2>

                @foreach ($packages as $packaged)
                <div class="card card_style_2 h-auto mb-3" bis_skin_checked="1">
                    
                    <div class="card-img" bis_skin_checked="1">
                        @if ($packaged->thumbnai!=null)
                        <img src="{{asset($packaged->thumbnail)}}" class="card-img-top">
                            
                        @else  
                        <img src="{{asset('frontend/img/mustang.jpg')}}" class="card-img-top">

                        @endif

                        <a href="{{route('package.detail',['id'=>$packaged->id])}}" class="btn btn_secondary">View Detail</a>
                        <h5 class="card-title">{{$packaged->name}}</h5>
                    </div>
                </div>
                @endforeach
              
               
            </div>
            <div class="col-lg-9 order-0 order-lg-1">
                <div class="row">
                    <div class="col-md-6 order-1 order-md-0">
                        <h2 class="custom-fs-24 my-5 text-uppercase custom-fw-600">Package Summery</h2>

                        <div class="package__summery mb-4">
                            <div class="header">
                                Included
                            </div>
                            <div class="text">
                                    {!!$package->include_exclude!!}
                            </div>

                        </div>
                        <div class="package__summery mb-4">
                            <div class="header">
                                Not Included
                            </div>
                            <div class="text">
{!!$package->trip_excludes!!}
                            </div>
                        </div>
                        <div class="package__summery">
                            <div class="header">
                                OUTLINE ITINERARY


                            </div>
                            <div class="text">
                               {!! $package->outline_itinerary!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 order-0 order-md-1">
                        <div class="book__now">
                            <div
                                class="filter__wrap__head custom-bg-primary text-center text-white py-4 custom-fs-30" >
                                @if (!empty($package->discounted_price))
                                    
                                <p class="mb-0 lh-1"><small><s>NRP {{$package->price}}</s></small></p>
                                <p class="mb-0 lh-1">NRP {{$package->discounted_price}}</p>

                                @else   
                                <p class="mb-0 lh-1">NRP {{$package->price}}</p>

                                @endif
                                <p class="mb-0 lh-1">(per person)</p>
                            </div>
                            <form action="#">
                                <div class="filters">
                                    <div class="wrap">
                                        <label for="">Full Name</label>
                                        <p><input type="text" name="" id="" class="form-control"></p>
                                    </div>
                                    <div class="wrap">
                                        <label for="">Email Address</label>
                                        <p><input type="text" name="" id="" class="form-control"></p>
                                    </div>
                                    <div class="wrap">
                                        <label for="">Phone Number</label>
                                        <p><input type="text" name="" id="" class="form-control"></p>
                                    </div>
                                    <div class="wrap">
                                        <label for="">Age</label>
                                        <p><input type="text" name="" id="" class="form-control"></p>
                                    </div>
                                    <div class="wrap">
                                        <label for="">Address</label>
                                        <p><input type="text" name="" id="" class="form-control"></p>
                                    </div>
                                    <div class="wrap">
                                        <label for="">Gender</label>
                                        <p><select class="form-select form-select-sm">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Others</option>
                                            </select>
                                        </p>
                                    </div>
                                    <div class="wrap">
                                        <label for="">Depature Date</label>
                                        <p><input type="date" name="" id="" class="form-control"></p>
                                    </div>
                                    <div class="wrap">
                                        <label for="">Number of Person</label>
                                        <p><input type="number" name="" id="" class="form-control"></p>
                                    </div>
                                    <div class="d-flex justify-content-center pb-4">
                                        <button class="btn btn_primary ">Book Now</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-lg-11  my-4 order-3">
                        <h2 class="custom-fs-24 my-5 text-uppercase custom-fw-600">Package Summery</h2>
                        <p>
                           {!! $package->overview !!}
                        </p>
                    </div>
                    {{-- <div class="col-lg-11  my-4 order-4">
                        <div class="row justify-content-between">
                            <div class="col-sm-5 mb-5 mb-sm-0">
                                <div class="package__summery ">
                                    <div class="text text-center">
                                        <h3 class="mb-3">How many stars would you give to them?</h3>
                                        <p>According to service provide by
                                            ABC travels you can rate them.</p>

                                        <form action="#" class="d-flex justify-content-center gap-2 mt-3">
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                    id="Capa_1" x="0px" y="0px" width="26.09px" height="26.09px"
                                                    viewBox="0 0 36.09 36.09"
                                                    style="enable-background:new 0 0 36.09 36.09;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <path
                                                            d="M36.042,13.909c-0.123-0.377-0.456-0.646-0.85-0.688l-11.549-1.172L18.96,1.43c-0.16-0.36-0.519-0.596-0.915-0.596   s-0.755,0.234-0.915,0.598L12.446,12.05L0.899,13.221c-0.394,0.04-0.728,0.312-0.85,0.688c-0.123,0.377-0.011,0.791,0.285,1.055   l8.652,7.738L6.533,34.045c-0.083,0.387,0.069,0.787,0.39,1.02c0.175,0.127,0.381,0.191,0.588,0.191   c0.173,0,0.347-0.045,0.503-0.137l10.032-5.84l10.03,5.84c0.342,0.197,0.77,0.178,1.091-0.059c0.32-0.229,0.474-0.633,0.391-1.02   l-2.453-11.344l8.653-7.737C36.052,14.699,36.165,14.285,36.042,13.909z M25.336,21.598c-0.268,0.24-0.387,0.605-0.311,0.957   l2.097,9.695l-8.574-4.99c-0.311-0.182-0.695-0.182-1.006,0l-8.576,4.99l2.097-9.695c0.076-0.352-0.043-0.717-0.311-0.957   l-7.396-6.613l9.87-1.002c0.358-0.035,0.668-0.264,0.814-0.592l4.004-9.077l4.003,9.077c0.146,0.328,0.456,0.557,0.814,0.592   l9.87,1.002L25.336,21.598z" />
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                </svg></a>
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                    id="Capa_1" x="0px" y="0px" width="26.09px" height="26.09px"
                                                    viewBox="0 0 36.09 36.09"
                                                    style="enable-background:new 0 0 36.09 36.09;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <path
                                                            d="M36.042,13.909c-0.123-0.377-0.456-0.646-0.85-0.688l-11.549-1.172L18.96,1.43c-0.16-0.36-0.519-0.596-0.915-0.596   s-0.755,0.234-0.915,0.598L12.446,12.05L0.899,13.221c-0.394,0.04-0.728,0.312-0.85,0.688c-0.123,0.377-0.011,0.791,0.285,1.055   l8.652,7.738L6.533,34.045c-0.083,0.387,0.069,0.787,0.39,1.02c0.175,0.127,0.381,0.191,0.588,0.191   c0.173,0,0.347-0.045,0.503-0.137l10.032-5.84l10.03,5.84c0.342,0.197,0.77,0.178,1.091-0.059c0.32-0.229,0.474-0.633,0.391-1.02   l-2.453-11.344l8.653-7.737C36.052,14.699,36.165,14.285,36.042,13.909z M25.336,21.598c-0.268,0.24-0.387,0.605-0.311,0.957   l2.097,9.695l-8.574-4.99c-0.311-0.182-0.695-0.182-1.006,0l-8.576,4.99l2.097-9.695c0.076-0.352-0.043-0.717-0.311-0.957   l-7.396-6.613l9.87-1.002c0.358-0.035,0.668-0.264,0.814-0.592l4.004-9.077l4.003,9.077c0.146,0.328,0.456,0.557,0.814,0.592   l9.87,1.002L25.336,21.598z" />
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                </svg></a>
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                    id="Capa_1" x="0px" y="0px" width="26.09px" height="26.09px"
                                                    viewBox="0 0 36.09 36.09"
                                                    style="enable-background:new 0 0 36.09 36.09;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <path
                                                            d="M36.042,13.909c-0.123-0.377-0.456-0.646-0.85-0.688l-11.549-1.172L18.96,1.43c-0.16-0.36-0.519-0.596-0.915-0.596   s-0.755,0.234-0.915,0.598L12.446,12.05L0.899,13.221c-0.394,0.04-0.728,0.312-0.85,0.688c-0.123,0.377-0.011,0.791,0.285,1.055   l8.652,7.738L6.533,34.045c-0.083,0.387,0.069,0.787,0.39,1.02c0.175,0.127,0.381,0.191,0.588,0.191   c0.173,0,0.347-0.045,0.503-0.137l10.032-5.84l10.03,5.84c0.342,0.197,0.77,0.178,1.091-0.059c0.32-0.229,0.474-0.633,0.391-1.02   l-2.453-11.344l8.653-7.737C36.052,14.699,36.165,14.285,36.042,13.909z M25.336,21.598c-0.268,0.24-0.387,0.605-0.311,0.957   l2.097,9.695l-8.574-4.99c-0.311-0.182-0.695-0.182-1.006,0l-8.576,4.99l2.097-9.695c0.076-0.352-0.043-0.717-0.311-0.957   l-7.396-6.613l9.87-1.002c0.358-0.035,0.668-0.264,0.814-0.592l4.004-9.077l4.003,9.077c0.146,0.328,0.456,0.557,0.814,0.592   l9.87,1.002L25.336,21.598z" />
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                </svg></a>
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                    id="Capa_1" x="0px" y="0px" width="26.09px" height="26.09px"
                                                    viewBox="0 0 36.09 36.09"
                                                    style="enable-background:new 0 0 36.09 36.09;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <path
                                                            d="M36.042,13.909c-0.123-0.377-0.456-0.646-0.85-0.688l-11.549-1.172L18.96,1.43c-0.16-0.36-0.519-0.596-0.915-0.596   s-0.755,0.234-0.915,0.598L12.446,12.05L0.899,13.221c-0.394,0.04-0.728,0.312-0.85,0.688c-0.123,0.377-0.011,0.791,0.285,1.055   l8.652,7.738L6.533,34.045c-0.083,0.387,0.069,0.787,0.39,1.02c0.175,0.127,0.381,0.191,0.588,0.191   c0.173,0,0.347-0.045,0.503-0.137l10.032-5.84l10.03,5.84c0.342,0.197,0.77,0.178,1.091-0.059c0.32-0.229,0.474-0.633,0.391-1.02   l-2.453-11.344l8.653-7.737C36.052,14.699,36.165,14.285,36.042,13.909z M25.336,21.598c-0.268,0.24-0.387,0.605-0.311,0.957   l2.097,9.695l-8.574-4.99c-0.311-0.182-0.695-0.182-1.006,0l-8.576,4.99l2.097-9.695c0.076-0.352-0.043-0.717-0.311-0.957   l-7.396-6.613l9.87-1.002c0.358-0.035,0.668-0.264,0.814-0.592l4.004-9.077l4.003,9.077c0.146,0.328,0.456,0.557,0.814,0.592   l9.87,1.002L25.336,21.598z" />
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                </svg></a>
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                    id="Capa_1" x="0px" y="0px" width="26.09px" height="26.09px"
                                                    viewBox="0 0 36.09 36.09"
                                                    style="enable-background:new 0 0 36.09 36.09;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <path
                                                            d="M36.042,13.909c-0.123-0.377-0.456-0.646-0.85-0.688l-11.549-1.172L18.96,1.43c-0.16-0.36-0.519-0.596-0.915-0.596   s-0.755,0.234-0.915,0.598L12.446,12.05L0.899,13.221c-0.394,0.04-0.728,0.312-0.85,0.688c-0.123,0.377-0.011,0.791,0.285,1.055   l8.652,7.738L6.533,34.045c-0.083,0.387,0.069,0.787,0.39,1.02c0.175,0.127,0.381,0.191,0.588,0.191   c0.173,0,0.347-0.045,0.503-0.137l10.032-5.84l10.03,5.84c0.342,0.197,0.77,0.178,1.091-0.059c0.32-0.229,0.474-0.633,0.391-1.02   l-2.453-11.344l8.653-7.737C36.052,14.699,36.165,14.285,36.042,13.909z M25.336,21.598c-0.268,0.24-0.387,0.605-0.311,0.957   l2.097,9.695l-8.574-4.99c-0.311-0.182-0.695-0.182-1.006,0l-8.576,4.99l2.097-9.695c0.076-0.352-0.043-0.717-0.311-0.957   l-7.396-6.613l9.87-1.002c0.358-0.035,0.668-0.264,0.814-0.592l4.004-9.077l4.003,9.077c0.146,0.328,0.456,0.557,0.814,0.592   l9.87,1.002L25.336,21.598z" />
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                </svg></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="tour__company">
                                    <div class="d-flex gap-3">
                                        <div class="tour__company__logo">
                                            <img src="img/logo.webp" alt="" class="img-fluid">
                                        </div>
                                        <div class="text">
                                            <p class="text-black-50">Tour is operated by:</p>
                                            <h5>Nepal Eco Adventure Pvt Ltd</h5>

                                            <div class="rating d-flex gap-1 align-items-center">
                                                <i class="fa-solid fa-star checked"></i><i
                                                    class="fa-solid fa-star checked"></i><i
                                                    class="fa-solid fa-star checked"></i><i
                                                    class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <span class="text-success">376 Reviews</span>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="#" class="btn btn_primary d-block mt-5">MAKE AND ENQUIRY</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
                
            </div>


        </div>

    </div>
    @include('frontend.includes.testimonial')

</section>

@endsection