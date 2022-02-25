@extends('frontend.layout.master')
@php
    define('PAGE','home')
@endphp
@section('content')
    
{{-- hero section  --}}
@include('frontend.template.hero')

{{-- adventure section  --}}
@include('frontend.template.adventure')

{{-- why choose section  --}}
@include('frontend.template.why')


{{-- Destination section  --}}
@include('frontend.template.destination')

{{-- Tour package section  --}}
@include('frontend.template.tour_package')

{{-- Special package section  --}}
@include('frontend.template.special_package')

{{-- User Testinomail section  --}}
@include('frontend.template.testinomial')

{{-- Blog section  --}}
@include('frontend.template.blog')

{{-- Afflicate section  --}}
@include('frontend.template.afflicate')
@endsection