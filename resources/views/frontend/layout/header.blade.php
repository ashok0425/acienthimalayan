@php
    $destinations=DB::table('destinations')->where('status',1)->get();
    
    $website=DB::table('websites')->first();
@endphp
<header id='header'>
    <div class="container">
        <div class="top-header d-md-flex d-none justify-content-between">
           <div class="d-md-flex ">
            <div class="contact">
                <p>{{ $website->phone }}</p>
            </div>
            <div class="company-email">
                <p>{{ $website->email }}</p>
            </div> 
            <div class="location">
                <p>{{ $website->address }}</p>
            </div>
           </div>
               <div class="d-flex justify-content-center social">
                   <p><a href="{{ $website->facebook  }}"><i class="fab fa-facebook text-dark"></i></a></p>
                   <p><a href="{{ $website->instagram }}"><i class="fab fa-instagram text-dark"></i></a></p>
                   <p><a href="{{ $website->twitter }}"><i class="fab fa-twitter text-dark"></i></a></p>

               </div>
        </div>
    </div>
    <div class="top_header"></div>
    <div class="container">

        <div class="bottom-header d-flex justify-content-between">
            <div class="logo">
     <a href="{{ route('/') }}">
        <img src="{{ asset($website->image)}}" alt="Logo" class="img-fluid w-75">
     </a>

            </div>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-h3="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link @if (PAGE=='home')
                                active
                                @endif" aria-current="page" href="{{ route('/') }}" >Home</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle @if (PAGE=='destination')
                            active
                            @endif" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Destination
                        </a>

                   
                                <ul class="dropdown-menu " aria-h3ledby="navbarDropdownMenuLink" >
                                    @foreach ($destinations as $destination)
                                        
                                    <li><a class="dropdown-item" href="{{ route('destination',['id'=>$destination->id,'url'=>$destination->url]) }}">{{ $destination->name}}</a></li>
                                    @endforeach
                                   
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if (PAGE=='event')
                                active
                                @endif" href="{{ route('events') }}">Activity</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if (PAGE=='about')
                                active
                                @endif" href="{{ route('cms.page',['page'=>'about-us']) }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if (PAGE=='blog')
                                active
                                @endif" href="{{ route('blog') }}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if (PAGE=='contact')
                                active
                                @endif" href="{{ route('contactus') }}">Contact</a>
                            </li>
                        </ul>
                        <a class="btn btn-primary btn-sm" href="{{ route('booknow') }}">
                            Quick Trip
                        </a>
                    </div>
                </div>
            </nav>

        </div>
    </div>
</header>
@push('scripts')
    
<script>
    if ($(window).width()>900) {
        $('.dropdown-menu').addClass('main')
    }else{
        $('.dropdown-menu').removeClass('main')

    }
</script>
@endpush