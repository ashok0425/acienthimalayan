@extends('frontend.layout.master')
@php
    define('PAGE','package')
@endphp
@section('content')

     
        <section class="review">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <h2 class="review-heading">Traveller's Reviews

                  <a class="btn btn-sample1 d-lg-none" href="#card-review">Write Review</a>

                </h2>
              </div>
              <div class="col-12 col-lg-8">
                @foreach ($testimonials as $review)
                <div class="card">

                <div class="row">
                    <div class="col-md-4">
                       <div class="img card-body ">
                           @if (!empty($review->image))
                           <img src="{{ asset($review->image) }}" alt="" class="w-75 text-md-center img-thumbnail">
                               @else   
                           <img src="{{ asset('frontend/assets/footer-img.png') }}" alt="" class=" w-75 text-md-center img-thumbnail">

   
                      @endif

                <p class="mt-1 text-center py-0  mb-1">
            <strong class="custom-text-primary">
                {{ $review->name }}
            </strong>    
                </p>

    <div class="d-flex justify-content-between flex-row align-items-center">
                           <div class="rating ">
                            @for ($i=1;$i<=$review->rating;$i++)
                            <i class="fas fa-star text-warning"></i>
                            @endfor
                            @for ($i=1;$i<=5-$review->rating;$i++)
                        
                                <i
                                    class="fas fa-star text-gray"></i>
                                    @endfor


                        </div>
                        <div class="">
                             <strong class="custom-text-primary">{{ carbon\carbon::parse($review->date)->format('d M Y') }}</strong>
                        </div>
                       </div>
                    </div>

                    </div>
                    <div class="col-md-8 ">
                        <div class="card-body">
                        <h3 class="custom-text-primary custom-fs-18">{{ $review->title }}</h3>
                        <div class="comment">

                            {!! strip_tags($review->content) !!}

                        </div>
                    </div>
                    </div>
                </div>
            </div>

                @endforeach
                <div class="card card-body">
              {!! $testimonials->render() !!}

                </div>
            </div>
            <div class="col-12 col-lg-4">
              <div class="card sticky-div " id="card-review">
                <div class="card-header">
                  <p class="mb-0 custom-text-primary">Write Your Review</p>
                </div>
                <div class="card-body">
                  <form action="{{ route('testimonials.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-12 my-2">
                        <div class="form-group">
                          <select class="form-control form-select" name="package" required>
                              @foreach ($packages as $package)
                            <option  value="{{ $package->id }}">{{ $package->name }}</option>
                                  
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-12 my-2">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Your Name" name="name" />
                        </div>
                      </div>
                      <div class="col-12 my-2">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Title" name="title" />
                          {{-- <input type="text" class="form-control date-picker" placeholder="Your Trip Date" /> --}}
                        </div>
                      </div>
                      <div class="col-12 my-2">
                        <div class="form-group">
                          <select name="rating" id="" class="form-control">
                            <option selected disabled>Please provide ratings</option>
                            <option value="1">1 Star</option>
                            <option value="2">2 Star</option>
                            <option value="3">3 Star</option>
                            <option value="4">4 Star</option>
                            <option value="5">5 Star</option>
                          </select>
                        </div>
                      </div>
                      {{-- <div class="col-12">
                        <div class="form-group">
                          <input type="email" class="form-control" placeholder="Your Email" name="email" />
                        </div>
                      </div> --}}
                      
                      <div class="col-12 my-2">
                        <div class="form-group">
                          <textarea name="content" placeholder="Enter your review" class="form-control" id="" cols="30" rows="5"></textarea>
                        </div>
                      </div>
                      <div class="col-12 my-2">
                        <div class="form-group mb-0">
                          <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
@endsection 


@push('scripts')
<script type="text/javascript"
src="https://www.viralpatel.net/demo/jquery/jquery.shorten.1.0.js"></script>

<script>
	$(document).ready(function() {
	
		$(".comment").shorten(
            {
                "showChars" : 450,
	"moreText"	: "See More",
	"lessText"	: "See Less",
            }
        );
	
	});
</script>
@endpush