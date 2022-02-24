@extends('frontend.layout.master') 
@section('content')
<section class="pay">
	<div class="container">
		<div class="row">
     
			
			<div class="col-md-8">
                <div class="card-header">
                    <h2 class="cart-title custom-text-primary">Payment Information</h2>
                </div>
			<div class="card">
                <div class="card-body">
                    <form action="{{ route('booking.confirmation') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            
                                <div class="col-md-6 my-3">
                                            <label class="custom-fs-18 custom-text-primary" for="productName">Product Name</label>
                                           
                                            <div class="form-control">{{ $package->name }}</div>
                                            <input type="hidden" name="productName" value="{{ $package->name }}" class="form-control" >
          
                                </div>
                                <div class="col-md-6 my-3">
                                      
                                            <label class="custom-fs-18 custom-text-primary" for="name">Your Name</label>
                                            <input type="text" placeholder="Enter Your Name" id="name" class="form-control" name="name">
                                    </div>
        
                            <div class="col-md-6 my-3">
                                            <label class="custom-fs-18 custom-text-primary" for="email">Your Email</label>
                                            <input type="email" placeholder="Enter Your Email" id="email" class="form-control" name="email">
                                    </div>

                                <div class="col-md-6 my-3">
                                            <label class="custom-fs-18 custom-text-primary" for="amountToPay">Amount You Would Like To Pay</label>
                                            <input type="number" placeholder="Enter Amount You Want To Pay" id="amountToPay" class="form-control" name="amount" min="1">
                                </div>

                        <div class="col-md-12">	
                         
                                            <div class="alert alert-info">
                                                <span>Note:</span> All payments made via Card is subject to 4% Service Charge. Service Charge applys to all payments: deposits, final balances, trip extensions and miscellaneous purchases. Your card will be processed by Himalayan Bank Limited securely
                                            </div>
                                </div>
                                <div class="form-group ">
                                            <button type="submit" class="btn btn-success d-block btn-block form-control">Next</button>
                                        </div>
                    </div>

                </form>
                </div>
            </div>
        </div>


			<div class="col-md-4 ">
				<div class="card">
					<div class="card-header">
						Physical Address
					</div>
					<div class="card-body">
						<ul class="bulleted">
							<li><span>Nepal Vision Treks & Expedition Pvt Ltd</span></li>
							<li><span>Thamel, Bhagwan Bahal, Kathmandu, Nepal</span></li>
							<li><span>Phone:</span> 977-1-4424762</li>
						
							<li><span>Working hours:</span> 24/7</li>
							<li><span>Fax:</span> 977-1-4423296</li>
							<li><span>Email:</span>sales@nepalvisiontreks.com <br> info@nepalvisiontreks.com</li>
							<li><span>Webpage:</span> www.nepalvisiontreks.com</li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="col-md-6  my-3">
			<div class="card tab-content-card">
						<div class="card-body">
							<p> 1. Payment by wire transfer</p>
							<span>Beneficiary Bank:- Nabil Bank Ltd.<br>
								Beneficiary Company:- Nepal Vision Treks & Expedition (P). Ltd.<br>
								Account No. :- 0102211820301<br>
								Account Type :- Current Account<br><br>
								Bank Address<br>
								Nabil House, Kamaladi, Kathmandu<br>
								P.O. Box: 3729, Kathmandu<br>
								SWIFT: NARBNPKA<br>
							Web Address: www.nabilbank.com </span>
						</div>
					</div>
				</div>
					<div class="my-3 col-md-6 ">
					<div class="card tab-content-card">
						<div class="card-body">
							<p> 2. Payment by wire transfer</p>
							<span>Beneficiary Bank:- Himalayan Bank Ltd.<br>
							Beneficiary Company:- Nepal Vision Treks & Expedition (P). Ltd.<br>
							Account No. :- 01900041700038<br>
							Account Type :- Current Account<br><br>
							Bank Address<br>

							Sanchaya Kosh Building, Tridevimarga<br>
							P.O. Box: 20590, Thamel, Kathmandu<br>
							SWIFT: HIMANPKA<br>
							Web Address: www.himalayanbank.com</span>

						</div>
					</div>
				</div>
		</div>
	</div>
</section>
@endsection
