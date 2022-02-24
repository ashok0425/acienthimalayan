@extends('frontend.layout.master')

@section('content')
<x-page-header :title="$data->title" :route="route('cms.detail',['page'=>$data->url])"  />
    <section class="articel2">
        <div class="container-fluid">
            <div class="row my-5">
                <div class="col-lg-6">
                    <img src="{{ asset($data->image)}}" class="img-fluid" alt="{{ $data->title }}" >
                </div>
                <div class="col-lg-6">
                    <div class="right-artile ps-lg-4">

                        <h1>{{ $data->title }}</h1>
                        {!! Str::limit($data->content,550) !!}
<br>
<br>

                        <a href="{{ route('cms.detail',['page'=>$data->url]) }}" class="btn btn-primary btn-sm">Read more <i class="fas fa-arrow-right"></i> </a>

                    </div>
                </div>
            </div>
            @php
           $childs= $data->child()->get();
                
            @endphp
          @foreach ($childs as $child)
         
          <div class="row my-5">
            <div class="col-lg-6  @if ($loop->index%2==0)
              order-1
              @else 
              order-2
                @endif">
                <div class="right-artile">

                    <h1>{{ $child->title }}</h1>
                    {!! Str::limit($child->content,550) !!}
                    <br>
                    <br>

                    <a href="{{ route('cms.detail',['page'=>$data->id,'id'=>$child->url]) }}" class="btn btn-primary btn-sm">Read more <i class="fas fa-arrow-right"></i> </a>
                </div>
            </div>
            <div class="col-lg-6  @if ($loop->index%2==0)
              order-2
              @else 
              order-1

                @endif"> <img src="{{ asset($child->image)}}" class="img-fluid" alt="" srcset=""></div>
        </div>
          @endforeach
            
            
        
        </div>
    </section>
  



    <section class="highly-rated">
       <div class="container">
        <div class="heading my-5">
            <h2>Highly Rated on</h2>
           
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-6   px-lg-0 col-5 mt-sm-5 mb-sm-2 my-lg-0
">
                <img src="./assets/logo-trip 1.png" alt="" class="img-fluid">
            </div>
            <div class="col-lg-3 col-md-6   px-lg-0 col-5 mt-sm-5 mb-sm-2 my-lg-0
">
                <img src="./assets/logo-trustpilot 1.png" alt="" class="img-fluid">

            </div>
            <div class="col-lg-3 col-md-6   px-lg-0 col-5 mt-sm-5 mb-sm-2 my-lg-0
">
                <img src="./assets/logo-stride 1.png" alt="" class="img-fluid">

            </div>
            <div class="col-lg-2 col-md-6   px-lg-0 col-5 mt-xs-5 mb-xs-2 my-lg-0
">
                <img src="./assets/google-reviews 1.png" alt="" class="img-fluid">

            </div>
            <div class="col-lg-2 col-md-6   px-lg-0 col-5 mt-xs-5 mb-xs-2 my-lg-0
">
                <img src="./assets/logo-yelp 1.png" alt="" class="img-fluid">

            </div>
        </div>
       </div>
    </section>
    <section class="partners py-5">
        <div class="container">
            <div class="heading my-5">
                <h2>We are affiliated to</h2>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-3 col-md-4 col-5 my-3">
                    <img src="./assets/partner-1.png" alt="" class="img-fluid">
                </div>
                <div class="col-lg-3 col-md-4 col-5 my-3">
                    <img src="./assets/partner-2.png" alt="" class="img-fluid">

                </div>
                <div class="col-lg-3 col-md-4 col-5 my-3">
                    <img src="./assets/partner-3.png" alt="" class="img-fluid">

                </div>
                <div class="col-lg-3 col-md-4 col-5 my-3">
                    <img src="./assets/partner-4.png" alt="" class="img-fluid">

                </div>
            </div>
        </div>
    </section>
@endsection