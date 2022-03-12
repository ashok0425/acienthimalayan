@extends('frontend.layout.master')
@php
    define('PAGE','blog')
@endphp
@section('content')

<style>
    .attachment{
        display: none;
    }

    .blog-img img{
   height: 320px!important;

       }
       .blog_content_image img{
           min-width: 100%!important;
           max-width: 100%!important;

       }
   </style>
{{-- <section class="blog-img my-5 py-3">
    <div class="container">
        @if ($blog->guid!=null && file_exists($blog->guid))
        <img src="{{ asset($blog->guid)}}"  class="img-fluid w-100">
       
        @else 
        <img src="{{ asset('frontend/assets/recent-post.png')}}" alt="IMG" class="img-fluid"  >
        @endif
    </div>
</section> --}}
<section class="blog-container mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3 >
                    {!! $blog->post_title !!}

                </h3>
                <br>
                <br>

               <div class="blog_content_image">
                {!! $blog->post_content !!}
               </div>
            </div>
            <div class="col-md-4">
                <aside>
                  
                   
                    <div class="recent-blogs-wrapper">
                        <h4>More Blogs</h4>
                        @foreach ($mores as $more)
                            
                        <div class="recent-blog mb-3">
                            <a href="{{ route('blog.detail',['id'=>$more->ID]) }}">

                                <div class="row">
                                    <div class="col-5">
                                        @if ($more->guid!=null && file_exists($more->guid))
                        <img src="{{ asset($more->guid)}}"  class="img-fluid w-100">
                       
                        @else 
                        <img src="{{ asset('frontend/assets/recent-post.png')}}" alt="IMG" class="img-fluid"  >
                        @endif
                                    </div>
                                    <div class="col-7">
                                        <p>{{ $more->post_title }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                       
                    </div>
                  
                </aside>
            </div>
        </div>
    </div>
</section>
<div class="bot-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <a href="{{ route('blog') }}"><i class="fas fa-long-arrow-alt-left"></i> Back to Blogs</a>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-5">
                        <a href="{{ route('blog.detail',['id'=>$prev->ID]) }}"><i class="fas fa-long-arrow-alt-left"></i> Previous Blog</a>
                    </div>
                    <div class="col-2">|</div>
                    <div class="col-5">
                        <a href="{{ route('blog.detail',['id'=>$next->ID]) }}"> Next Blog <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection