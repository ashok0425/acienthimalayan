@php
	$setting=DB::table('websites')->first();

@endphp
    <header>
        <div class="container">
            <div class="header">
                <a class="logo" href="{{route('/')}}">
                    <img src="{{asset($setting->image)}}" alt="" class="img-fluid" width="70x">
                </a>
                <nav class="navbar">
                    <ul class="navbar-nav">
                        <li class="navbar-item">
                            <a href="{{route('/')}}" class="navbar-link">Home</a>
                        </li>
                        <li class="navbar-item">
                            <a href="{{route('about')}}" class="navbar-link">About</a>
                        </li>
                        <li class="navbar-item">
                            <a href="{{route('packages')}}" class="navbar-link">Tour</a>
                        </li>
                      
                        <li class="navbar-item">
                            <a href="{{route('contact')}}" class="navbar-link">Contact</a>
                        </li>
                    
                    </ul>
                   
                </nav>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </header>
