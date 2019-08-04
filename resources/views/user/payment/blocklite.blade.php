@extends('fontend.master')
@section('css')
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
						<div class="panel panel-primary">
							<div class="panel-body text-center">
						
						<div class="panel panel-primary">
							<div class="panel-body text-center">
								<h6> PLEASE SEND EXACTLY <span style="color: green"> {{ $bcoin }}</span> LITECOIN</h6>
								<h5>TO <span style="color: green;font-size: 15px;"> {{ $wallet}}</span></h5>
								{!! $qrurl !!}
								<h4 style="font-weight:bold;">SCAN TO SEND</h4>
							</div>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>
@endsection