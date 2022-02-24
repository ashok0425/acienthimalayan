<div>
    <section class="hero2">
        <img src="{{ asset('frontend/assets/hero4.png')}}" alt="">
        <div class="container">
            <div class="hero-text">
                <h1>{{ $title }}</h1>
                <p>
                    <a href="{{ route('/') }}">Home  </a> >
                    @if (!empty($before))
                        
                  
                     <a href="{{ $beforeroute }}">{{ $before }}</a> >
                        
                    @endif
                     <a href="{{ $route }}">{{ $title }}</a>
                </p>
            </div>
        </div>
    </section>
</div>