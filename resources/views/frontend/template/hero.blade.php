
@push('style')
{{-- owl carousel  --}}
<style>
.hero_carousel  .owl-nav button{
position: absolute;
cursor: pointer;
top: 80% !important;
}


.hero_carousel >.owl-nav>.owl-prev{
    color:  rgb(2, 9, 12)ortant;
left: 33px!important;
border: 2px solid  rgb(42, 135, 183)!important;
width: 40px;
height: 40px;
border-radius: 50%;
transition: all .3s ease-in-out;
color:  #fff!important;

}
.hero_carousel >.owl-nav>.owl-next{
right: 33px!important;
color:  #fff!important;
border: 2px solid  rgb(42, 135, 183)!important;
width: 40px;
height: 40px;
border-radius: 50%;
transition: all .3s ease-in-out;

}

.hero_carousel .owl-nav button:hover{
background-color:  rgb(42, 135, 183)!important;
color: #fff!important;
}

</style>
@endpush


@php
      // main hero image 
      $banners=DB::table('main_slider')->where('status',1)->orderBy('id','desc')->where('type',1)->get();
      $destinations=DB::table('destinations')->where('status',1)->get();
      $categories=DB::table('categories_destinations')->where('status',1)->where('destination_id',8)->orderBy('id','desc')->get();
@endphp
<div class="owl-carousel hero_carousel position-relative">
@foreach ($banners as $banner)
<div class="hero position-relative">
    <img src="{{ $banner->image }}" alt="banner">
    <h1 class="title hero-title custom-fs-28 text-white d-none d-md-block">
        {{ $banner->title }}
    </h1>
    
</div>

@endforeach
</div>


        <div class="search-box position-absolute">
            <form action="{{ route('search') }}" method="GET">

    <div class="container">

           
                <div class="row">
                    <div class="col-md-6 col-sm-12 mt-4 mt-md-0">
                        <h3 class='my-1 py-0 '>
                            Destination
                        </h3>
                        <select name="destination" id="destination" required>
                            <option value="">Choose Destination</option>
                            @foreach ($destinations as $destination)
                            <option value="{{ $destination->id }}" @if (Str::lower($destination->name)=='nepal')
                                selected
                            @endif>{{ $destination->name }}</option>
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-4 mt-md-0">
                        <h3 class='my-1 py-0 '>
                            Trip Type
                        </h3>
                        <select name="category" id="category" required>
                            <option value="trip type">Trip Type</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($loop->first)
selected
                            @endif>{{ $category->name }}</option>
                                
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-6 col-sm-12 ">
                        <h3 class='my-1 py-0 '>
                            Month
                        </h3>
                        <select name="month" id="month" >
                            <option value="select month">Select Month</option>
                            <option value="Jan" selected>January</option>
                            <option value="Feb">February</option>
                            <option value="Mar">March</option>
                            <option value="Apr">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="Sep">September</option>
                            <option value="Oct">October</option>
                            <option value="Nov">November</option>
                            <option value="Dec">December</option>


                                
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-12 d-flex align-items-center">
                        <button class="btn btn-primary ">
                            Search
                        </button>
                    </div>
                </div>
        </div>

    </form>

    </div>






@push('scripts')
<script>
        $(document).on('change','#destination',function() {
            let data= $(this).val()
            $.ajax({
                type: "GET",
                url: '{{ url('load-category') }}/'+data,
                dataType: "json",
                success: function(data) {
                    $('#category').empty();
                    $.each(data,function(index,item){
                        $('#category').append('<option value ="'+item.id+'">'+item.name+'</option>');
                    });
                },
              
            });
        });


        $('.hero_carousel').owlCarousel({
        center: true,
        items:1,
        loop:true,
        dots:false,
        nav:false,
        navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        responsive:{
            600:{
                items:1,
                nav:true,

            }
        }
    });

    </script>
@endpush



