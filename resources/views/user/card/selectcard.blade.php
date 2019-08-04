@extends('fontend.master')
@section('css')
<style>
    .faq-area .left-content-wrapper .card .card-header a:after{
        display: none;
    }
</style>
@endsection
@section('content')
    <section class="faq-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title extra">
                        <h2 class="title">{{$pt}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    @include('layouts.error')
                    <div class="left-content-wrapper"><!-- left content wrapper -->
                        <div id="accordion">
                            <div class="row">
                                @foreach($card as $cad)
                                    <div class="card col-md-6">
                                        <div class="card-header text-center">
                                            <a data-toggle="modal" href="#modal{{$cad->id}}">
                                                <h4>{{$cad->name}}</h4>
                                                Price: {{$gnl->cursym}} {{$cad->price}}
                                            </a>
                                        </div>
                                    </div>


                                    <div id="modal{{$cad->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Confirm Buy</h4>
                                                </div>
                                                <form method="post" action="{{route('card.view', $cad->id)}}">
                                                    @csrf
                                                    <div class="modal-body text-center">
                                                        <h4 class="text-success">Available Quantity {{\App\card::where('sub_category_id', $cad->id)->where('user_id',0)->count()}}</h4>
                                                        <br>
                                                        <div class="form-group">
                                                            <strong class="col-md-12">Your Buying Quantity</strong>
                                                            <input class="form-control" type="number" name="qty" >
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer" >
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Confirm</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                        </div>


                                @endforeach
                            </div>
                        </div>
                    </div><!-- //.left content wrapper -->
                </div>



            </div>
        </div>
    </section>
@endsection