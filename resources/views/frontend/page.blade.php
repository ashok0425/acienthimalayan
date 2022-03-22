@extends('frontend.layout.master')
@php
    define('PAGE','about')
@endphp
@section('content')
<x-page-header :title="$data->title" :route="route('cms.detail',['page'=>$data->url])"  :img="asset('about.jpg') "/>
    <section class="articel2">
        <div class="container">
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
  



    <section class="highly-rated bg-white">
       <div class="container">
        <div class="heading my-5">
            <h2>Highly Rated on</h2>
           
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-6   px-lg-0 col-6 mt-sm-5 text-center mb-sm-2 my-lg-0
">
                <img src="{{asset('frontend/assets/logo-trip 1.png')}}" alt="" class="img-fluid w-50">
            </div>
            <div class="col-lg-3 col-md-6   px-lg-0 col-6 mt-sm-5 text-center mb-sm-2 my-lg-0
">
                <img src="{{asset('frontend/assets/logo-trustpilot 1.png')}}" alt="" class="img-fluid w-50">

            </div>
            <div class="col-lg-3 col-md-6   px-lg-0 col-6 mt-sm-5 text-center mb-sm-2 my-lg-0
">
                <img src="{{asset('frontend/assets/stride.png')}}" alt="" class="img-fluid w-50">

            </div>
            <div class="col-lg-2 col-md-6   px-lg-0 col-6 text-center mt-xs-5 mb-xs-2 my-lg-0
">
                <img src="{{asset('frontend/assets/google-reviews 1.png')}}" alt="" class="img-fluid w-75">

            </div>
            <div class="col-lg-2 col-md-6   px-lg-0 col-6 offset-3 offset-md-0 text-center mt-xs-5 mb-xs-2 my-lg-0
">
                <img src="{{asset('frontend/assets/logoyep.png')}}" alt="" class="img-fluid w-75">

            </div>
        </div>
       </div>
    </section>
   
    @include('frontend.template.afflicate')
@endsection