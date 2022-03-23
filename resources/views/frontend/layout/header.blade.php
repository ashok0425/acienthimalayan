@php
    $destinations=DB::table('destinations')->where('status',1)->get();
    
    $website=DB::table('websites')->first();
@endphp
<header id='header'>
    <div class="container">
        <div class="top-header d-md-flex d-none justify-content-between">
           <div class="d-md-flex ">
            <div class="contact">
                <p><a href="tel:{{ $website->phone }}" class="text-dark text-decoration-none">
                    {{ $website->phone }}
                </a></p>
            </div>
            <div class="company-email">
                <p>
                <p><a href="mailto:{{ $website->email }}" class="text-dark text-decoration-none">
                    
                    {{ $website->email }}
                </a>
                </p>
            </div> 
            <div class="location">
                <p>{{ $website->address }}</p>
            </div>
           </div>
               <div class="d-flex justify-content-center social">
                   <p><a href="{{ $website->facebook  }}"><i class="fab fa-facebook text-dark  "></i></a></p>
                   <p><a href="{{ $website->instagram }}"><i class="fab fa-instagram text-dark "></i></a></p>
                   <p><a href="{{ $website->twitter }}"><i class="fab fa-twitter text-dark "></i></a></p>

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
                            <li class="nav-item dropdown ">
                                
                            <a class="nav-link d-block d-md-none  @if (PAGE=='destination')
                            active
                            @endif" href="{{ route('destination',['id'=>8,'url'=>'nepal']) }}"  aria-expanded="false">
                          Destination
                        </a>


                        <a class="nav-link d-none d-md-block dropdown-toggle @if (PAGE=='destination')
                        active
                        @endif" href="{{ route('destination',['id'=>8,'url'=>'nepal']) }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <a class="btn btn-primary btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#quickTrip">
                            Quick Trip
                        </a>
                    </div>
                </div>
            </nav>

        </div>
    </div>
</header>

@php
use App\Models\CategoryDestination;
use App\Models\Destination;
 
      $quick_trips = CategoryDestination::where('quick_trips',1)->where('status',1)->orderBy('order')->get();
      $destination_not_nepal = Destination::whereIn('id',[10,11])->where('status',1)->get();

@endphp


<div class="modal fade quick-trip-modal" id="quickTrip" tabindex="-1" role="dialog" aria-labelledby="quickTripLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="quickTripLabel">Quick Trip</h5>
				<a  class="close text-dark text-decoration-none" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times fa-2x"></i></span>
				</a>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					@foreach($quick_trips as $key=>$quick_trip)
					<li class="nav-item">
						<a class="nav-link {{ $key==0?'active':'' }}" id="cat-{{ $quick_trip->id }}-tab" data-bs-toggle="tab" href="#cat-{{ $quick_trip->id }}" role="tab" aria-controls="cat-{{ $quick_trip->id }}" aria-selected="true">{{ $quick_trip->name }}</a>
					</li>
					@endforeach
					@foreach($destination_not_nepal as $key=>$destination_not_nepa)
					<li class="nav-item">
						<a class="nav-link" id="dest-{{ $destination_not_nepa->id }}-tab" data-bs-toggle="tab" href="#dest-{{ $destination_not_nepa->id }}" role="tab" aria-controls="dest-{{ $destination_not_nepa->id }}" aria-selected="true">{{ $destination_not_nepa->name }}</a>
					</li>
					@endforeach
					
				</ul>
				<div class="tab-content" id="myTabContent">
					@foreach($quick_trips as $key=>$quick_trip)
					<div class="tab-pane fade {{ $key==0?'show active':'' }}" id="cat-{{ $quick_trip->id }}" role="tabpanel" aria-labelledby="cat-{{ $quick_trip->id }}-tab">
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th scope="col">Trip Id</th>
									<th scope="col">Trip Name</th>
									<th scope="col">Trip Length</th>
									<th scope="col">Trip Cost</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($quick_trip->packages()->where('status',1)->orderBy('name')->get() as $quickpackage)
								<tr>
									<td>{{ $quickpackage->trip_id }}</td>
									<td><a href="{{ route('package.detail',['id'=>$quickpackage->id,'url'=>$quickpackage->url]) }}">{{ $quickpackage->name }}</a></td>
									<td>{{ $quickpackage->duration }} days</td>
									<td>US ${{ $quickpackage->price }} </td>
									<td><a href="{{ route('booknow',['package_id'=>$quickpackage->id]) }}" class="btn  btn-primary btn-sm">Book now</a>
										{{-- <a class="btn btn-sample2 btn-sm" href="#">Join Group</a> --}}
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					@endforeach
					@foreach($destination_not_nepal as $key=>$destination_not_nepa)
					<div class="tab-pane fade" id="dest-{{ $destination_not_nepa->id }}" role="tabpanel" aria-labelledby="dest-{{ $destination_not_nepa->id }}-tab">
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th scope="col">Trip Id</th>
									<th scope="col">Trip Name</th>
									<th scope="col">Trip Length</th>
									<th scope="col">Trip Cost</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($destination_not_nepa->packages()->where('status',1)->orderBy('name')->get() as $quickpackage1)
								<tr>
									<td>{{ $quickpackage1->trip_id }}</td>
									<td><a href="">{{ $quickpackage1->name }}</a></td>
									<td>{{ $quickpackage1->duration }} days</td>
									<td>US ${{ $quickpackage1->price }} </td>
									<td><a href="{{ route('booknow',['package_id'=>$quickpackage1->id]) }}" class="btn btn-primary btn-sm">Book now</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					@endforeach
					
				</div>
			</div>
		</div>
	</div>
</div>














@push('scripts')
    
<script>
    if ($(window).width()>900) {
        $('.dropdown-menu').addClass('main')
    }else{
        $('.dropdown-menu').removeClass('main')

    }
</script>
@endpush