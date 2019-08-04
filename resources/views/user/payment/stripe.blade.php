@extends('fontend.master')
@section('css')

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
	.credit-card-box .form-control.error {
		border-color: red;
		outline: 0;
		box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(255,0,0,0.6);
	}
	.credit-card-box label.error {
		font-weight: bold;
		color: red;
		padding: 2px 8px;
		margin-top: 2px;
	}
</style>
@endsection
@section('content')

<section class="about-page-content-area">
		<div class="container">
			<div class="sec-title text-center">
				<h2>{{$pt}}</h2>
				<div class="col-md-4 col-md-offset-8">
					@include('layouts.error')
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 offset-md-4 offset-sm-0 col-sm-12">
					<form role="form" id="payment-form" method="POST" action="{{ route('ipn.stripe')}}" >
						@csrf
						<input type="hidden" value="{{ $track }}" name="track">
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="name">CARD NAME</label>
									<div class="input-group">
										<input
										type="text"
										class="form-control input-lg"
										name="name"
										placeholder="Card Name"
										autocomplete="off" autofocus
										/>
										<span class="input-group-addon"><i class="fa fa-font"></i></span>
									</div>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="cardNumber">CARD NUMBER</label>
									<div class="input-group">
										<input
										type="tel"
										class="form-control input-lg"
										name="cardNumber"
										placeholder="Valid Card Number"
										autocomplete="off"
										required autofocus
										/>
										<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
									</div>
								</div>
							</div>
						</div>
						<br>
						
						<div class="row">
							<div class="col-xs-7 col-md-7">
								<div class="form-group">
									<label for="cardExpiry">EXPIRATION DATE</label>
									<input
									type="tel"
									class="form-control input-lg input-sz"
									name="cardExpiry"
									placeholder="MM / YYYY"
									autocomplete="off"
									required
									/>
								</div>
							</div>
							<div class="col-xs-5 col-md-5 pull-right">
								<div class="form-group">
									<label for="cardCVC">CVC CODE</label>
									<input
									type="tel"
									class="form-control input-lg input-sz"
									name="cardCVC"
									placeholder="CVC"
									autocomplete="off"
									required
									/>
								</div>
							</div>
						</div>					
						<div class="row">
							<div class="col-xs-12">
								<button class="btn btn-success btn-lg btn-block " style="background-color: #{{$gnl->color}}" type="submit"> PAY NOW </button>
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</section>
	<br>
	<br>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('assets/admin/stripe/payvalid.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/stripe/paymin.js') }}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{ asset('assets/admin/stripe/payform.js') }}"></script>
<script type="text/javascript" src="https://rawgit.com/jessepollak/card/master/dist/card.js"></script>
<script>
	(function ($) {
		$(document).ready(function () {
			var card = new Card({
				form: '#payment-form',
				container: '.card-wrapper',
				formSelectors: {
					numberInput: 'input[name="cardNumber"]',
					expiryInput: 'input[name="cardExpiry"]',
					cvcInput: 'input[name="cardCVC"]',
					nameInput: 'input[name="name"]'
				}
			});
		});
	})(jQuery);
</script>
@endsection


