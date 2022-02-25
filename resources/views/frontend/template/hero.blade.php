@php
      // main hero image 
      $banner=DB::table('main_slider')->where('status',1)->orderBy('id','desc')->where('type',1)->first();
      $destinations=DB::table('destinations')->where('status',1)->orderBy('id','desc')->get();
      $categories=DB::table('categories_destinations')->where('status',1)->orderBy('id','desc')->get();
    


@endphp
<style>
    .hero{
        background: url({{ $banner->image }});
    }
</style>
<section class="hero">
    <div class="container">
        <div class="search-box">
            <h1 class="title custom-fs-28 mb-3 mb-md-5">
                {{ $banner->title }}
            </h1>
            <form action="{{ route('search') }}" method="GET">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <h3>
                            Destination
                        </h3>
                        <select name="destination" id="destination" required>
                            <option value="choose destination">Choose Destination</option>
                            @foreach ($destinations as $destination)
                            <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h3>
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
                <div class="row mt-4">
                    <div class="col-md-6 col-sm-12 ">
                        <h3>
                            Month
                        </h3>
                        <select name="month" id="month" required>
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
            </form>
        </div>
    </div>

    </div>
</section>

@push('scripts')
<script>
        $('#destination').change(function() {
            // var myCategory = $(this).val();
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


    </script>
@endpush