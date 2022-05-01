
    <!-- other packages  -->
    @php
    $packages=DB::table('packages')->where('status',1)->where('price','!=',null)->inRandomOrder()->limit(8)->get();
   @endphp
    <section class="py-5">
        <div class="container">
            <h2 class="custom-fs-24 my-5 text-uppercase custom-fw-600">Other Package</h2>
            <div class="grid-5">
                @foreach ($packages as $package)
                    
                <div class="card card_style_2">
                    <a href="{{route('package.detail',['id'=>$package->id])}}">

                        <div class="card-img">
                            <img src="{{$package->thumbnail}}" class="card-img-top">
                            <a href="{{route('package.detail',['id'=>$package->id])}}" class="btn btn_secondary">View Detail</a>
                            <h5 class="card-title">{{$package->name}} </h5>
                        </div>

                    </a>
                </div>
                @endforeach
             
            </div>
        </div>
    </section>