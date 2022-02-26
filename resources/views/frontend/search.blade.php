@extends('frontend.layout.master')
@php
    define('PAGE','destination')
@endphp
@section('content')

<x-page-header title="Trip available for {{ $data->name }}" route="#"  />


<section class="search-desc">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="filter">
                    <h3>Filter Trips</h3>
                    <div class="type">
                        <p>
                            <button class="btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse1" aria-expanded="false"
                                aria-controls="collapseExample">
                                Trip Type <i class="fas fa-sort-down"></i>
                            </button>
                        </p>
                        <div class="collapse show" id="collapse1">
                            <div class="card card-body">
                                @foreach ($categories as $category)
                                <div class="row">
                                    <div class="col-12">
                                        <input type="radio" name="category" id="triptype{{ $category->id }}" class="categories" value="{{ $category->id }}">
                                        <label for="triptype{{ $category->id }}">{{ Str::limit($category->name,20) }}</label>
                                    </div>
                                </div>
                                @endforeach
                                 
                                  
                            </div>
                        </div>
                    </div>
                    <div class="type">
                        <p>
                            <button class="btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse2" aria-expanded="false"
                                aria-controls="collapseExample">
                                Trip Length <i class="fas fa-sort-down"></i>
                            </button>
                        </p>
                        <div class="collapse show" id="collapse2">
                            <div class="card card-body">
                                @foreach ($durations as $duration)
                                <div class="row">
                                    <div class="col-12">
                                        <input type="radio" name="durations" id="triptype{{ $duration->duration }}" class="durations" value="{{ $duration->duration }}">
                                        <label for="triptype{{ $duration->duration }}">{{ Str::limit($duration->duration,20) }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="type">
                        <p>
                            <button class="btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse3" aria-expanded="false"
                                aria-controls="collapseExample">
                                Activity Type <i class="fas fa-sort-down"></i>
                            </button>
                        </p>
                        <div class="collapse show" id="collapse3">
                            <div class="card card-body">
                                @foreach ($activities as $activity)
                                <div class="row">
                                    <div class="col-12">
                                        <input type="radio" name="activities" id="triptype{{ $activity->activity }}" class="activities" value="{{ $activity->activity }}">
                                        <label for="triptype{{ $activity->activity }}">{{ Str::limit($activity->activity,20) }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-md-9">
             
                <div class="row package_data">
                    @if (count($packages)>0)
                        
                    @foreach ($packages as $package)
                    <div class="col-md-4 col-sm-6 col-12">
                    <div class="card-style-2 ">
                         <a href="{{ route('package.detail',['id'=>$package->id,'url'=>$package->url]) }}" class="text-decoration-none">
                        <div class="img-container">
                            <img src="{{ asset('frontend/assets/tour-1.png')}}" alt="" class="img-fluid w-100 w-100">
                        </div>
                        <div class="img-desc">
                            <div class="about-img row">
                                <div class="col-6">
                                   <p class="px-0 mx-0">
                                    @if (!empty($package->duration))
                                    {{ $package->duration }} |
                                    @endif
                                    @if (!empty($package->activity))
                                  {{ Str::limit($package->activity,20) }}
                                        
                                    @endif
                                       </p> 
    
                            </div>
                            <div class="col-6 ">
    
                                <div class="rating">
                                    @for ($i=1;$i<=$package->rating;$i++)
                                    <i class="fas fa-star"></i>
                                    @endfor
                                    @for ($i=1;$i<=5-$package->rating;$i++)
                                    <i class="far fa-star"></i>
                                    @endfor
                                 
                                </div>
                            </div>
                            </div>
                            <div class="title">
                                {{ Str::limit($package->name,35,'...') }}
                            </div>
                            <div class="price ">
                                    $USD {{ $package->price }}
    
                                
                            </div>
                        </div>
                </a>
    
                    </div>
                </div>
                @endforeach
                @else    
                <div class="text-center custom-text-primary mt-5">
                     <h2>No package found</h2>
                </div>
                @endif

                </div>
                
            </div>
        </div>
    </div>
</section>



@endsection
@push('scripts')
<script>
function getData(){
let category=$('.categories:checked').val();
let activity=$('.activities:checked').val();
let duration=$('.durations:checked').val();
let obj={
    catgeory:category,
    activity:activity,
    duration:duration,
    destination:{{ $data->id }},


}
$('.package_data').html('')


$.ajax({
    url:'{{ url('get-ajax-package') }}/',
    type:'GET',
    data:obj,
    success:function(data){
        $('.package_data').html(data)
    }

})


}

$('.categories').click(function(){
    getData()
})

$('.activities').click(function(){
    getData()
})
$('.durations').click(function(){
    getData()
})
</script>
    
@endpush