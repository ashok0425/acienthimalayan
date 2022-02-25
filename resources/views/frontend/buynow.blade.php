@extends('frontend.layout.master')
@php
    define('PAGE','destination')
@endphp
@section('content')
<x-page-header title="Book Now" route=""  />

<section class="booking mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                    <div class="card">
<div class="card-header">
                    <h2 class="custom-text-primary card-title">Make A Booking</h2>
                </div>
                        <div class="card-body">
                            <form action="{{ route('booking.step2') }}" method="POST">
                                @csrf
                            @csrf
                                <div class="form-group row my-3">
                                    <div for="tripName" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500">Trip Name: </div>
                                    <div class="col-md-8">
                                        
                                        @if(isset($package))
                                           <input type="hidden" value="{{ $package->id }}" name="booking">
                                           <div class="form-control">{{ $package->name }}</div>
                                        @else
                                        <select class="form-select" aria-label="Default select example" required name="booking">
                                            <option selected>--select package--</option>
                                            @foreach ($packages as $package)
                                            <option value="{{ $package->id }}">{{ $package->name }}</option>
                                                
                                            @endforeach
                                            
                                          </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <div for="tripdate" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500"> Departure Date:</div>
                                    <div class="col-md-8">
                                        
                                                <input type="text" class="form-control" id="datepicker" name="departure_date" required placeholder="Enter date" @if (!empty($data))
                                                    value="{{ $date }}"
                                                @endif autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <div for="travellers" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500">Number Of Travellers:</div>
                                    <div class="col-md-8">
                                        
                                            <select name="no_traveller" class="form-select form-control">
                                                <?php for($i=1; $i<=20; $i++){ ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php } ?>
                                            </select>
    
                                    </div>
                                </div>


                                <div class="form-group row my-3">
                                    <div for="travellers" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500">How did you find us?:</div>
                                    <div class="col-md-8">
                                        
                                        <select name="agent" class="form-select form-control">
                                            @foreach($agents as $agent)
                                            <option value="{{$agent->id}}">{{$agent->name}}</option>
                                            @endforeach
                                           
                                        </select>
    
                                    </div>
                                </div>

                                <div class="row form-group">
                              <div class="col-md-8 offset-md-4 px-0 my-0 custom-text-primary custom-fs-14 ">
                                Please read carefully the “Terms & Conditions” and click on "I agree" at the bottom of the term & conditions to proceed online trip booking form.</p>
                              </div>
                            </div>
                                
                                <div class="mt-2 text-center">
                                    <button type="submit" class="btn btn-primary btn-block">I Agree - Continue with Booking Procedures</button> 
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card mt-2">
<div class="card-body">
                        <h3 class="custom">GUEST AGREEMENT AND DECLEAREATION</h3>
                        <p>
                            "Trekking  &amp; walking, climbing &amp; mountaineering in remote parts of this Himalayan  countries carries an inherent risk due to the weather cause injury and death, this  is beyond our control. Always we do our best to reduce any risks and hazards to  our capacity, still there are chances of accidents happening, and in this you  must agree
                        </p>
    
    
                        <p><strong>Please read the following booking conditions very carefully:</strong></p>
                        <p class="cape" align="justify">NEPAL VISION TREKS &amp; EXPEDITION "BOOKING TERMS &amp; CONDITIONS"</p>
    
                        <ol class="default-list">
                            <li>
                                <h5>The contract</h5>
                                <p class="text-justify">We kindly request you to apply the following Terms and Conditions that guide relationship between you (client) and Nepal Vision Trek (P) Limited (hereinafter referred as "The Company"), Registered Company Number 618- 049/050. You will be bounded by the Terms and Conditions while booking your trip along with cancellation policy and certain limitations of liability. To eliminate any legal or others disputes both parties agree to these Terms and Conditions during the trip. This booking Terms and Conditions have incorporated important information, which is most essential that you read them carefully and understand them. The Booking Terms and Conditions set out the basis of your legal relationship with Nepal Vision.</p>
                                <p class="text-justify">We expect your intensive reading while booking a Tour, you acknowledge that you have read, understand and agree to be bound by these Terms. If you are booking on the behalf of other participants, you guarantee that you have the authority to accept and do accept these Terms on behalf of the other participants in your party. So please kindly assimilate all our condition.</p>
                                <p class="text-justify"><strong>Remarks:</strong> We kindly inform you that these terms and conditions are applied when you directly book with us nevertheless if you booked with some other parties, then their terms and conditions will be applied, not ours.</p>
                            </li>
    
                            <li>
                                <h5>Privacy is our ornament –Assurance policy </h5>
                                <p class="text-justify">For booking the trip we need many questions and information from your side. We make you sure that any private or personal information which is given by you will not be supplied for any purpose. We know the value of the customer or client's privacy so all the personal/professional information’s are kept secret.</p>
                            </li>
    
    
                            <li>
                                <h5>Trip booking </h5>
                                <p class="text-justify">The term ‘trip’ refers any sorts of product itinerary or activities, which are bought by clients with us including Trekking, Tours, Expeditions, and/or other adventure and tour programs.</p>
                                <p class="text-justify">The existences of contract and booking will be confirmed when the Nepal Vision issues a written confirmation after receipt of the applicable deposit amount. You are highly requested to check your confirmation carefully and if you find something incorrect or incomplete information kindly inform to Nepal Vision Trek. The most important aspect is that your name should be exactly as stated in the relevant passport and agree to provide full, complete and accurate information to the Nepal Vision.</p>
                                <p class="text-justify">The company reserves the right to changes the trip prices until your booking is confirmed and a contract comes into force. Except than expressed herein, we are not liable to any warranty, collateral agreement, prior agreement, description of services, or conditions.</p>
                            </li>
    
                            <li>
                                <h5>Deposit requirements </h5>
                                <p class="text-justify">The deposit requirements are varied from nation to nation. So Nepal vision has prescribed the fixed deposit requirement procedure.</p>
                                <p class="text-justify">You will have to make a deposit of 20% cost of your trip at the time of booking the trip. You are supposed to be paid the remaining amount upon your arrival in Kathmandu and before the trip departure. </p>
                                <p class="text-justify">You should send your deposit to the Company or its Agent. Sometime if the trip is Company's Tailor Made, you should pay higher deposit or full payment at the time of booking. For various deposit policy except mentioned in this clause, Nepal Vision will fully guide at the time of booking. </p>
                                <p class="text-justify"><strong>Payment Approach</strong><br><br>You can proceed the two way of payment for booking deposit. Simply, bank transfer and Credit/David Cards (Visa or MasterCard) are the common way of making booking. You should follow the information given in the booking form. </p>
                                <p class="text-justify"><strong>(1) Payment by Credit Card (MasterCard or Visa Only) </strong><br>
                                    Please complete the necessary details in the form Click hear to download the form (*.doc version)Fax (at 977 1 4423 296) or e-mail (scan it and send via e-mail) the filled form to Nepal Vision Treks. Your credit card will be charged by Himalayan Bank (Credit Card Division) on behalf of Nepal Vision Treks &amp; Expedition P. Ltd..
                                </p>
                                <p class="text-justify"><strong>(2) Payment via Wire/Bank Transfer</strong><br>
    
                                </p><h6>Our Bank Details for wire Transfer:</h6> <span class="well" style="display: block;">
                                    <strong>Name of the Beneficiary:</strong>Nepal Vision Treks &amp; Expedition (P). Ltd. <br>
                                    <strong>Address of the Beneficiary:</strong>BhagawanBahal, Thamel, Kathmandu, Nepal<br>
                                    <strong>Bankers Name:</strong>Nabil Bank Ltd.<br>
                                    <strong>Bankers Address:</strong>Nabil House, Kamaladi, Kathmandu<br>
                                    <strong>Account No.:</strong>0102211820301<br>
                                    <strong>Account type:</strong>Current Account<br>
                                    <strong>Swift Code:</strong>NARBNPKA<br>
                                </span>
                                Please note that Nepal vision is not liable of any delay or loss during the transfer process. Even we receive the less amount due to the use of mediator bank or any other reasons, you are requested to pay accordingly as a result your cost will be covered to the product cost. 
                                <p></p>
                                <p class="text-justify">We can follow up the bank if you E-mail us the bank reference number or remittance slips after you initiate the transfer. The bank may forwards the money with different name so we can follow if we have your reference number/remittance slips and sander details. </p>
                            </li>
    
                            <li>
                                <h5>The way of booking acceptance and final payment</h5>
                                <p class="text-justify">You are flexible to make the Final payment of trekking, tours, climbing, expedition or any kind of trips in Nepal. You can make the final payment upon arrival in Nepal. You can make the final payment via by bank transfer, cash or by Credit Card (Visa or MasterCard). While you are making your payment by cards you will have the 4% surcharge (this applies to all payments; deposits, final balances, trip extension and miscellaneous purchases.)</p>
                            </li>
    
                            <li>
                                <h5>The Cancellation Policy</h5>
                                <p class="text-justify"><strong>I) If Clients cancel the trip</strong><br><br>
                                    All the cancellation should be in written form and acknowledged by the Company. The cancellation charge will be determined according to the date of cancellation request, which is received, by the Company or its Agents.<br>
    
                                    If you cancel your trip; that you will loss of money you paid and applies to all cancelled reservations. If you cancelled your trip we will be levied cancellation charge of full advanced amount.<br>
    
                                    No refunds will be made if you voluntarily leave a trip for any reason after the trip has begun. Refunds will be at the discretion of the company if you are involuntarily forced to leave a trip for any reason. No refunds will be made for any accommodation, transport, sightseeing, meals or services not utilized. Please note that these conditions are subject to change.<br>
    
                                    Please note that Nepal Vision highly advises our clients to take out cancellation insurance at the time of booking. The most prominent aspect of terms and condition is that if you voluntarily leave a trip for any reason after the trip has begun you will not get any refunds for accommodation, transport, sightseeing, meals or services that you have not utilized.<br>
                                </p><p class="text-justify"><strong>II) If the cancellation made by company</strong><br><br>
                                    Nepal Vision fully reserves the authentic right to cancel any trip you booked until Guaranteed to be run. <br>
    
                                    Nepal Vision reserves the right to cancel any trip even the guaranteed trip due to reasons beyond its control i.e. due to natural disasters, flight cancellation, and consequences of strikes, industrial action, wars, riots, sickness, quarantine, government intervention, weather conditions, or other untoward occurrences. We cannot control such a massive effect of destruction. During this we will refund the trip price. Then if we cancel your guaranteed departure which is ready to run, we will easily refund the trip deposit or we may give you an alternative trip having the same values. <br>
    
                                    Please note that we are not responsible if you change in the airline carrier, flight time tables or itineraries provided the departure and arrival dates, the substitution of a vessel, modification of itineraries, and change in cabin category or hotel accommodation. So you should be fully responsible in the aforementioned issues.
                                    <br>
                                    If you get the trouble due to the booking of visas, vaccinations, non-refundable flights or rail, or other fees, loss of earnings, or loss of enjoyment, etc, we are fully not responsible in these issues.<br>
    
                                </p>
                            </li>
    
                            <li>
                                <h5>Special Health requirement and medical condition</h5>
                                <p class="text-justify">Nepal Vision has designed the tours and treks according to the level of interest and fitness of our clients. All our tours require a level of fitness, so we highly request you before booking your trip please you should check with your local GP regarding your health and fitness before you travel. If you have any -existing medical condition and disability you should inform us before booking. This is your responsibility. If you have some pre-existing health problems it may increase the risk of your required medical attention that may affect your ability to travel. <br>
                                    As a local and hospitality based company we will try our best to meet Clients special requests including dietary. Furthermore, Medical facilities and the treatment will be vary from country to country so we are not able and ready to meet your all the desires based on your health and treatment. So please be sensible before booking and follow the level of your desire and adventure. We can advice you. After you book and start your trip if you will unable to commence or complete Nepal Vision is fully irresponsible. <br>
                                    <strong>About Special Offer Price Vs. Regular Offer Price</strong><br><br>
                                    The Company, during holiday and off seasons, offers special discount rates for some of our services. Those special offers apply for specific products and last over a specific time. To be eligible to enjoy those offers, bookings have to be made within the time specified in the offers. The bookings that are made either prior to or after the offer period are not eligible to enjoy the offers and cannot claim them at any point.
                                </p>
                            </li>
    
                            <li>
                                <h5>Travel insurance </h5>
                                <p class="text-justify">The most essentials parts of any tour are Adequate and valid travel insurance for all travelers. Your insurance will incorporate accidents, injury, illness and death medical expenses, including any related to pre-existing medical conditions, emergency repatriation (including helicopter rescue and air ambulance where applicable) and personal liability. Moreover, to claim you any compensation, which is viable and tangible, you must submit your proof of insurance.
                                </p>
                            </li>
    
                            <li>
                                <h5>Itinerary changes along with flights delay and natural disaster – degree of Responsibility  </h5>
                                <p class="text-justify">Due to the bad weather in the mountain may cause delay in domestic flights for your departure. Please note that mountain adventures are always unpredictable. The client is responsible to bear all additional expenses including food and accommodation costs.  If you wish to make an alternative arrangement such as Helicopter flight to avoid flight delays, all additional cost would be your responsibility. <br>
    
                                    We do not accept any responsibility of your incurred cost of missed international flight, but we can assist you to provide alternative arrangements wherever possible. There may be some changes in the fields as well due unforeseen circumstances.  <br>
    
                                    You will have the free authority to reschedule your trip or take an alternative trip of the same category. However, the significance aspect is that, if you reschedule the trip, your previous credit will be given to you and you will only pay the difference amount between old and new prices if the price increases for the rescheduled departure. <br>
    
                                </p>
                            </li>
    
                            <li>
                                <h5>Flexibility on trip amendment</h5>
                                <p class="text-justify">If we will get the booking amendment request around 15 days or more prior to your original trip departure, we will make the essentials amendment with a charge of US$100 per person. But if you try to make the change during your departure as you wish, the cost of amendment may be higher depending upon the company’s policy. There will be new hotel, airline etc for new destination so your cost will be varied.
                                </p>
                            </li>
    
                            <li>
                                <h5>Visa as well as passport requirement </h5>
                                <p class="text-justify">While travelling with us you might have valid passport and have obtained the appropriate visas. You will have the at least 6 month validity in your passport. You will have on arrival Nepal visa in Nepal. For Tibet &amp; Bhutan, we will have to make some necessary arrangements upon request. For India, you can obtain the visa from your own homeland. <br>
    
                                    It is your responsibility to ensure that you are in possession of the correct visas for the countries you are traveling to. We cannot accept responsibility if you are refused entry to a country or places because you lack the correct visa documentation.
    
                                </p>
                            </li>
    
                            <li>
                                <h5>Injuries and Evacuation </h5>
                                <p class="text-justify">Nepal Vision would not be liable for any injury/health conditions/emotional or other conditions suffered by the client during the trip. Similarly, our package cost does not include any personal insurance. Hence, you are highly requested to take adequate insurance packages, including medical emergencies and evacuation by Helicopter while booking trips.
                                </p>
                            </li>
    
                            <li>
                                <h5>Unused or missed services </h5>
                                <p class="text-justify">There is not any faint chance to discount or refund your money for unused or missed services. The voluntary or involuntary termination/departure from tour, i.e. sickness, death of a family member etc, late arrival on the tour, or premature departure etc. comes under this condition.
                                </p>
                            </li>
    
                            <li>
                                <h5>Is children allow? </h5>
                                <p class="text-justify">Without any legal guardian and their perfect supervision the children below 14 is highly prohibited for trip.
                                </p>
                            </li>
    
    
                            <li>
                                <h5>Responsible policy </h5>
                                <p class="text-justify">Nepal Vision is very much conscious on responsible tourism as we are investing our efforts for the benefit of local people, tourists, environment and the tourism industry at large. We expect that you will follow all our rules and regulation based on the responsible tourism policy. Otherwise we will be compelled you to expel from our trip program.
                                </p>
                            </li>
    
                            <li>
                                <h5>The transmission of complaints </h5>
                                <p class="text-justify">Your all the productive and reasonable complaints are heartily welcome. You might have some problems and obstacle regarding the trip. You should kindly tell us. Please feel free to contact with tour leader or director of the company. So we need your direct information about problems in customer service department directly or can contact the Director of Nepal Vision. 
                                </p>
                            </li>
    
                            <li>
                                <h5>Airfare</h5>
                                <p class="text-justify">We don’t include international or other airfare unless expressly mentioned in the Tour’s descriptions. After the booking completed you will be booked your tickets yourselves or can ask us for best price. If we book your tickets, we will not be responsible for changes in air itineraries or flight times and we will not be responsible to provide advice or alerts regarding air travel tickets, flight status or delays.
                                </p>
                            </li>
    
                            <li>
                                <h5>Updating terms and condition</h5>
                                <p class="text-justify">Nepal Vision has the right to update and amend these terms and conditions at anytime. You are requested to have update with any changes. Please all our version of the change and practice can be observed in our website.
                                </p>
                            </li>
    
    
                        </ol>
                    </div>
                </div>
                </div>
            <div class="col-lg-4">
                <x-bank-detail />
            </div>
        </div>
    </div>
</section>
@include('frontend.template.tour_package')
@endsection

@push('scripts')
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {

    $("#datepicker").datepicker();

});
</script>
@endpush 
@push('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
@endpush