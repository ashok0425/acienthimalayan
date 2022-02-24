@extends('mail.layout')
@section('content')
    
@php
        $page=DB::table('websites')->first();
    
@endphp

       <h3>Hello, {{ $name }}</h3>
      
       {!! $page->contact_text !!}
       <br>
<a href="{{ route('/') }}">

       <img src="{{ asset($page->contact_image) }}" alt="">

</a>
@endsection