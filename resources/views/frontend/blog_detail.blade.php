@extends('frontend.layout.master')

@section('content')
<section class="banner__2 pb-4" >
    <div class="container text-center mt-5 pt-5">
        <br>
        @if ($blog->image!=null)
        <img src="{{asset($blog->image)}}" alt="" class="img-fluid banner__image">

            @else 
            <img src="{{asset('frontend/img/mustang.jpg')}}" alt="" class="img-fluid banner__image">

        @endif
    </div>
    <div class="watermark">

        <svg viewBox="0 0 698 758" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M22.3069 256C-18.0931 187.2 5.4736 47.3333 22.3069 -14L701.807 -115L766.307 156.5L727.807 757.5C649.14 758.5 473.707 751 401.307 713C310.807 665.5 351.807 589 276.807 549C201.807 509 244.807 403.5 218.807 363.5C192.807 323.5 72.8069 342 22.3069 256Z"
                fill="#EBF7FC" />
        </svg>
    </div>
</section>


<section class="py-5">
    <div class="container">
        <h1 class="custom-fs-40 custom-font-volkhov text-center  mb-5">{{$blog->title}}</h1>

        <article class="article" >


            <p class="mb-3">
                {!!$blog->detail!!}
            </p>
    </div>
    </article>

    </div>
</section>
@endsection