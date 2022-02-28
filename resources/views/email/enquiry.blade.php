{{-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nepal Vision</title>
</head>
<body>


	<p class="text-center"><label>Name: </label>{!! $name !!}</p>
	<p class="text-center"><label>Email: </label>{!! $myemail !!}</p>
	
	@if($mycontact)<p><label>Contact no: </label>{!! $mycontact !!}</p>@endif
	@if($expected_date)<p><label>Expected date: </label>{!! $expected_date !!}</p>@endif
	@if($no_participants)<p><label>Number Of Participants: </label>{!! $no_participants !!}</p>@endif
	@if($country)<p><label>Country: </label>{!! $country !!}</p>@endif
	@if($package_name)<p><label>Package Name: </label>{!! $package_name !!}</p>@endif
	<p><label>Message: </label>{!! $mycomment !!}</p>

	
</body>
</html>
<hr> --}}
{{-- <p><strong>Quick Enquiry</strong></p> --}}
<p><span class='red'><strong>Clent's Information</strong></span></p>
<hr ALIGN='LEFT' WIDTH='350' SIZE='1'>
<p>
<strong>Full Name</strong>:{!! $name !!}<br />
{{-- <strong>Last Product Visited</strong>: ".$last_product."<br /> --}}
{{-- <strong>Referrer</strong>: ".$_SESSION["origURL"]."<br /> --}}
{{-- <span CLASS='label'>IP:</span>".$ipLocation." <a HREF='http://www.ip-adress.com/ip_tracer/".$ipLocation."'>Click Here To Check Country</a> <br> --}}
    @if($mycontact)<span class='label'><strong>Phone</strong>:</span>&nbsp;{!! $mycontact !!}<br />@endif
    <span class='label'><strong>Email</strong></span><strong>:</strong>&nbsp;{!! $myemail !!}<br />
    @if($expected_date)<p><label>Expected date: </label>{!! $expected_date !!}</p>@endif
    @if($no_participants)<p><label>Number Of Participants: </label>{!! $no_participants !!}</p>@endif
    @if($country)<p><label>Country: </label>{!! $country !!}</p>@endif
    @if($package_name)<p><label>Package Name: </label>{!! $package_name !!}</p>@endif
<strong>Message: </strong>{!! $mycomment !!} </p>

<hr ALIGN='LEFT' WIDTH='350' SIZE='1'>
<p><strong>User Info: </strong>{!! $user_info !!}</p>
<p><strong>Source: </strong>{!! $source !!}</p>

