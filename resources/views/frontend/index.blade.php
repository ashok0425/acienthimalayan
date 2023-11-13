@extends('frontend.layout.master')

@section('content')
    @include('frontend.includes.hero')

    @include('frontend.includes.filter')
    @include('frontend.includes.vehicle')

    @include('frontend.includes.featured')

    @include('frontend.includes.other')

    @include('frontend.includes.testimonial')

@endsection
