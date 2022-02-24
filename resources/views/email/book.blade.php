<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap-grid.css">
    <meta charset="UTF-8">
    <title>Nepal Vision</title>
</head>

<body>
   {{--  <p class="text-center"><label>Number of traveller: </label>{!! $no_traveller !!}</p>
    <p class="text-center"><label>Package: </label>{!! $booking !!}</p>
    <p class="text-center"><label>Departure date: </label>{!! $departure_date !!}</p> --}}
    <table width="650" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td height="30" bgcolor="#999999">
                    <div align="center">Trip Booking </div>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="3">
                        <tbody>
                            <tr>
                                <td width="21%" align="right">
                                    <div align="left"><strong>Trip ID: </strong></div>
                                </td>
                                <td width="79%" align="left" valign="top"> {{ $booking->trip_id }} </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <div align="left"><strong>Trip Name:</strong></div>
                                </td>
                                <td width="79%" align="left" valign="top">{{ $booking->name }}</td>
                            </tr>
                            <tr>
                                <td align="right" valign="top">
                                    <div align="left"><strong>Start Date:</strong></div>
                                </td>
                                <td align="left" valign="top">{{ $departure_date }}</td>
                            </tr>
                            <tr>
                                <td align="right" valign="top">
                                    <div align="left"><strong>Insurance</strong></div>
                                </td>

                                {{-- <td align="left" valign="top">{!! $insurance !!}</td> --}}
                            </tr>
                            <tr>
                                <td align="right" valign="top">
                                    <div align="left"><strong>IP Location :</strong></div>
                                </td>
                                <td align="left" valign="top">{{ $userIP }} <a href="http://www.ip-adress.com/ip_tracer/{{ $userIP }}" target="_blank">Check The Country Here</a> </td>
                            </tr>
                            <tr>
                                <td align="right" valign="top">
                                    <div align="left"><strong>Source :</strong></div>
                                </td>
                                <td align="left" valign="top">{{ $source }} </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                	@for ($i = 0; $i < $no_traveller ; $i++)
                    <table width="690" border="0" align="left" cellpadding="1" cellspacing="1">
                        <tbody>
                            <tr>
                                <td colspan="5" align="right" bgcolor="#CCCCCC" style="padding-left: 10px">
                                    <div align="left">Personal Information Traveller {{ $i+1 }} </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="150" align="right">
                                    <div align="left"><strong>Name:</strong> </div>
                                </td>
                                {{-- <td colspan="4" align="left">{!! $f_name[$i] !!}  {!! $l_name[$i] !!}</td> --}}
                            </tr>
                            <tr>
                                <td align="right">
                                    <div align="left"><strong>Country: </strong></div>
                                </td>
                                <td colspan="4" align="left">{!! $country[$i] !!}</td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <div align="left"><strong>Detail Mailling Address:</strong></div>
                                </td>
                                <td colspan="4" align="left">{!! $mailing_address[$i] !!}</td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <div align="left"><strong>Email:</strong></div>
                                </td>
                                <td colspan="4" align="left">{!! $myemail12[$i] !!}</td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <div align="left"><strong>Phone:</strong></div>
                                </td>
                                <td align="left">{!! $phone_day[$i] !!}</td>
                               {{--  <td align="left">
                                    <div align="left"><strong>Phone(Evening): </strong></div>
                                </td>
                                <td align="left">{!! $phone_evening[$i] !!}</td> --}}
                               
                            </tr>
                            <tr>
                                <td align="right">
                                    <div align="left"><strong>Date of Birth:</strong> </div>
                                </td>
                                <td align="left">{!! $dob[$i] !!}</td>
                               {{--  <td align="left">
                                    <div align="left"><strong>Occupation: </strong></div>
                                </td>
                                <td align="left">{!! $occupation[$i] !!}</td>
                                <td align="left">&nbsp;</td> --}}
                            </tr>
                            <tr>
                                <td align="right">
                                    <div align="left"><strong>Passport No: </strong></div>
                                </td>
                                <td align="left">{!! $passport_no[$i] !!}</td>
                               {{--  <td align="left">
                                    <div align="left"><strong>Place of Issue: </strong></div>
                                </td>
                                <td align="left">{!! $passport_place_issue[$i] !!}</td>
                                <td align="left">&nbsp;</td> --}}
                            {{-- </tr>
                            <tr> --}}
                                {{-- <td align="right">
                                    <div align="left"><strong>Issue Date:</strong></div>
                                </td>
                                <td align="left">{!! $issue_date[$i] !!}</td> --}}
                                <td align="left">
                                    <div align="left"><strong>Expiry Date:</strong></div>
                                </td>
                                <td align="left">{!! $expiry_date[$i] !!}</td>
                               
                            </tr>
                            <tr>
                                <td align="right">
                                    <div align="left"><strong>Emergency contact:</strong></div>
                                </td>
                                <td colspan="4" align="left">{!! $expiry_date[$i] !!}</td>
                            </tr>
                            {{-- <tr>
                                <td align="right">
                                    <div align="left">Insurance Coverage</div>
                                </td>
                                <td colspan="4" align="left">{!! $insurance[$i] !!}</td>
                            </tr> --}}
                        </tbody>
                    </table>
                     @endfor
                </td>
            </tr>
            {{-- <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td width="21%">Insurance Coverage: {!! $insurance !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr> --}}
        </tbody>
    </table>
   
    {{-- <div class="row">
        @for ($i = 0; $i < $no_traveller ; $i++) <div class="col-md-6 col-sm-12 col-xs-12">
            <h2>Traveller info {{ $i+1 }}</h2>
            <p class="text-center"><label>First Name: </label> {!! $f_name[$i] !!}</p>
            <p class="text-center"><label>middle Name: </label> {!! $middleName[$i] !!}</p>
            <p class="text-center"><label>last Name: </label> {!! $l_name[$i] !!}</p>
            <p class="text-center"><label>Address: </label>{!! $mailing_address[$i] !!}</p>
            <p class="text-center"><label>Email: </label>{!! $myemail12[$i] !!}</p>
            <p class="text-center"><label>Country: </label>{!! $country[$i] !!}</p>
            <p class="text-center"><label>Passport number: </label>{!! $passport_no[$i] !!}</p>
            <p class="text-center"><label>Passport_place_issue: </label>{!! $passport_place_issue[$i] !!}</p>
            <p class="text-center"><label>insurance: </label>{!! $insurance[$i] !!}</p>
    </div>
    @endfor
    </div> --}}
</body>

</html>