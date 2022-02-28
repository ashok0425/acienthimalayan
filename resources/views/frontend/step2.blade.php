@extends('frontend.layout.master') 
@php
    define('PAGE','destination')
@endphp
@section('content')
<section class="booking my-5">
    <div class="container">
        <div class="row">
            
            <div class="col-8">
            <div class="card my-2">
                
               <div class="card-header">
                <h2 class="card-title custom-text-primary py-0 my-0">Please Submit Travellers Details</h2>
                <small>
                   Required field<span class="text-danger">*</span>
                </small>
                <hr>
                <small class="custom-text-primary">All your personal detail will keep at our office here in Kathmandu with confidence and other then official use we do not share the information for anyone else. Please complete the following information for each individuals; participating in your team.</small></div>

                <form action="{{ route('booking.step2.store') }}" method="POST">
                			{{ csrf_field() }}
                @for($i = 0;$i < $no_traveller; $i++)
                

                    <div class="my-2 card-header custom-bg-primary text-light d-flex align-items-center">
                        <h3 class="custom-fs-18 custom-fw-600 d-flex align-items-center card-title">Personal Information Traveller {{ $i+1 }}</h3>
                    </div>
                    <div class="card-body">
                     
                        {{-- <form action="#"> --}}
                            <div class="form-group row my-2">
                                <label for="title" class="col-md-4 custom-text-primary custom-fw-600 custom-fs-16 col-form-label">Title<span class="text-danger">*</span>: </label>
                                <div class="col-md-8">
                                    <select class="form-control" id="title" name="title[]" required>
                                        <option value="Mr">Mr.</option>
                                        <option value="Miss">Miss.</option>
                                        <option value="Mrs">Mrs.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label for="fname" name="f_name[]" class="col-md-4 custom-text-primary custom-fw-600 custom-fs-16 col-form-label">First Name<span class="text-danger">*</span>: </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="fname[]" placeholder="John" required name="fname" required>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label for="lname" class="col-md-4 custom-text-primary custom-fw-600 custom-fs-16 col-form-label">Last Name: </label>
                                <div class="col-md-8">
                                    <input type="text" name="l_name[]"  class="form-control" id="lname" placeholder="Dalton">
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label for="country" name="country[]" class="col-md-4 custom-text-primary custom-fw-600 custom-fs-16 col-form-label">Country<span class="text-danger">*</span>: </label>
                                <div class="col-md-8">
                                    <select name="country[]" class="form-control" id="country" required>
                                        <option value="0" selected="selected">--Select Country--</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran (Islamic Republi">Iran (Islamic Republi</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Korea (South)">Korea (South)</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriy">Libyan Arab Jamahiriy</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Trinidad And Tobago">Trinidad And Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="VietNam">VietNam</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Yugoslavia">Yugoslavia</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label for="mail" class="col-md-4 custom-text-primary custom-fw-600 custom-fs-16 col-form-label">Detail Mailing Address<span class="text-danger">*</span>: </label>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="mail" rows="3" name="mailing_address[]" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label for="email" class="col-md-4 custom-text-primary custom-fw-600 custom-fs-16 col-form-label">Email<span class="text-danger">*</span>: </label>
                                <div class="col-md-8">
                                    <input type="email" name="email[]" class="form-control" id="email" placeholder="youremail@email.com" required>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label for="occupation" class="col-md-4 custom-text-primary custom-fw-600 custom-fs-16 col-form-label">Occupation: </label>
                                <div class="col-md-8">
                                    <input type="text" name="occupation[]" class="form-control" id="occupation" placeholder="Eg: Manager">
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label for="phoned" class="col-md-4 custom-text-primary custom-fw-600 custom-fs-16 col-form-label">Phone (Day)<span class="text-danger">*</span>: </label>
                                <div class="col-md-8">
                                    <input type="text" name="phone_day[]" class="form-control" id="phoned" required>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label for="phonee" class="col-md-4 custom-text-primary custom-fw-600 custom-fs-16 col-form-label">Phone (Evening): </label>
                                <div class="col-md-8">
                                    <input type="text" name="phone_evening[]" class="form-control" id="phonee" required>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label for="dob" class="col-md-4 custom-text-primary custom-fw-600 custom-fs-16 col-form-label">Date of Birth<span class="text-danger">*</span>: </label>
                                <div class="col-md-8">
                                    <input type="text" name="dob[]" class="form-control datepicker2" id="dob" required>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label for="passport" class="col-md-4 custom-text-primary custom-fw-600 custom-fs-16 col-form-label">Passport Number: </label>
                                <div class="col-md-8">
                                    <input type="text" name="passport_no[]" class="form-control" id="passport">
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label for="issuePlace" class="col-md-4 custom-text-primary custom-fw-600 custom-fs-16 col-form-label">Place of Issue: </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="issuePlace" name="passport_place_issue[]">
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label for="expiryDate" class="col-md-4 custom-text-primary custom-fw-600 custom-fs-16 col-form-label datepicker3">Expiry date: </label>
                                <div class="col-md-8">
                                    <input type="date" class="form-control" id="expiryDate" name="expiry_date[]">
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label for="econtact" class="col-md-4 custom-text-primary custom-fw-600 custom-fs-16 col-form-label">Emergency Contact<span class="text-danger">*</span>: </label>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="econtact" rows="3"  name="emergency_contact[]" readonly></textarea>
                                </div>
                            </div>
                        {{-- </form> --}}
                  
                <h4 class="custom-text-primary ">Insurance</h4>

                            <p><strong>Insurance</strong> is compulsory to take part in any adventure trip and you must cover both medical & emergency evacuation; must be covered at least worth of US $100,000</p>
                            <div class="">
                                <label class="custom-text-primary custom-fs-16 line-height-0">
                                    <input class="" type="radio" name="insurance[{{ $i }}]" id="exampleRadios1" value="I have full coverage of Insurance" checked required> I have full coverage of Insurance (Copy must be provided up on your arrival in Kathmandu)
                                </label>
                            </div>
                            <div class="">
                                <label class="custom-text-primary custom-fs-16 line-height-0">
                                    <input class="" type="radio" name="insurance[{{ $i }}]" id="exampleRadios2" value="Not yet bought" required> Not yet bought (I will Choose insurance later)
                                </label>
                            </div>
                        </div>

                 
                    @endfor
                    <input type="hidden" name="booking" value="{{ $booking }}">
                    <input type="hidden" name="agent" value="{{ $agent }}">

                    <input type="hidden" name="departure_date" value="{{ $departure_date }}">
                    <input type="hidden" name="no_traveller" value="{{ $no_traveller }}">
                    <div class="card-body border-top">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-success" name="booknow" value="Book Now, Pay Later">

                            </div>
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-primary" name="bookandpay" value="Book Now, Pay Now">

                            </div>
                                </div>
                    </div>
                   
                </form>
                    </div>
                </div>

            <div class="col-lg-4 ">
                <x-bank-detail />
            </div>
        </div>
</section>
@endsection
@push('scripts')
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {

    $(".datepicker2").datepicker();
    $(".datepicker3").datepicker();


});
</script>
@endpush 
@push('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
@endpush