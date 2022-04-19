{{-- @php
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
{{ asset($setting->fev) }} --}}

{{-- @endsection --}}
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <link rel="icon" href="@yield('fev')" type="image/icon type">

        <title>@yield('title')</title>
 
{{-- bootstrap --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- Google Font:  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;500;600;800;900&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  {{-- toastr --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
{{-- datatables  --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css"/>
<link href='//cdn.datatables.net/responsive/2.2.9/css/dataTables.responsive.css'  rel="stylesheet" />
{{-- sommernotes  --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @stack('style')
  <style>
      label{
          font-size: 14px;
          font-weight: 400!important;
      }
      h1{
        font-size: 20px!important;

      }
      h3{
        font-size: 18px!important;
        padding: 1rem;
        font-weight: bold;
      }

      .nav-link{
        font-size: 16px!important;

      }
      .nav-treeview  .nav-link{
        font-size: 14px!important;

      }
      input::placeholder{
          font-size: 11px!important;
      }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">




 {{-- header  --}}
 @include('admin.layouts.header')

  {{-- sidebar  --}}
  @include('admin.layouts.leftpanel')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @include('admin.layouts.breadcrum')

  @yield('content')

  </div>
  <!-- /.content-wrapper -->





  <footer class="main-footer">
    {{-- <strong>Copyright &copy; {{date('Y') }} <a href="https://baratodeal.com"> {{ $setting->copy_right }}</a>.</strong> --}}
    All rights reserved.

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
{{-- boostrap --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>


{{-- toastr  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

{{-- datatables --}}
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
{{-- sommernotes --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  {{-- toastr  --}}
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
{{-- datatables iniziing --}}
<script>
    if(window.innerWidth<=700){
        var table = $('#example2').DataTable({
                "scrollX": true,

				select: true,
				dom: 'Blfrtip',
				lengthMenu: [
					[10, 25, 50, -1],
					['10 row', '25 row', '50 row', 'All Rows']
				],
				dom: 'Bfrtip',
				buttons: [
                    {
                        extend: 'print',
                        exportOptions: {
                            stripHtml:false,
                     columns: ':visible:not(:last-child,:nth-last-child(2))'
                }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                     stripHtml:false,
                     columns: ':visible:not(:last-child,:nth-last-child(2))'
                }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                     stripHtml:false,
                     columns: ':visible:not(:last-child,:nth-last-child(2))'
                }
                    },
                  
                    {
                        extend: 'colvis',
                 
                    },
                    'pageLength',
                ]
			});
     
    }else{

			var table = $('#example2').DataTable({
                // "scrollX": true,
				select: true,
				dom: 'Blfrtip',
				lengthMenu: [
					[10, 25, 50, -1],
					['10 row', '25 row', '50 row', 'All Rows']
				],
				dom: 'Bfrtip',
        buttons: [
                    {
                        extend: 'print',
                        exportOptions: {
                            stripHtml:false,
                     columns: ':visible:not(:last-child,:nth-last-child(2))'
                }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                     stripHtml:false,
                     columns: ':visible:not(:last-child,:nth-last-child(2))'
                }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                     stripHtml:false,
                     columns: ':visible:not(:last-child,:nth-last-child(2))'
                }
                    },
                    
                    {
                        extend: 'colvis',
                 
                    },
                    'pageLength',
                    
                ]
			});
      
    }
	</script>





{{-- summernote --}}
<script>
    $(document).ready(function() {
	$('#summernote').summernote();
	$('#summernote1').summernote();
	$('#summernote2').summernote();
	$('#summernote3').summernote();
	$('#summernote4').summernote();
	$('#summernote5').summernote();
	$('#summernote6').summernote();
	$('#summernote7').summernote();
	$('#summernote8').summernote();
	$('#summernote10').summernote();
	$('#summernote11').summernote();
	$('#summernote12').summernote();
	$('#summernote13').summernote();



  });
</script>

<script>
  $('#delete_row').click(function(e){
    e.preventDefault()
  url=$(this).attr('href')
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this  file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      window.location.href = url;
      
   
    } else {
      swal("Your Data is safe!");
    }
  });
  })
  </script>


@stack('scripts')

</body>
</html>
