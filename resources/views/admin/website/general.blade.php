@extends('layouts.admin')

@section('content')
<div class="tile">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-info">
					<div class="caption">
						<h2 style="text-align: center; color: white">General Setting</h2>
					</div>

				</div>
				<div class="card-body">
					<div class="table-scrollable">
			<form role="form" method="POST" action="{{route('admin.gnlupdate')}}">
				@csrf
				<div class="row">
					<div class="col-md-4">
						<label>Website Title</label>
						<input type="text" class="form-control input-lg" value="{{$general->title}}" name="title" >
					</div>
					<div class="col-md-4">
						<label>Website Sub-Title</label>
						<input type="text" class="form-control input-lg" value="{{$general->subtitle}}" name="subtitle" >
					</div>

					<div class="col-md-2">
						<label>BASE CURRENCY CODE</label>
						<input type="text" class="form-control input-lg" value="{{$general->cur}}" name="cur" >
					</div>
					<div class="col-md-2">
						<label>BASE CURRENCY SYMBOL</label>
						<input type="text" class="form-control input-lg" value="{{$general->cursym}}" name="cursym" >
					</div>

				</div>
				<div class="row">
					<div class="col-md-12">
						<hr/>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label>Registration</label>
						<div class="toggle lg">
							<label>
								<input type="checkbox" value="1" name="reg" {{ $general->reg == "1" ? 'checked' : '' }}><span class="button-indecator"></span>
							</label>
						</div>
					</div>
					
					<div class="col-md-3">
						<label>EMAIL VERIFICATION</label>
						<div class="toggle lg">
								<label>
									<input type="checkbox" value="1" name="emailver" {{ $general->emailver == "0" ? 'checked' : '' }}><span class="button-indecator"></span>
								</label>
							</div>
					</div>
					<div class="col-md-2">
						<label>SMS VERIFICATION</label>
						<div class="toggle lg">
								<label>
									<input type="checkbox" value="1" name="smsver"  {{ $general->smsver == "0" ? 'checked' : '' }}><span class="button-indecator"></span>
								</label>
							</div>
					</div>
					<div class="col-md-2">
						<label>EMAIL NOTIFY</label>
						<div class="toggle lg">
								<label>
									<input type="checkbox" value="1" name="emailnotf"  {{ $general->emailnotf == "1" ? 'checked' : '' }}><span class="button-indecator"></span>
								</label>
							</div>
					</div>
					<div class="col-md-2">
						<label>SMS NOTIFY</label>
						<div class="toggle lg">
								<label>
									<input type="checkbox"  value="1" name="smsnotf" {{ $general->smsnotf == "1" ? 'checked' : '' }}><span class="button-indecator"></span>
								</label>
							</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<hr/>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-success btn-block btn-lg">Update</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
		</div>
	</div>
</div>

@endsection
