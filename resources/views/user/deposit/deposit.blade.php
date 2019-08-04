@extends('fontend.master')
@section('css')

@endsection
@section('content')
    <div class="blog-page-conent">
        <div class="container">
            <div class="row">
                @foreach($gateways as $gate)
                    <div class="col-md-3 col-sm-6">
                        <div class="single-blog-post"><!-- single blog page -->
                            <div class="thumb">
                                <img style="width: 100%" src="{{ asset('assets/images/gateway') }}/{{$gate->id}}.jpg" class="mx-auto d-block" alt="payment method images">
                            </div>
                            <div class="content text-center">
                                <a href="#" data-name="{{$gate->name}}" data-gate="{{$gate->id}}" data-toggle="modal" data-target="#depoModal" class="depoButton"><b class="">{{$gate->main_name}}</b><br><br></a>

                                <a href="#" data-name="{{$gate->name}}" data-gate="{{$gate->id}}" data-toggle="modal" data-target="#depoModal" class="btn btn-info btn-block depoButton">Select</a>
                            </div>
                        </div><!-- //. single blog page content -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="depoModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ModalLabel">Confirm to Buy </h4>

                    <button type="button" style="color: white" class="close" data-dismiss="modal">&times;</button>

                </div>
                <form method="post" action="{{route('deposit.data-insert')}}" >
                    @csrf
                    <div class="modal-body">


                        <div class="form-group ">
                            <label class="sr-only" for="inlineFormInputGroup"></label>
                            <div class="input-group col-md-12">
                                <input type="hidden" name="gateway" id="gateWay"/>
                                <input type="text" class="form-control" name="amount" id="inlineFormInputGroup" placeholder="Enter Amount">
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-success">Deposit Preview</button>

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){

            $(document).on('click','.depoButton', function(){
                $('#ModalLabel').text($(this).data('name'));
                $('#gateWay').val($(this).data('gate'));


            });
        });
    </script>
@endsection