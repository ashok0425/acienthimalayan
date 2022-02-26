<footer>
    {{-- https://www.figma.com/file/AooxbPw11smLpkqBr6iaYi/Nepal-Vision-T%26E?node-id=0%3A1 --}}
    <div class="container">
        <div class="main-footer">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                   
                    <img src="{{ asset('frontend/assets/footer-img.png')}}" alt="logo">
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-title custom-text-primary">
                        About Us
                    </div>
                    <ul>
                        @php
                            $children=DB::table('cms')->where('parent_id',1)->where('status',1)->get();
                        @endphp
                      @foreach ($children as $child)
                          <li><a href="{{ route('cms.detail',['page'=>1,'id'=>$child->url]) }}" class="text-decoration-none text-light">{{ $child->title }}</a></li>
                      @endforeach
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-title custom-text-primary">Things to know</div>
                    <ul>
                        <li>Booking Terms & Condition</li>
                        <li>Privacy & Disclaimer</li>
                        <li>Volunteering Opportunities</li>
                        <li>Travel Insurances</li>
                        <li>Special Interest Tours</li>
                        <li>How to Travel Free</li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-title custom-text-primary">Pay Safe With US</div>
                    <div class="payment-methods d-flex">
                        <i class="fab fa-paypal"></i> <i class="fab fa-cc-visa"></i> <i
                            class="fab fa-cc-mastercard"></i>
                    </div>
                    <p>We use secured 256-bit
                        encription while making
                        Payment.</p>
                </div>
            </div>
         <div class="row mt-1 mt-md-5">
             <div class="col-md-3 offset-md-2 text-center">
                <div class="footer-title custom-text-primary">
                    Head office (Nepal)
                </div>
                    <ul>
                        <li>
                            Bhagwan Bahal, Thamel

                        </li>
                        <li>
                        Phone: <a href="tel:977-1-4524762" class="text-white text-decoration-none">977-1-4524762</a>

                        </li>
                        <li>
                    Fax:  977-1-4523296

                        </li>
                        <li>
                            Email:
                        </li>
                        <li>
                            <a href="mailto:info@nepalvisiontreks.com" class="text-white text-decoration-none">
                                info@nepalvisiontreks.com
                                </a>
                            

                        </li>
                        <li>
                            <a href="mailto:sales@nepalvisiontreks.com
                            " class="text-white text-decoration-none">
                                sales@nepalvisiontreks.com

                                </a>

                        </li>
                    </ul>

             </div>

             <div class="col-md-3  text-center">
                <div class="footer-title custom-text-primary">
                    USA Contact Office
                </div>
                    <ul>
                        <li>
                            Washington, DC, USA

                        </li>
                        <li>
                            Phone:<a href="tel:+1 202-368-6657" class="text-white text-decoration-none"> +1 202-368-6657</a>


                        </li>
                        <li>
                            Parashu Nepal
                           

                        </li>
                        <li>
                            Marketing Director
                        </li>
                        <li>
                            Email:


                        </li>
                        <li>
                            <a href="mailto:parashu@nepalvisiontreaks.com" class="text-white text-decoration-none">
                            parashu@nepalvisiontreaks.com
                            </a>

                        </li>
                    </ul>

             </div>





             <div class="col-md-3  text-center">
                <div class="footer-title custom-text-primary">
                    USA Branch Office
                </div>
                    <ul>
                        <li>
                            Phone: <a href="tel:+1-917-740-2934" class="text-white text-decoration-none"> +1-917-740-2934</a>

                        </li>
                        <li>
                            Anjan Shrestha


                        </li>
                        <li>
                            Marketing Director

                        </li>
                        <li>
                            Email:
                        </li>
                        <li>
                            <a href="mailto:anjan@nepalvisiontreaks.com" class="text-white text-decoration-none">
                            anjan@nepalvisiontreaks.com
                            </a>

                        </li>
                      
                    </ul>

                </div>







         </div>
        </div>
@php
    $website=DB::table('websites')->first();
@endphp
        <div class="bottom-footer d-flex justify-content-between">
            <p>Copyright  © {{ date('Y') }} NepalVisionTreks. All right Reserved</p>
            <p>Follow Us : <a href="{{ $website->facebook }}" class="text-white text-decoration-none">FB</a> | <a href="{{ $website->instagram }}" class="text-white text-decoration-none"> Insta </a> | <a href="{{ $website->youtube }}" class="text-white text-decoration-none"> Trip Visor </a></p>
        </div>
    </div>
</footer>