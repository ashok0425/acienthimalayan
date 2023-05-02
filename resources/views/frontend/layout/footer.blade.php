@php
    $contact=DB::table('websites')->first();
@endphp
<style>
    .fa-2x{
        font-size: 23px!important;
    }
</style>
    <footer class="py-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-3 offset-md-1">
                    <img src="{{asset($contact->image)}}" alt="Logo" class="img-fluid w-75 mt-0 mt-md-5">
                </div>
                <div class="col-md-2">
                    <div class="footer_header">
                        Quick Links
                    </div>
                    <div class="footer_nav">
                        <a href="{{route('packages')}}">Tours</a>
                        <a href="{{route('about')}}">About</a>
                        <a href="{{route('contact')}}">Contact</a>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="footer_header">
                        Information
                    </div>
                    <div class="footer_nav">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Term & Conditions</a>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer_header">
                        Contact us
                    </div>
                    <div class="footer_nav">
                        <div class="d-flex ">
                            <span><i class="fas fa-home"> </i></span>  <a href=""> &nbsp; {{$contact->address}}</a></div>

                            <div class="d-flex ">
                                <span><i class="fas fa-envelope"> </i></span>  <a href="mailto:{{$contact->email}}"> &nbsp; {{$contact->email}}</a></div>


                                <div class="d-flex ">
                                    <span><i class="fas fa-phone-alt"> </i></span>  <a href="tel:{{$contact->phone}}"> &nbsp; {{$contact->phone}}</a></div>
                       <div class="d-flex mt-2">
                        <a href="{{$contact->facebook}}" class="mx-3"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="{{$contact->twitter}}" class="mx-3"><i class="fab fa-twitter fa-2x"></i></a>
                        <a href="{{$contact->instagram}}" class="mx-3"><i class="fab fa-instagram fa-2x"></i></a>

                       </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </footer>