@extends('frontend.layout.master')

@section('content')
 
<section class="package__listing py-5 ">
    <div class="py-5"></div>
    <div class="container">
      
        <div class="row justify-content-between">
            

            @foreach ($packages as $package)
                
            <div class="col-lg-6">
                <div class="mb-3">
                    <div class="card__3">
                        <div class="img__wrap">
                            <div class="flash__offer">
                                Flash Offer
                            </div>
                          
                            <img src="{{asset($package->thumbnail)}}" alt="" class="img-fluid">
                        </div>
                        <div class="text">
                            <h2 class="mb-3">{{$package->name}}</h2>
                            <div class="rating custom-fs-14 mb-3">
                                <div class="stars">

                                @for ($i =1 ; $i <=$package->rating ; $i++)
                                <i class="fa-solid fa-star checked"></i>
                                    
                                @endfor

                                @for ($i =1 ; $i <=5-$package->rating ; $i++)
                                    <i class="fa-solid fa-star "></i>
                                    
                                @endfor
                                    
                                    of 5 reviews
                                </div>
                            </div>
                            <div class="d-flex custom-fs-14 gap-2 align-items-center">
                                <span> <i class="fa-solid fa-check me-2 text-danger"></i> Free cancellation</span>
                                <span> <i class="fa-solid fa-check me-2 text-danger"></i> No booking fees</span>
                            </div>
                            <div class="info">
                                <div class="left">
                                    Duration
                                </div>
                                <div class="right">
                                    {{$package->duration}}
                                </div>
                                <div class="left">
                                    Transport
                                </div>
                                <div class="right">
                                    {{$package->transport}}

                                </div>
                                <div class="left">
                                    Activities
                                </div>
                                <div class="right">
                                    {{$package->activity}}
                                </div>
                                <div class="left">
                                    Accommodation
                                </div>
                                <div class="right">
                                   {{$package->room?$package->room.'/':''}}
                                   {{$package->meals}}

                                </div>
                                <div class="left">
                                    Group Size
                                </div>
                                <div class="right">
                                    {{$package->group_size}}s
                                </div>
                                <div class="left">
                                    Arrived At
                                </div>
                                <div class="right">
                                    {{$package->arrival}}
                                </div>

                                <div class="left">
                                    Departure From
                                </div>
                                <div class="right">
                                    {{$package->departure}}
                                </div>
                            </div>
                            <div class="departure">
                                <div class="info mt-0">
                                   
                                    <div class="price">
                                        @if ($package->discounted_price!=null)
                                        <p class="text-decoration-line-through">Nrs {{$package->price}}</p>
                                        <p class="price">Nrs {{$package->discounted_price}}</p> 

                                        @else 
                                   
                                        <p class="price">Nrs {{$package->price}}</p> 

                                        @endif
                                        
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{route('package.detail',['id'=>$package->id])}}" class="btn btn_secondary">View Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

          
               
                <div class="pagination">
                  
                </div>
            </div>
        </div>
    </div>
</section>
@endsection