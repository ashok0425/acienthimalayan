@extends('frontend.layout.master') 
@section('content')
<section class="pay">
	<div class="container">
		<div class="row my-5">
			<div class="text-center custom-text-primary">
				<h2 class="custom-fs-18"> Hi, {{ $name }}</h2>
			</div>
			<div class="col-12 col-md-6 offset-md-3">
				<div class="card card-pay-info">
					<div class="card-header">
						Confirm the following data
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
						      <tr>
						        <th>Product <i class="fa fa-caret-right"></i> </th>
						        <th>{{ $productName }}</th>
						      </tr>
						      <tr>
						        <th>Amount <i class="fa fa-caret-right"></i> </th>
						        <th>USD {{ $amount }} (including 4% service charge)</th>
						      </tr>
						    </thead>
						</table>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-4 offset-md-4 text-center">
				
				<form method="post" action="https://hblpgw.2c2p.com/HBLPGW/Payment/Payment/Payment">
					<input type="hidden" name="paymentGatewayID" value="9103334694" />
					
					<input type="hidden" name="invoiceNo" value="Invoice{{ $invoiceNo }}" />
					<input type="hidden" name="productDesc" value="{{ $productName }}" />
					<input type="hidden" name="amount" value="{{ sprintf("%012d", $amount*100) }}" />
					
					<input type="hidden" name="currencyCode" value="840" />
					<input type="hidden" name="nonSecure" value="Y" />
					
			<input type="hidden" name="userDefined4" value="{{ $productName }}" />
			

					<input type="hidden" name="hashValue" value="{{ urlencode(strtoupper(hash_hmac('SHA256', '9103332474Invoice'.$invoiceNo .sprintf("%012d", $amount*100).'840Y','7SK8PW3EYMFIW5JMVNFORMF4MM0QNZ42', false))) }}" />
					<div class="form-group mt-3">
						<input type="checkbox" name="agree"  class="agree" checked="checked" value="I have agreed" required /> &nbsp; I have agreed <a href="#" target="_blank">terms & condition </a></div>
					<div class="form-group text-center">
						<button type="submit"  class="btn btn-success d-block px-5 w-100 mt-3 btn-block">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection


