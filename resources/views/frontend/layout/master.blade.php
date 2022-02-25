@php
	$setting=DB::table('websites')->first();

@endphp

@section('title')
{{ $setting->title }}
@endsection
@section('descr')
{{ $setting->descr }}
@endsection
@section('keyword')
{{ $setting->title }}
@endsection
@section('title')
{{ $setting->title }}
@endsection
@section('img')
{{ asset($setting->image) }}
@endsection
@section('url')
{{Request::url()}}
@endsection
@section('fev')
{{ asset($setting->fev) }}

@endsection

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        >
         <!-- Owl Stylesheets -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"  />
    <!--Jquery Ui Css-->
    <link rel="stylesheet" href="{{ asset('frontend/main.css') }}">
    <meta property="fb:app_id" content="160443599540603" />
    <meta property="og:url"                content="@yield('url')" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="@yield('title')" />
    <meta property="og:description"        content="@yield('descr')" />
    <meta property="og:image"              content="@yield('img')" />
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{csrf_token()}}">
    
            <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <meta name="author" content="{{$seo->meta_author}}"> --}}
        <meta name="keyword" content="@yield('keyword')">
        <meta name="description" content="@yield('descr')">
    
        <link rel="shortcut  icon" href="@yield('fev')" type="image/icon type">
    
            <title>@yield('title')</title>
            <style>
                .card-style-2 img{
  height: 250px!important;
}
            </style>
@stack('style')

</head>

<body>
    {{-- include header  --}}
  @include('frontend.layout.header')

    <main>
     {{-- main content dinamically  --}}
     @yield('content')   
    </main>
    

    {{-- include header  --}}
    @include('frontend.layout.footer')

    {{-- script tags  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js">
    </script>
       <link rel="stylesheet" href="{{ asset('frontend/app.js') }}">
         <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
<!--owl carousel-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>

<script>
    $('.destinations').owlCarousel({
        autoplay: true,
        autoplayTimeout: 6000,
        loop: true,
        dots: false,
        // navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin: 0,
        // nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
 

    $('.allpackages').owlCarousel({
        autoplay: true,
        autoplayTimeout: 6000,
        loop: true,
        dots: false,
        // navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin: 0,
        // nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });


    $('.special_packages').owlCarousel({
        autoplay: true,
        autoplayTimeout: 6000,
        loop: true,
        dots: false,
        // navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin: 0,
        // nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

$('.testimonials').owlCarousel({
    autoplay: true,
    autoplayTimeout: 3000,
    loop: true,
    dots: false,
    // navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    margin: 0,
    // nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});


$('.afflicated').owlCarousel({
    autoplay: true,
    autoplayTimeout: 3000,
    loop: true,
    dots: false,
    nav: false,

    // navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    margin: 0,
    // nav: true,
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
});
</script>
@stack('scripts')
</body>

</html>