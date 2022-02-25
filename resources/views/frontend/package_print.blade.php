@php
    define('PAGE','destination')
@endphp
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>



<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">

    <title>{{ $package->name }}</title>

    {{-- <script type="text/javascript" src="http://www.himalayanglacier.com/js/jquery-1.11.0.min.js"></script> --}}

    {{-- <script src="http://www.himalayanglacier.com/js/bootstrap.js"></script> --}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    {{-- <link rel="stylesheet" href="{{ asset('dist/frontend/assets/css/main.css') }}" /> --}}

    <style>

    	html,body{font-size:14px;line-height:1.6rem}

p,ul,ol{font-size:14px;line-height:1.6rem}



.routeMap {width:748px; margin:0px auto; 0 auto;display:block}



.middle_div {padding:10px 10%}



.backtop {

font:700 11px Arial;

padding:1;

}

.tripsource{display:none;}

.backtop a{padding:1;}

.producttitle2		{font-size: 12px;  font-family: verdana ;color:#003466; font-weight:bold;

padding-top:10px; padding-bottom:5px;

}

a.print{padding:3px 0px;background:#FF6600;color:#fff;font:bold 12px Arial, Helvetica, sans-serif;text-align:center;

width:100px;display:block;float:right}

.product-hint{clear:both;margin-bottom:10px;color:#5f5e5e}

.productContent {text-align:justify;margin-bottom:15px;}

.productContent h2{margin-top:15px;}



.tripFacts{clear:both;overflow:hidden}

.tripFacts table{border:1px solid #6b6a6a;border-bottom:1px solid #ffffff}

.tripFacts table tr td{padding:5px;border-bottom:1px solid #6b6a6a;}

h1{display:block;float:left;width:550px;font-size:18px!important;margin:0px 0px 15px 0px;padding:0px;}

a:hover.print{background:#fd7c27;}

.printBut a,.tripsource{padding:0 5px;color:#FF6600;font-weight:bold}

.printBut a:hover{text-decoration:underline}

.printBut span{color:#FF6600;font-weight:bold}

.Itinerary img.contentImageright{float:right;margin: 5px 0 5px 5px;}

.Itinerary img.contentImageleft{float:left;margin: 5px 5px 5px 0;}



.trip-overview table tr td i.fa {

    font-size: 16px;

    width: 20px;

}

.product-details h2{font-size:18px;}



/***** Terms and Conditions ***/

.termsMenu{position:fixed;right:15px;top:0px;}

.termsMenu a{display:block;float:right;padding:5px 8px 5px 30px;text-decoration:none;color:#ffffff;margin-right:5px;}

.termsMenu a.printlink{background:#f5901a url(../images/print.png) 5px 1px no-repeat}

.termsMenu a.pdflink{background:#f5901a url(../images/pdf.png) 5px 3px no-repeat}

.termsnconditions{padding:0 25px 0 20px;}

.termsnconditions p{margin:0 0 15px 0;padding:0px;}

.termsnconditions h2{font-size:18px;}

.termsnconditions h3{margin:0 0 10px 0;font-size:16px;}

.paymentMethod{background:#f4f4f4;padding:10px;margin-bottom:15px;}

.paymentMethod h4{color:#0e8ab4;margin:0px;padding:0px;font-size:14px;}

.paymentMethod h5{color:#444444;font-size:12px;margin:0px;padding:0px;}

.paymentMethod a{color:#0e8ab4}

.paymentMethod a:hover{text-decoration:none}

.paymentMethod .impnote{background:#fcf4e1;padding:5px;font:normal 12px Arial, Helvetica, sans-serif;color:#656565;margin-bottom:10px;}



/***** Equipment ***/

.hide-print{display:none} 





@media print {

  a[href]:after {

    content: none !important;

  }

}



    </style>

   {{--

    <link rel="stylesheet" type="text/css" media="print" href="http://www.himalayanglacier.com/css/screen.css" /> --}}

</head>



<body bgcolor="#FFFFFF">

    <div class="middle_div">

        <div class="tripTitle">
{{-- {{ dd($package) }} --}}
            <h1 class="text-center">{{ $package->name }}</h1></div>

        <!-- Description-->

        <a href="javascript:print();" name="top" class="print">

		 Print This Page</a>

        <div>

            <div class="product-hint">{!! $package->slogan !!}</div>

            <div class="tripFacts">

                {{-- <table width="100%" class="table responsive" cellpadding="0" cellspacing="0">

                    <tbody>

                        <tr>

                            <td width="20%"><i class="fa fa fa-group"></i><span class="desctiption-title"> Group size:</span></td>

                            <td width="30%">{{ $package->group_size }}</td>

                            <td width="20%"><i class="fa fa-check-circle-o"></i><span class="desctiption-title"> Max-Altitude:</span></td>

                            <td width="30%">{{ $package->max_altitude }}</td>

                        </tr>

                        <tr>

                            <td><i class="fa fa-globe"></i><span class="desctiption-title"> Destination:</span></td>

                            <td>{{ $package->destination->name }}</td>

                            <td>

                            </td>

                            <td> </td>

                        </tr>

                        <tr>

                            <td><i class="fa fa-plane"></i><span class="desctiption-title"> Arrival on:</span></td>

                            <td>{{ $package->arrival }}</td>

                            <td><i class="fa fa-plane"></i><span class="desctiption-title"> Departure from:</span></td>

                            <td>{{ $package->departure_from }}</td>

                        </tr>

                        <tr>

                            <td><i class="fa fa-cutlery"></i><span class="desctiption-title"> Meals:</span></td>

                            <td colspan="3">{{ $package->meals }}</td>

                        </tr>

                        <tr>

                            <td><i class="fa fa-check-circle-o"></i><span class="desctiption-title"> Accommodation:</span></td>

                            <td colspan="3">{{ $package->room }}</td>

                        </tr>

                        <tr>

                            <td><i class="fa fa-check-circle-o"></i><span class="desctiption-title"> Fitness level:</span></td>

                            <td colspan="3">{{ $package->fitness_level }}</td>

                        </tr>

                    </tbody>

                </table> --}}
                <table class="table table-bordered table-geninfo mb-0">
                                <tbody>
                                    @if($package->activity || $package->fitness_level)
                                    <tr>
                                        @if($package->activity)
                                        <td> <span class="fa fa-map"></span> <strong>Activities:</strong></td>
                                        <td>{{ $package->activity }}</td>
                                    @endif
                                    @if($package->fitness_level)
                                        <td> <span class="fa fa-heartbeat"></span> <strong>Fitness Level:</strong></td>
                                        <td>{{ $package->fitness_level }}</td>
                                    @endif
                                    </tr>
                                    @endif
                                    <tr>
                                        @if($package->max_altitude)
                                        <td> <span class="fa fa-signal"></span> <strong>Max Elevation:</strong></td>
                                        <td>{{ $package->max_altitude }}</td>
                                        @endif
                                        @if($package->transport)
                                        <td> <span class="fa fa-cab"></span> <strong>Transportation:</strong></td>
                                        <td>{{ $package->transport }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        @if($package->best_month)
                                        <td> <span class="fa fa-calendar"></span> <strong>Best Month:</strong></td>
                                        <td>{{ $package->best_month }}</td>
                                        @endif
                                        @if($package->group_size)
                                        <td> <span class="fa fa-group"></span> <strong>Group Size:</strong></td>
                                        <td>{{ $package->group_size }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        @if($package->arrival)
                                        <td> <span class="fa fa-location-arrow"></span> <strong>Arrival on:</strong></td>
                                        <td>{{ $package->arrival }}</td>
                                        @endif
                                        @if($package->departure_from)
                                        <td> <span class="fa fa-space-shuttle"></span> <strong>Departure from:</strong></td>
                                        <td>{{ $package->departure_from }}</td>
                                        @endif
                                    </tr>
                                     @if($package->meals)
                                    <tr>
                                        <td class="border-top-0"> <span class="fa fa-cutlery"></span> <strong>Meal:</strong></td>
                                        <td class="border-top-0">{{ $package->meals }}</td>
                                    </tr>
                                    @endif
                                    @if($package->room)
                                    <tr>
                                        <td class="border-top-0"> <span class="fa fa-bed"></span> <strong>Accommodation:</strong></td>
                                        <td class="border-top-0">{{ $package->room }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ url('/') }}

            </div>

            <!-- end of tripfacts -->

            <div style="clear:both" class="product-details">

                <!-- Overview -->

                <!-- Description -->

                <h2>

  <a name="trip_excludes" id="trip_excludes" ></a>Trip Introduction </h2>

                <div style="text-align:justify;" class="productContent">{!! $package->overview !!}</div>

                <h2 id="d2d">Outline Itinerary</h2>

                <div class="productIti productContent">

                    <div class="productIti">{!! $package->outline_itinerary !!}</div>

                </div>

                <h2 id="d2d">Day to Day Itinerary</h2>

                <div class="productIti productContent">

                    <div class="productIti">{!! $package->detailed_itinerary !!}</div>

                </div>

                {{-- <h2 id="cost">Important Note</h2>

                <div class="productContent">

                    {!! $package->important_notes !!}

                </div> --}}

                <!-- Trip Include s-->

                <h2 id="tripinclude">Trip Includes</h2> {!! $package->include_exclude !!} 
                <h2 id="tripinclude">Trip Excludes</h2>  {!! $package->trip_excludes !!} 


                <!-- Trip Excludes-->

                <h2 id="insurance">Equipments</h2>

                <div class="productContent">{!! $package->equipment !!}</div>

                <!-- Accommodations-->

                <h2 id="health">Physical Condition and requirement</h2>

                <div class="productContent">{!! $package->physical_condition !!}</div>

                <!-- Foods on Trips-->

                <h2 id="meals">Useful info </h2>

                <div class="productContent">{!! $package->useful_info !!}</div>

                <!-- Team Compositon-->

                <!-- Trekking Guides & Potters-->

                <h2 id="leader">FAQ</h2>

                <div class="productContent">{!! $package->faq !!}</div>

                <!-- Trip Acclimatization-->

                <!-- Trekking Day-->

                <!-- Climbing Day-->

                <!-- Base Camp-->

                <!-- WEATHER-->

                <!-- Experience Required-->

                <!-- pre trip meeting-->

            </div>

            <br/>

            <div align="center" class="printBut">

                <a href="javascript:print();">Print this page</a>

                <span> | </span>

                <a href="#top">Go to top</a>

            </div>

            <div class="tripsource">Source:{{ url('/') }}</div>

        </div>

</body>



</html>