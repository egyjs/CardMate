@extends('fontend.master')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('content')

    <section class="about-us-aera about-page" style="padding-top: 50px">
        <div class="container">
            <div class="row">



                <div class="col-lg-12 ">
                    <div class="tile">
                        <div class="panel-group">
                            <form action="{{route('user.deposit.confrim')}}" method="post">
                                @csrf
                            <div class="panel panel-default">
                                <div class="panel-heading" style="text-align: center; font-size: 20px">{{$data->gateway->name}}</div>
                                <div class="panel-body">


                                        <div class="card-body ">
                                            <div class="form-group">
                                                <ul style="margin: 0px; padding: 0px; text-align: center;">
                                                    <li class="list-group-item">{{display('Amount')}}: <strong>{{$data->amount}} {{$gnl->cur}}</strong></li>
                                                    <li class="list-group-item">{{display('Charge')}}: <strong>{{$data->charge}} {{$gnl->cur}}</strong></li>
                                                    <li class="list-group-item">{{display('Payable')}}: <strong>{{$data->charge + $data->amount}} {{$gnl->cur}}</strong></li>
                                                    <li class="list-group-item">{{display('In USD')}}: <strong>${{$data->usd_amo}}</strong></li>
                                                </ul>
                                            </div>

                                        </div>


                                </div>
                                <div class="form-group" >
                                     <button class="btn btn-info col-md-12" ><i class="fas fa-check-circle"></i>{{display('Deposit Now')}}</button>
                                </div>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br>
        <br>


@endsection
@section('js')
    <script src="{{asset('assets/admin/js/bootstrap-fileinput.js')}}"></script>
    <script>
        $(document).ready(function(){

            $(document).on('click','.depoButton', function(){
                $('#ModalLabel').text($(this).data('name'));
                $('#gateWay').val($(this).data('gate'));


            });
        });
    </script>
@endsection