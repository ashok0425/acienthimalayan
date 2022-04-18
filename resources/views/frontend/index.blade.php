@extends('frontend.layout.master')

@section('content')
    @include('frontend.includes.hero')

    @include('frontend.includes.filter')

    @include('frontend.includes.popular_destination')

    @include('frontend.includes.other')

    @include('frontend.includes.testimonial')

@endsection