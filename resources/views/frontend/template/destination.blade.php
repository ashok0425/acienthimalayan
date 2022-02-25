@php
    $destinations=DB::table('destinations')->orderBy('id','desc')->where('status',1)->get();
@endphp
<section class="best-place-destination mt-5">
    <div class="container">
        <div class="heading ">
            <h2>
                Top Destination
            </h2>
        </div>
        <div class="owl-carousel destinations ">
            @foreach ($destinations as $destination)
            <div class="mx-2">
                <a href="{{ route('destination',['id'=>$destination->id,'url'=>$destination->url]) }}" class="text-decoration-none">
                
                    <div class="card-style-1">
                        <div class="img">
                            @if ($destination->image==null)
                            <img src="{{ asset('frontend/assets/tour-1.png')}}" alt="{{$destination->name  }}" class="img-fluid w-100">
                            @else 
                            <img src="{{ asset($destination->image)}}" alt="{{$destination->name  }}" class="img-fluid w-100">
                            @endif
                         
                            <div class="place-name">
                                {{ $destination->name }}
                            </div>
                            <div class="places">
                                @php
                                    $category_d=DB::table('packages')->where('destination_id',$destination->id)->where('status',1)->get()->count();
                                @endphp
                                {{ $category_d }} Places
                            </div>
                        </div>
                </div>
                </a>
            </div>
            @endforeach
           
        </div>
    </div>
</section>