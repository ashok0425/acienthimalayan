@extends('frontend.layout.master')
@php
    define('PAGE','blog')
@endphp
@section('content')
<style>
 .blog-post img{
height: 220px!important;
width: 100%!important;

    }
</style>
<x-page-header title="Blog" :route="route('blog')"    :img="asset('blog.jpg')"/>

            <div class="container mt-4">
                <div class="event-header">
                    <form action="abc" method="post" id="Filterblog">
                    <div class="row">
                        <div class="col-md-4 col-sm-3 d-flex" >
                            <h3 class="align-self-center">Blogs</h3>
                        </div>
                        <div class="col-md-8 col-sm-9">
                            <div class="row">
                             
                                <div class="col-6 col-md-5 my-1">
                                    <input type="text"  class="form-control"  id="from" placeholder="Date From" autocomplete="off" required>
                                </div>
                                <div class="col-md-5 col-6 my-1">
                                    <input type="text"  class="form-control" required id="to" placeholder="Date To" autocomplete="off" >

                                </div>
                                <div class="col-md-2 col-12 my-1">
                                    <input class="btn btn-primary btn-block d-block w-100"  type="submit" value="Search">
                                      </div>
                            </div>
                        </div>
                    </div>
                </form>

                </div>
            </div>
<section class="blog-post ">
    <div class="container">
        <div class="row" id="blog_data">
            @foreach ($blogs as $blog)
                
            <div class="col-md-4 col-sm-12  my-2">
                <div class="post-card-1 card">
                    <a href="{{ route('blog.detail',['id'=>$blog->ID]) }}">
                    <div class="img-container">
                        @if ($blog->guid!=null && file_exists($blog->guid))
                        <img src="{{ asset($blog->guid)}}"  class="img-fluid w-100">
                       
                        @else 
                        <img src="{{ asset('frontend/assets/recent-post.png')}}" alt="IMG" class="img-fluid"  >
                        @endif
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



@push('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

    $("#from").datepicker({changeYear:true});
    $("#to").datepicker({changeYear:true});


</script>
@endpush 
@push('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
@endpush

@push('scripts')
    
<script>
    async function FilterBlog(from,to){
        let token=$("meta[name='csrf-token']").attr('content')
       let data={
           from:from,
           to:to,
           _token:token,

       }

        let url=`{{ route('filterBlog') }}`
$.ajax({
    url:url,
    type:'POST',
    data:data,
    success:function(res){
        $('#blog_data').html('');

        $('#blog_data').html(res);
    }
})
    }

    $('#Filterblog').submit(function(e){
        e.preventDefault()
        let from=$('#from').val()
        let to=$('#to').val()
FilterBlog(from,to)
    })
</script>
@endpush