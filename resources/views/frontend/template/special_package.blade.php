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
                                $damount=($package->discounted_price*100)/$package->price
                            @endphp
                            <h3>{{ ceil($damount)}}%</h3>
                            <p>Discount</p>
                        </div>
                    </div>
                    <div class="img-desc">
                        <div class="about-img row">
                            <div class="col-5">
                               <p class="px-0 mx-0">
                                   @if (!empty($package->duration))
                                   {{ $package->duration }} |
                                   @endif
                                   @if (!empty($package->activity))
                                 {{ Str::limit($package->activity,16) }}
                                       
                                   @endif

                                   </p> 

                        </div>
                        <div class="col-7 ">

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
                            {{ Str::limit($package->name,18) }}
                        </div>
                        <div class="price"> $USD {{ $package->price }}
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>