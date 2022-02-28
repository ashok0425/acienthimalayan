
@foreach($departures as $departure)
<tr>
	<td data-th="Start date">{{ date("j F, Y", strtotime($departure->start_date)) }}</td>
	<td data-th="End Date">@if($package->duration){{ date('j F, Y', strtotime($departure->start_date. ' + '.$package->duration.'-1 day')) }}@else {{ date("j F, Y", strtotime($departure->start_date)) }}@endif</td>
	<td data-th="Availability"><a class="tip booking" data-toolTip="
    The given date is available for group joining. Anyone traveling solo or with groups are welcome to join.
    " >Booking Open</a></td>
     @if($package->price)<td data-th="Price">US${{ ($package->deal_package)?$package->discounted_price:$package->price }} (All Inclusive)</td>@endif
     <td><a href="{{ route('booknow',['package_id'=>$package->id,'date'=>$departure->start_date]) }}" class="btn btn-primary btn-sm">Book Now</a></td>

</tr>
@endforeach
