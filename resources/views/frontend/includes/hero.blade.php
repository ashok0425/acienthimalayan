@php
    $banner=DB::table('main_slider')->where('status',1)->orderBy('id','desc')->first();
@endphp
    <section class="home_banner" style="background: url('{{asset($banner->image)}}') no-repeat!important;background-size:cover!important;">
       
            <div class="banner_text mt-2">
                <h2>{{$banner->title}}
                </h2>
                <p>
                   {!!strip_tags($banner->details)!!}
                </p>
            </div>

    </section>