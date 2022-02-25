@extends('frontend.layout.master')
@section('content')
<x-page-header title="Blog" :route="route('blog')"  />

<section class="blog-post ">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
                
            <div class="col-md-4 col-sm-12  my-2">
                <div class="post-card-1 card">
                    <a href="{{ route('blog.detail',['id'=>$blog->ID]) }}">
                    <div class="img-container">
                        <img src="{{ asset('frontend/assets/recent-post.png')}}" alt="IMG" class="img-fluid">
                        <div class="date">
                            <span>
                            {{ carbon\carbon::parse($blog->post_date)->format('d') }}
                        </span>                        
                             {{ carbon\carbon::parse($blog->post_date)->format('M Y') }}

                        </div>
                    </div>
                    <div class="px-2">

                    <div class="img-desc">
                        <h2 class="custom-fs-18 text-dark custom-fw-700">{{ Str::limit($blog->post_title,35) }}</h2>
                    </div>
                </div>
                    </a>
                </div>
            </div>
            @endforeach
            <div class="col-md-5 offset-md-7">
                {{ $blogs->links() }}
            </div>
        </div>
        
    </div>
</section>
@endsection