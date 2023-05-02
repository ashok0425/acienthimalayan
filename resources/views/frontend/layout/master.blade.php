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
     <!-- CSS  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
     integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link
     href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
     rel="stylesheet">
 <link rel="stylesheet" href="{{ asset('frontend/css/splide-core.min.css')}}">
 <link rel="stylesheet" href="{{ asset('frontend/css/splide.min.css')}}">
 <link rel="stylesheet" href="{{ asset('frontend/css/hamburgers.min.css')}}">
 <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}">
 <link rel="stylesheet" href="{{ asset('frontend/css/main.css')}}">
         {{-- toastr --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <!-- Font awesome 5 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />
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
        
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
            <title>@yield('title')</title>
            <style>
          
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

    <!-- JS  -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.js')}}"></script>
    <script src="{{ asset('frontend/js/splide.min.js')}}"></script>
    <script src="{{ asset('frontend/js/main.js')}}"></script>
{{-- toastr  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
	@if(Session::has('messege'))//toatser
	  var type="{{Session::get('alert-type','info')}}"
	  switch(type){
		  case 'info':
			   toastr.info("{{ Session::get('messege') }}");
			   break;
		  case 'success':
			  toastr.success("{{ Session::get('messege') }}");
			  break;
		  case 'warning':
			 toastr.warning("{{ Session::get('messege') }}");
			  break;
		  case 'error':
			  toastr.error("{{ Session::get('messege') }}");
			  break;
	  }
	@endif
	</script>

@stack('scripts')

</body>

</html>