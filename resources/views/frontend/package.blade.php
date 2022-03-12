@extends('frontend.layout.master')
@php
    define('PAGE','destination')
@endphp
@section('content')
<main>
    <x-page-header :title="$data->name" :route="route('destination',['id'=>$data->id,'url'=>$data->url])"  />  
    <section class="tour-packages ">
        <div class="container">
       
            <div class="row">
                    @foreach ($packages as $package)
                    <div class="col-lg-3 col-sm-6 ">
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
                                        <div class="col-12">
                                           <p class="px-0 mx-0">
                                            @if (!empty($package->duration))
                                            {{ $package->duration }} |
                                            @endif
                                            @if (!empty($package->activity))
                                          {{ Str::limit($package->activity,38) }}
                                                
                                            @endif
                                               </p> 
            
                                    </div>
                                    <div class="col-6 ">
            
                                        <div class="rating">
                                            @for ($i=1;$i<=$package->rating;$i++)
                                            <i class="fas fa-star text-warning"></i>
                                            @endfor
                                            @for ($i=1;$i<=5-$package->rating;$i++)
                                            <i class="far fa-star text-gray"></i>
                                            @endfor
                                         
                                        </div>
                                    </div>
                                    <div class="col-6">
                                    <span class="custom-fs-18 custom-fw-600 custom-text-primary">
                                        $USD {{ $package->price }}
            
                                    </span>
                                    </div>
                                    </div>
                                    <div class="title mt-1 custom-fs-18">
                                        {{ $package->name }}
                                    </div>
                                    
                                </div>
                     </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="my-2 py-4">
                       <div class="row">
                           <div class="col-md-4 offset-md-8">
                            {{ $packages->links() }}
                           </div>
                       </div>
                    </div>
              
            </div>
        </div>
    </section>
    
   
</main>
@endsection