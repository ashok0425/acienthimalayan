@extends('mail.layout')
@section('content')
@php
    $email=DB::table('emails')->where('id',$emailId)->first();
@endphp
{!! $email->detail !!}
<br>
<a href="{{ route('/') }}">
    @if (!empty($email->image))
 <img src="{{ asset($email->image)}}" alt="subscriber image">
        
    @endif
</a>
@endsection