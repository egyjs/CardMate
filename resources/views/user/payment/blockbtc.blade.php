@extends('fontend.master')
@section('css')

@endsection
@section('content')

	<!-- about page content area start -->
	<section class="about-page-content-area">
		<div class="container">
			<div class="row">
				<div class="col-md-4 offset-md-4 offset-sm-0 col-sm-12">

					@include('layouts.error')
					<div class="panel panel-primary">
						<div class="panel-body text-center">

							<h6> PLEASE SEND EXACTLY <span style="color: green"> {{ $bcoin }}</span> BTC</h6>
							<h5>TO <span style="color: green;font-size: 15px;"> {{ $wallet}}</span></h5>
							{!! $qrurl !!}
							<h4 style="font-weight:bold;">SCAN TO SEND</h4>
						</div>
					</div>


				</div>
			</div>
		</div>
	</section>
	<!-- about page content area end -->
@endsection