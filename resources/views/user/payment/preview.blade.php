@extends('layouts.user')

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
            <div class="col-md-6 col-md-offset-3 offset-sm-0 col-sm-12">
                <form  class="contact-form" method="POST" action="{{ route('deposit.confirm') }}">
                    @csrf
                    <input type="hidden" name="gateway" value="{{$data->gateway_id}}"/>
                    <div class="panel">
                        <div class="panel-body">
                            <ul class="list-group text-center">
                                <li class="list-group-item"><img src="{{asset('assets/images/gateway')}}/{{$data->gateway_id}}.jpg" style="max-width:100px; max-height:100px; margin:0 auto;"/></li>
                                <li class="list-group-item">Amount: <strong>{{$data->amount}} {{$gnl->cur}}</strong></li>
                                <li class="list-group-item">Charge: <strong>{{$data->charge}} {{$gnl->cur}}</strong></li>
                                <li class="list-group-item">Payable: <strong>{{$data->charge + $data->amount}} {{$gnl->cur}}</strong></li>
                                <li class="list-group-item">In USD: <strong>${{$data->usd_amo}}</strong></li>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-success btn-block">
                                Pay Now
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
