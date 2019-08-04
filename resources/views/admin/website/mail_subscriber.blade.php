@extends('layouts.admin')

@section('content')

    <div class="tile">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="caption">
                            <h2 style="text-align: center; color: white">Send Email To All Subscriber </h2>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-scrollable">
                            <form role="form" method="POST" action="{{route('subcribe.mail')}}">
                                @csrf

                                <div class="form-group">
                                    <h4>Subject</h4>
                                    <input type="text" class="form-control" name="subject" >
                                </div>

                                <div class="form-group">
                                    <h4>Message</h4>
                                    <textarea class="form-control"  name="mail_des" rows="10"></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection