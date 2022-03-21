<style>
    
.subscribe {
	background: white;
	border-radius: 10px;
	box-shadow: 0 4px 20px rgba(61, 159, 255, 0.2)
    
}


.subscribe__title {
	font-weight: bold;
	font-size: 26px;
	margin-bottom: 18px;
}

.subscribe__copy {
	text-align: center;
	margin-bottom: 33px;
	line-height: 1.5;
}

.form {
	margin-bottom: 15px;
}

.form__email {
	padding: 10px 25px;
	border-radius: 5px;
 	border: 1px solid #CAD3DB;
	font-size: 18px;
	color: rgb(42, 135, 183);
}

.form__email:focus {
	outline: 1px solid rgb(42, 135, 183);
}

.form__button {
	background: #3D9FFF;
	padding: 10px;
	border: none;
	border-radius: 5px;
	font-size: 18px;
	color: white;
	box-shadow: 0 4px 20px rgb(42, 135, 183);
}

.form__button:hover {
	box-shadow: 0 10px 20px rgb(42, 135, 183);
}



</style>
<div class="subscribe container-fluid mt-4 py-4">
	<div class="row">
	<h2 class="subscribe__title custom-text-primary col-md-4 offset-md-4 text-center">Let's keep in touch</h2>
	<p class="subscribe__copy col-md-4 offset-md-4 text-center">Subscribe to keep up with fresh news and exciting updates. We promise not to spam you!</p>
</div>
    <form action="{{ route('subscribe.store') }}" method="POST">
        @csrf
	<div class="form">
		<div class="row">
			<div class="col-md-5 offset-md-3 my-1">
				
		<input type="email" class="form__email w-100" placeholder="Enter your email address" required name="email"/>
	</div>
	<div class="col-md-2 my-1">
		<button class="form__button w-100" type="submit">Send</button>
	</div>

	</div>
</div>
<div class="row">
	<div class="notice col-md-4 text-center offset-md-4 ">
		<input type="checkbox">
		<span class="notice__copy ">I agree to my email address being stored and uses to recieve  newsletter.</span>
	</div>
</div>
</form>
</div>