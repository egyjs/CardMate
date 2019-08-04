@extends('layouts.admin')

@section('content')
    <div class="tile">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="caption">
                            <h2 style="text-align: center; color: white">Contact Setting</h2>
                        </div>

                    </div>
                    <div class="card-body">
                            <form role="form" method="POST" action="{{route('admin.contact.update')}}">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control input-lg" value="{{$general->website_number}}" name="website_number" >
                                    </div>

                                    <div class="col-md-6">
                                        <label>Email Address</label>
                                        <input type="text" class="form-control input-lg" value="{{$general->website_email_address}}" name="website_email_address" >
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <input type="text" class="form-control input-lg" value="{{$general->website_address}}" name="website_address" >
                                    </div>

                             
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr/>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-success btn-block ">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
