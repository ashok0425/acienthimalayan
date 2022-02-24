@php
    $testimonials=DB::table('testimonials')->where('display_home',1)->orderBy('id','desc')->get();
@endphp
<style>
    .user_img{
        width:90px!important;
        height: 90px!important;
        margin: auto;
        border-radius: 50%;
        margin-bottom: 1rem;

    }

    .user_no_img{
        max-width:140px!important;
        max-height: 140px!important;
        margin: auto;
        margin-bottom: 1rem;

    }
</style>
<section class="feedback ">
    <div class="container ">
        <div class="heading mt-5">
            <h2>
                Tourist Feedback
            </h2>
        </div>
        <div class="owl-carousel testimonials">
            @foreach ($testimonials as $testimonial)
                
            <div class="mx-2">
                <div class="feedback-box text-center ">
                    <div>
                        @if ($testimonial->image!=null)
                        <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}" class="user_img img-fluid">
                        @else    
                        <img src="{{ asset('frontend/user.png') }}" alt="{{ $testimonial->name }}" class="user_no_img ">
                        
                        @endif
                    </div>
                    <p>{!! strip_tags(Str::limit($testimonial->content,100))!!}</p>
                    <div class="client-name custom-text-primary">
                    <i class="fas fa-quote-right text-dark"></i>
                <p class="my-0 py-0 custom-fs-18 font-weight-800">
                    
                    {{ $testimonial->name }}
                </p>
                
                                    </div>
                    
                </div>
            </div>
            @endforeach

            
        </div>
    </div>
</section>