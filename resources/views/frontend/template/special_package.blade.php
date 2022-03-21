@php
    $packages=DB::table('packages')->orderBy('id','desc')->where('status',1)->where('duration','!=',null)->where('activity','!=',null)->where('discounted_price','!=',null)->get();
@endphp
<section class="special-packages ">
    <div class="container-fluid">
        <div class="heading mt-5">
            <h2>Special Packages</h2>
        </div>
        <div class="owl-carousel special_packages">
            @foreach ($packages as $package)

            <div class="mx-2">
                <div class="card-style-2 ">
                    <a href="{{ route('package.detail',['id'=>$package->id,'url'=>$package->url]) }}" class="text-decoration-none">
                    <div class="img-container">
                      

                        @if ($package->banner==null)
                        <img src="{{ asset('frontend/assets/tour-1.png')}}" alt="" class="img-fluid w-100 w-100">
                        @else 
                        <img src="{{ asset($package->banner)}}" alt="{{$package->name  }}" class="img-fluid w-100">
                        @endif
                        <div class="discount bg-success">
                            @php
                                $damount=$package->price-$package->discounted_price;
                               $dpercent=($damount*100)/$package->price;
                            @endphp
                            <h3>{{ ceil($dpercent)}}%</h3>
                            <p>Discount</p>
                        </div>
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
                            @if ($package->discounted_price!=null && !empty($package->discounted_price))
                                
                            $USD {{ $package->discounted_price }}

                            @else     
                            $USD {{ $package->price }}
                            @endif

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
            
        </div>
    </div>
</section>