@extends('frontend.layout.master')
@php
    define('PAGE','contact')
@endphp
@section('content')
<x-page-header title="Contact" :route="route('contactus')"  />
<main>
  
    <section class="contact-form">
        <div class="container-fluid">
            <div class="form-container row">
                <div class="col-lg-6">
                    <div class="contact-container">


                        <div class="socials social">
                            <div class="icons">
                              <a href="{{ $detail->facebook}}" target="_blank">
                                <i class="fab fa-facebook"></i>
                              </a>
                            </div>
                            <div class="icons">
                                <a href="{{ $detail->instagram}}" target="_blank" >
                                    <i class="fab fa-instagram"></i>
                                </a>

                            </div>
                            <div class="icons">
                                <a href="{{ $detail->twitter}}" target="_blank" >

                                <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                            <p class="follow">Follow Us</p>
                        </div>
                        <form action="{{ route('contactus.store') }}" method="POST">
                            @csrf
                            <h1>Let's have a Talk</h1>
                            <div class="row">
                                <div class="col-12">
                                    <label for="name">Your Name*</label>
                                    <input type="text" name="name" id="name" class="input" required
                                        placeholder="Your name" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="email">Email*</label>
                                    <input type="email" name="email" id="name" class="input" required
                                        placeholder="Enter Your Email" />
                                </div>
                            </div>
                         
                            <div class="row">
                                <div class="col-12">
                                    <label for="email">Message*</label>
                                    <textarea placeholder="Your Message" name="comment"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary w-100">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                           

                        </form>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.0405213358467!2d85.31063831423583!3d27.716035131718705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fd2e54a635%3A0xfa1e397a6cabee52!2sNepal%20Vision%20Treks%20%26%20Expedition%20Pvt%20Ltd!5e0!3m2!1sen!2snp!4v1644722965719!5m2!1sen!2snp" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <section class="info my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class=" custom-text-primary custom-fs-25 custom-fw-700">
                        Head office (Nepal)
                    </div>
                    <ul>
                        <li class="custom-fs-18">{{ $detail->address }}</li>
                        <li class="custom-fs-18">{{ $detail->phone }}</li>
                        <li class="custom-fs-18">{{ $detail->email }}</li>
                        <li class="custom-fs-18">{{ $detail->email3 }}</li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class=" custom-text-primary custom-fs-25 custom-fw-700">
                        Branch Office(USA)
                    </div>
                    <ul>
                        <li class="custom-fs-18"> {{ $detail->address2 }}</li>
                       
                        <li class="custom-fs-18">{{ $detail->phone2 }}</li>
                        <li class="custom-fs-18">{{ $detail->email2 }}</li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class=" custom-text-primary custom-fs-25 custom-fw-700">
                        Talk to an Expert
                    </div>
                    <ul>
                        <li class="custom-fs-18">{{ $detail->expert_phone1 }}</li>
                        <li class="custom-fs-18">{{ $detail->expert_phone2 }}</li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection