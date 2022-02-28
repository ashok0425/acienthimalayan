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
                
                    <div class="card-style-1 ">
              

                        <div class="img ">
                        
                            @if ($destination->image==null)
                            <img src="{{ asset('frontend/assets/tour-1.png')}}" alt="" class="img-fluid w-100 w-100">
                            @else 
                            <img src="{{ asset($destination->image)}}" alt="{{$destination->name  }}" class="img-fluid w-100">
                            @endif
                           
                            <div class="places">
                                @php
                                    $place=DB::table('packages')->where('category_destination_id',$destination->id)->get()->count();

                                @endphp
                                {{ $place }} Places
                            </div>
                        </div>
                        
                    </div>
            <div class="card">
                <div class="place-name custom-fs-25 text-dark custom-fw-700 text-center card-body">
                    {{Str::limit($destination->name,18) }}
                </div>
            </div>
                </a>

                </div>
            @endforeach
           
        </div>
    </div>
</section>