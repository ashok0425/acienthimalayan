@extends('frontend.layout.master')
@php
    define('PAGE','event')
@endphp
@section('content')
<x-page-header title="Event" :route="route('events')"  />

<section class="events">
    <div class="container">
    
        <div class="event-cards">
            <div class="row">
                @foreach ($events as $event)
                <div class="col-md-6">
                    <div class="event-card-1">
                        <a href="{{ route('event.detail',['id'=>$event->id]) }}" class="text-decoration-none custom-text-primary">
                        <div class="card">
                            <div class="img-wrapper">
                                @if ($event->image!==null)
                                <img src="{{ asset($event->image)}}" class="card-img-top" alt="{{ $event->title }}">
                                    
                                @else    
                                <img src="{{ asset('frontend/assets/event1.png')}}" class="card-img-top" alt="{{ $event->title }}">

                                @endif
                                <div class="date">
                                    <div class="today-date">
                                        <h3>{{ carbon\carbon::parse($event->date)->format('d') }}</h3>
                                        <p>{{ carbon\carbon::parse($event->date)->format('M') }}</p>
                                        <p>{{ carbon\carbon::parse($event->date)->format('Y') }}</p>
                                    </div>
                                    <h3>-</h3>
                                    <div class="expire-date">
                                        <h3>{{ carbon\carbon::parse($event->end_date)->format('d') }}</h3>
                                        <p>{{ carbon\carbon::parse($event->end_date)->format('M') }}</p>
                                        <p>{{ carbon\carbon::parse($event->end_date)->format('Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title text-dark">{{ $event->title }}</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                </div> 
                @endforeach
               
            </div>
        </div>
</section>
@endsection