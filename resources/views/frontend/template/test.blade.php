


@push('style')
<style>
    .bg_img{
        background:url("{{asset('alp.jpg')}}");
        background-size:cover;
        background-repeat:no-repeat;
        padding: 4rem 1.2rem;
        background-attachment: fixed;
/* background-blend-mode: multiply; */
    }
    </style>
{{-- owl carousel  --}}
<style>
.destinations  .owl-nav button{
position: absolute;
cursor: pointer;
top: 71%!important;
}


.destinations>.owl-nav>.owl-prev{
color:  rgb(2, 9, 12)!important;
left: 131%!important;
border: 2px solid  rgb(42, 135, 183)!important;
width: 40px;
height: 40px;
border-radius: 50%;
transition: all .3s ease-in-out;
color:  #fff!important;

}
.destinations>.owl-nav>.owl-next{
right: -46%!important;
color:  #fff!important;
border: 2px solid  rgb(42, 135, 183)!important;
width: 40px;
height: 40px;
border-radius: 50%;
transition: all .3s ease-in-out;

}

.destinations .owl-nav button:hover{
background-color:  rgb(42, 135, 183)!important;
color: #fff!important;
}

@media (max-width: 760px) {

    .destinations  .owl-nav button{

top: 50%!important;
}


.destinations>.owl-nav>.owl-prev{
left: 3px!important;


}
.destinations>.owl-nav>.owl-next{
right:3px!important;


}
}
</style>
@endpush
@php
$destinations=DB::table('destinations')->orderBy('id','desc')->where('status',1)->get();
@endphp
<div class="bg_img mt-4">
<div class="container-fluid">

<div class="row">
        <div class="col-md-7 order-2 order-md-1">
            <div class="owl-carousel destinations ">
                @foreach ($destinations as $destination)
         
    
    
                <div class="mx-2 card">
                    <a href="{{ route('destination',['id'=>$destination->id,'url'=>$destination->url]) }}" class="text-decoration-none">
                    
                        <div class="card-style-1  dest_img">
                  
    
                            <div class="img ">
                            
                                @if ($destination->image==null)
                                <img src="{{ asset('frontend/assets/tour-1.png')}}" alt="" class="img-fluid w-100 w-100">
                                @else 
                                <img src="{{ asset($destination->image)}}" alt="{{$destination->name  }}" class="img-fluid w-100">
                                @endif
                               
                                <div class="places">
                                    @php
                                        $place=DB::table('packages')->where('price','!=',0)->where('destination_id',$destination->id)->where('status',1)->get()->count();
    
                                    @endphp
                                    {{ $place }} Places
                                </div>
                            </div>
                            
                        </div>
                <div class="card-body">
                    <div class="place-name custom-fs-25 text-dark custom-fw-700 text-center">
                        {{Str::limit($destination->name,18) }}
                    </div>
                </div>
                    </a>
    
                    </div>
                @endforeach
               
            </div>
        </div>
        <div class="col-md-3 order-1 order-md-2 offset-md-1" >
          <div class="py-md-5 my-md-5 py-3 text-center ">
            <h2 class="text-lg text-uppercase text-white">Top Destinations</h2>
              <p class="text-white">We have various amazing destinations handpicked for you.Our guide are ready for your adventures in multiple countries.</p>
           
        </div>
    </div>
</div>

</div>
</div>

{{-- 
@push('scripts')

<script>
    $('.dest_img').mouseover(function(){
let src=$(this).closest('img').attr('src')
        alert(src)
    })
</script>
@endpush --}}