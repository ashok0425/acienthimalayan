@extends('frontend.layout.master')
@php
    define('PAGE','event')
@endphp
@section('content')
<x-page-header :title="$event->title" :route="route('event.detail',['id'=>$event->id])"  :beforeroute="route('events')" before="Event"/>
<section class="event-view">
    <div class="container">

        <div class="event-cards">
            <div class="row">
                <div class="col-12">
                    <div class="event-card-1">
                        <div class="card-body text-center">
                            <h1 class="card-title text-dark">{{ $event->title }}</h1>
                        </div>
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

                        </div>
                        <div class="mt-3">
                            {!! $event->content !!}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
</section>
<div class="bot-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <a href="{{ route('events') }}"><i class="fas fa-long-arrow-alt-left"></i> Back to Events</a>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-5">
                        <a href="{{ route('event.detail',['id'=>$prev]) }}"><i class="fas fa-long-arrow-alt-left"></i> Previous Events</a>
                    </div>
                    <div class="col-2">|</div>
                    <div class="col-5">
                        <a href="{{ route('event.detail',['id'=>$next]) }}"> Next Events <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection