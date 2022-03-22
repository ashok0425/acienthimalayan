@extends('frontend.layout.master')
@php
    define('PAGE','about')
@endphp
<style>
    .articel2 .row{
        border-radius: 15px;
        
    }
     .right-artile{
         margin-top: 20px!important;
     }
</style>
@section('content')
<x-page-header :title="$data->title" :route="route('cms.detail',['page'=>$page])"  :img="asset('about.jpg')"/>

    <section class="articel2 ">
        <div class="container">
            <div class="row my-5 shadow p-md-3 p-1 bg-white">
             
                <div class="col-lg-12">
                    <div class="right-artile ">

                        <h1 class="text-center">{{ $data->title }}</h1>
                       <div>
                        {!! $data->content !!}
                       </div>

                    </div>

                    <br>
                    

                    <a href="{{ route('cms.page',['page'=>$page])}}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </div>
           
        </div>
    </section>
 
 
@endsection