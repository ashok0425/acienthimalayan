@php
    $why_choose_us=DB::table('frontend_section_control')->where('id',27)->first();
    
@endphp
        <section class="why-choose-us mt-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <img src="{{ asset('frontend/assets/whychooseus.png')}}" alt="Destination PICTURE" class="img-fluid">
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="right-artile">
                            <h2>
                                Why Choose us ?
                            </h2>
                            <p>
                                
                                {{$why_choose_us->details}}


                            </p>
                            <div class="stats d-flex justify-content-between">
                                <div class="stat">
                                    <h3>300</h3>
                                    <p>Sucessfull Tour</p>
                                </div>
                                <div class="stat">
                                    <h3>30,000</h3>
                                    <p>Happy Tourists</p>
                                </div>
                                <div class="stat">
                                    <h3>500</h3>
                                    <p>Places Explored</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>