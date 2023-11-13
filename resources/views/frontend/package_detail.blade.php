@extends('frontend.layout.master')

@section('content')
    <section class="detail__banner">
        @if ($package->banner != null && file_exists($package->banner))
            <img src="{{ asset($package->banner) }}" alt="cover image" class="img-fluid banner__image">
        @else
            <img src="{{ asset('frontend/img/ashok-acharya-mYjORLebCyM-unsplash.jpg') }}" alt="cver image"
                class="img-fluid banner__image">
        @endif

        <div class="container">
            <div class="text">
                <h1>{{ $package->name }}</h1>

                {{-- <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="#" class="btn btn_transparent"  data-aos-delay="200">Book This Your</a>
                <a href="#" class="btn btn_transparent"  data-aos-delay="300">View Photos</a>
                <a href="#" class="btn btn_transparent"  data-aos-delay="400">Video Preview</a>
            </div> --}}
            </div>
        </div>
    </section>

    <section class="detail py-5">
        <div class="container">

            <div class="row">

                <div class="col-md-12 ">
                    <div class="row">
                        <div class="col-md-8 order-1 order-md-0">
                            <h2 class="custom-fs-24 my-5 text-uppercase custom-fw-600">Summery</h2>

                            @empty(!$package->overview)
                                <div class="package__summery mb-4">
                                    <div class="header">
                                         Overview

                                    </div>
                                    <div class="text">
                                        {!! $package->overview !!}
                                    </div>
                                </div>
                            @endempty


                            @empty(!$package->include_exclude)
                                <div class="package__summery mb-4">
                                    <div class="header">
                                        Included
                                    </div>
                                    <div class="text">
                                        {!! $package->include_exclude !!}
                                    </div>

                                </div>
                            @endempty

                            @empty(!$package->trip_excludes)
                                <div class="package__summery mb-4">
                                    <div class="header">
                                        Not Included
                                    </div>
                                    <div class="text">
                                        {!! $package->trip_excludes !!}
                                    </div>
                                </div>
                            @endempty

                            @empty(!$package->outline_itinerary)
                                <div class="package__summery">
                                    <div class="header">
                                        OUTLINE ITINERARY


                                    </div>
                                    <div class="text">
                                        {!! $package->outline_itinerary !!}
                                    </div>
                                </div>
                            @endempty



                        </div>

                        @if ($package->type=='package')
                        <div class="col-md-4 order-0 order-md-1">
                            <div class="book__now">
                                <div class="filter__wrap__head custom-bg-primary text-center text-white py-4 custom-fs-30">
                                    @if (!empty($package->discounted_price))
                                        <p class="mb-0 lh-1"><small><s>Rs {{ $package->price }}</s></small></p>
                                        <p class="mb-0 lh-1">Rs {{ $package->discounted_price }}</p>
                                    @else
                                        <p class="mb-0 lh-1">Rs {{ $package->price }}</p>
                                    @endif
                                    <p class="mb-0 lh-1">(per person)</p>
                                </div>
                                <form action="{{route('contact.store')}}" method="POST">
                                    @csrf
                                    <div class="filters">
                                        <div class="wrap">
                                            <label for="">Full Name</label>
                                            <p><input type="text" name="name" id="" class="form-control" required></p>
                                        </div>
                                        <div class="wrap">
                                            <label for="">Email Address</label>
                                            <p><input type="text" name="email" id="" class="form-control" required></p>
                                        </div>
                                        <div class="wrap">
                                            <label for="">Phone Number</label>
                                            <p><input type="number" name="phone" id="" class="form-control" required></p>
                                        </div>

                                        <div class="wrap">
                                            <label for="">Depature Date</label>
                                            <p><input type="date" name="departure_date" id="" class="form-control" required></p>
                                        </div>
                                        <div class="wrap">
                                            <label for="">Number of Person</label>
                                            <p><input type="number" name="no_of_person" id="" class="form-control" required></p>
                                        </div>
                                        <div class="d-flex justify-content-center pb-4">
                                            <button class="btn btn_primary ">Book Now</button>
                                        </div>
                                    </div>
                                </form>

                            </div>


                            <div class="">
                                <h2 class="custom-fs-24 my-5 text-uppercase custom-fw-600">Other Tours</h2>

                                @foreach ($packages as $packaged)
                                    <div class="card card_style_2 h-auto mb-3" bis_skin_checked="1">
                                        <a href="{{ route('package.detail', ['id' => $package->id]) }}">

                                            <div class="card-img" bis_skin_checked="1">
                                                @if ($packaged->thumbnail != null)
                                                    <img src="{{ asset($packaged->thumbnail) }}" class="card-img-top">
                                                @else
                                                    <img src="{{ asset('frontend/img/mustang.jpg') }}" class="card-img-top">
                                                @endif

                                                <a href="{{ route('package.detail', ['id' => $packaged->id]) }}"
                                                    class="btn btn_secondary">View
                                                    Detail</a>
                                                <h5 class="card-title">{{ $packaged->name }}</h5>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        @else
                        <div class="col-md-4 order-0 order-md-1">
                            <div class="book__now">
                                <div class="filter__wrap__head custom-bg-primary text-center text-white py-4 custom-fs-30">
                                    @if (!empty($package->discounted_price))
                                        <p class="mb-0 lh-1"><small><s>Rs {{ $package->price }}</s></small></p>
                                        <p class="mb-0 lh-1">Rs {{ $package->discounted_price }}</p>
                                    @else
                                        <p class="mb-0 lh-1">Rs {{ $package->price }}</p>
                                    @endif
                                    <p class="mb-0 lh-1">(per person)</p>
                                </div>
                                <form action="{{route('contact.store')}}" method="POST">
                                    @csrf
                                    <div class="filters">
                                        <div class="wrap">
                                            <label for="">Full Name</label>
                                            <p><input type="text" name="name" id="" class="form-control" required></p>
                                        </div>
                                        <div class="wrap">
                                            <label for="">Email Address</label>
                                            <p><input type="text" name="email" id="" class="form-control" required></p>
                                        </div>
                                        <div class="wrap">
                                            <label for="">Phone Number</label>
                                            <p><input type="number" name="phone" id="" class="form-control" required></p>
                                        </div>

                                        <div class="wrap">
                                            <label for="">Depature Date</label>
                                            <p><input type="date" name="departure_date" id="" class="form-control" required></p>
                                        </div>
                                        <div class="wrap">
                                            <label for="">Number of Person</label>
                                            <p><input type="number" name="no_of_person" id="" class="form-control" required></p>
                                        </div>
                                        <div class="d-flex justify-content-center pb-4">
                                            <button class="btn btn_primary ">Book Now</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                        @endif




                    </div>

                </div>


            </div>

        </div>
        <br>
        @include('frontend.includes.testimonial')

    </section>
@endsection
