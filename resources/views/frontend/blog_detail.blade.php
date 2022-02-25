@extends('frontend.layout.master')
@section('content')
<style>
    .attachment{
        display: none;
    }
</style>
<section class="blog-img">
    <div class="container">
        @if ($blog->guid!=null && file_exists($blog->guid))
        <img src="{{ asset($blog->guid)}}"  class="img-fluid w-100">
       
        @else 
        <img src="{{ asset('frontend/assets/recent-post.png')}}" alt="IMG" class="img-fluid"  >
        @endif
    </div>
</section>
<section class="blog-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3 >
                    {!! $blog->post_title !!}

                </h3>
                <br>
                <br>

                {!! $blog->post_content !!}
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
                                        @if ($blog->guid!=null && file_exists($blog->guid))
                        <img src="{{ asset($blog->guid)}}"  class="img-fluid w-100">
                       
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