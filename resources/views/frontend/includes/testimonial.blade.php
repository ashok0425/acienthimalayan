@php
    $testimonials=DB::table('testimonials')->where('status',1)->orderBy('id','desc')->get();
@endphp
    <section class="py-5 custom-bg-light">
        <div class="container">
            <h2 class="custom-fs-30 custom-fw-600 text-center text-uppercase mb-5">
                What People Thinks About Us
            </h2>

            <div class="splide testimonial ">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($testimonials as $testimonial)
                            
                        <li class="splide__slide">
                            <div class="card_style_3">
                                <div class="card_top">
                                    <div class="img_wrap">
                                        @if ($testimonial->image!=null&&file_exists($testimonial->image))
                                        <img src="{{asset($testimonial->image)}}" alt=""
                                        class="img-fluid">  
                                        @else 
                                        <img src="{{asset('th.webp')}}" alt=""
                                        class="img-fluid">
                                        @endif
                                      
                                    </div>
                                </div>
                                <div class="card_bot bg-white">
                                    <div class="text-center my-3">
                                        <h5 class="custom-fs-18 mb-3 text-danger">{{$testimonial->name}}</h5>
                                        <p class="mb-1"> Staued {{Carbon\Carbon::parse($testimonial->date)->format('d M Y')}} </p>
                                        <div class="rating">
                                            @for ($i =1 ; $i <=$testimonial->rating ; $i++)
                                <i class="fa-solid fa-star checked"></i>
                                    
                                @endfor

                                @for ($i =1 ; $i <=5-$testimonial->rating ; $i++)
                                    <i class="fa-solid fa-star "></i>
                                    
                                @endfor
                                        </div>

                                    </div>
                                    <p>
                                        {!! Str::limit($testimonial->content,300) !!}

                                    </p>
                                </div>

                            </div>
                        </li>
                        @endforeach
                       
                    </ul>
                </div>
            </div>
        </div>
    </section>