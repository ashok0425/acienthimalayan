@extends('frontend.layout.master') 
@php
    define('PAGE','destination')
@endphp
@section('styles')
    <style>
        .thanks-div{
            background: white;
        }
    </style>
@endsection

@section('content')

<section class="thanks-div my-5">

    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3 text-center custom-text-primary">               
                    <h2>{{ Session::get('message') }}</h2>
                    <img class="w-25" src="{{ asset('frontend/thanks.png') }}" />
                    <span class="d-block">We will get back to you as soon as possibe</span>
                    <p class="mb-0">If you have any queries feel free to contact us at </p>
                    <p class="mail">sales@nepalvisiontreks.com / 977-1-4424762 / +977-9851189771</p>
            </div>

        </div>

    </div>

</section>

@endsection
@section('styles')
<style>
    .thanks-div img{
        width: 200px;
    }
</style>
@endsection