<style>
    
.subscribe {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
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
	max-width: 450px;
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
	width: 431px;
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
	width: 244px;
	border-radius: 5px;
	font-size: 18px;
	color: white;
	box-shadow: 0 4px 20px rgb(42, 135, 183);
}

.form__button:hover {
	box-shadow: 0 10px 20px rgb(42, 135, 183);
}

.notice {
	width: 345px;
    margin: auto
}

</style>
<div class="container-fluid mt-4">
<div class="subscribe py-4">
	<h2 class="subscribe__title custom-text-primary">Let's keep in touch</h2>
	<p class="subscribe__copy">Subscribe to keep up with fresh news and exciting updates. We promise not to spam you!</p>
    <form action="{{ route('subscribe.store') }}" method="POST">
        @csrf
	<div class="form">
		<input type="email" class="form__email" placeholder="Enter your email address" required name="email"/>
		<button class="form__button" type="submit">Send</button>
	</div>
	<div class="notice text-center">
		<input type="checkbox">
		<span class="notice__copy ">I agree to my email address being stored and uses to recieve  newsletter.</span>
	</div>
</form>
</div>
</div>