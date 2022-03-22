@extends('frontend.layout.master')
<style>
.cont div{
    line-height: 2
    }

   .cont .fas{
       font-size: 30px!important;
  color:  rgb(42, 135, 183)!important; 
  margin-bottom: 6px;
       
   }
</style>
@php
    define('PAGE','contact')
@endphp
@section('content')
<x-page-header title="Contact" :route="route('contactus')"  :img="asset('Contact.jpg')"/>
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
                        <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" custom-text-primary custom-fs-25 custom-fw-700">
                                Head office (Nepal)
                            </div>
                        </div>
                        <div class="col-md-1 col-3 cont">
                            <div class="custom-fs-18"><i class="fas fa-home "></i> </div>
                            <div class="custom-fs-18"><i class="fas fa-phone-alt "></i> </div>
                            <div class="custom-fs-18"><i class="fas fa-envelope "></i> </div>
                            <div class="custom-fs-18"><i class="fas fa-envelope "></i> </div>

                            
                        </div>
                        <div class="col-md-3 col-3 d-none d-md-block cont">
                                 <div class="custom-fs-18">...............................</div>
                                 <div class="custom-fs-18">...............................</div>
                                 <div class="custom-fs-18">...............................</div>
                                 <div class="custom-fs-18">...............................</div>

                                 
                        </div>
                        <div class="col-md-5 col-9 cont">

                                <div class="custom-fs-18">{{ $detail->address }}</div>
                                <div class="custom-fs-18"><a href="tel:{{ $detail->phone }}" class="text-decoration-none text-dark">{{ $detail->phone }}</a></div>
                                <div class="custom-fs-18"><a href="mailto:{{ $detail->email}}" class="text-decoration-none text-dark">{{ $detail->email }}</a></div>
        
                                <div class="custom-fs-18"><a href="mailto:{{ $detail->email3}}" class="text-decoration-none text-dark">{{ $detail->email3 }}</a></div>
                            </div>
        
                        </div>




                        <div class="row">
                            <div class="col-md-12">
                                <div class=" custom-text-primary custom-fs-25 custom-fw-700">
                                    Branch Office(USA)
                                </div>
                            </div>
                            <div class="col-md-1 col-3 cont">
                                <div class="custom-fs-18"><i class="fas fa-home "></i> </div>
                                <div class="custom-fs-18"><i class="fas fa-phone-alt "></i> </div>
                                <div class="custom-fs-18"><i class="fas fa-phone-alt "></i> </div>
                                <div class="custom-fs-18"><i class="fas fa-envelope "></i> </div>
    
                                
                            </div>
                            <div class="col-md-3 col-3 d-none d-md-block cont">
                                     <div class="custom-fs-18">...............................</div>
                                     <div class="custom-fs-18">...............................</div>
                                     <div class="custom-fs-18">...............................</div>
                                     <div class="custom-fs-18">...............................</div>
    
                                     
                            </div>
                            <div class="col-md-5 col-9 cont">
    
                                    <div class="custom-fs-18">{{ $detail->address2 }}</div>
                                    <div class="custom-fs-18"><a href="tel:{{ $detail->phone }}" class="text-decoration-none text-dark">{{ $detail->phone }}</a></div>
                                    <div class="custom-fs-18"><a href="tel:{{ $detail->email}}" class="text-decoration-none text-dark">{{ $detail->phone2 }}</a></div>
            
                                    <div class="custom-fs-18"><a href="mailto:{{ $detail->email3}}" class="text-decoration-none text-dark">{{ $detail->email2 }}</a></div>
                                </div>
            
                            </div>


                            

                        <div class="row">
                            <div class="col-md-12">
                                <div class=" custom-text-primary custom-fs-25 custom-fw-700">
                                    Talk to an Expert
                                </div>
                            </div>
                            <div class="col-md-1 col-3 cont">
                                <div class="custom-fs-18"><i class="fas fa-home "></i> </div>
                                <div class="custom-fs-18"><i class="fas fa-phone-alt "></i> </div>    
                                
                            </div>
                            <div class="col-md-3 col-3 d-none d-md-block cont">
                                     <div class="custom-fs-18">...............................</div>
                                     <div class="custom-fs-18">...............................</div>
    
                                     
                            </div>
                            <div class="col-md-5 col-9 cont">
    
                                    <div class="custom-fs-18"><a href="tel:{{ $detail->phone }}" class="text-decoration-none text-dark">{{ $detail->expert_phone1 }}</a></div>
                                    <div class="custom-fs-18"><a href="tel:{{ $detail->email}}" class="text-decoration-none text-dark">{{ $detail->expert_phone2 }}</a></div>
            
                                </div>
            
                            </div>


                    </div>
{{-- 
                        <div class="col-md-12">
                            <div class=" custom-text-primary custom-fs-25 custom-fw-700">
                                Branch Office(USA)
                            </div>
                            <ul>
                                <li class="custom-fs-18"> {{ $detail->address2 }}</li>
                                <li class="custom-fs-18"><a href="tel:{{ $detail->phone2}}" class="text-decoration-none text-dark">{{ $detail->phone2 }}</a></li>
        
                                <li class="custom-fs-18"><a href="mailto:{{ $detail->email2}}" class="text-decoration-none text-dark">{{ $detail->email2 }}</a></li>
        
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class=" custom-text-primary custom-fs-25 custom-fw-700">
                                Talk to an Expert
                            </div>
                            <ul>
                                <li class="custom-fs-18"><a href="tel:{{ $detail->expert_phone1 }}" class="text-decoration-none text-dark">{{ $detail->expert_phone1 }}</a></li>
                                <li class="custom-fs-18"><a href="tel:{{ $detail->expert_phone2}}" class="text-decoration-none text-dark">{{ $detail->expert_phone2 }}</a></li>
        
        
                            </ul>
                        </div> --}}
                    </div>

                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <section class="info my-5">
        <div class="container">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.0405213358467!2d85.31063831423583!3d27.716035131718705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fd2e54a635%3A0xfa1e397a6cabee52!2sNepal%20Vision%20Treks%20%26%20Expedition%20Pvt%20Ltd!5e0!3m2!1sen!2snp!4v1644722965719!5m2!1sen!2snp" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
           
        </div>
    </section>
</main>


@include('frontend.template.subscribe')
@endsection