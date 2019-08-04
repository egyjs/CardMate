@extends('layouts.admin')

@section('content')
    <div class="tile">
        <div class="tile-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="caption">
                                <h2 style="text-align: center;color: white">Static Header</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-scrollable table-responsive">
                                <form role="form" method="POST" action="{{route('admin.static.head')}}">
                                    @csrf
                                    <div class="form-group">
                                        <h4>Title</h4>

                                        <input type="text" value="{{$gnl->static_head}}" class="form-control"
                                               id="contact_number" name="static_head">
                                    </div>
                                    <div class="form-group">
                                        <h4>Detail</h4>

                                        <input type="text" value="{{$gnl->static_des}}" class="form-control"
                                               id="contact_number" name="static_des">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="tile">
        <div class="card">
            <div class="card-header bg-info">
                <div class="caption">
                    <h2 style="text-align: center; color: white">Static Section</h2>
                </div>

            </div>
            <div class="card-body">
                <div class="row">
                    @php $sl = 1; @endphp
                    @foreach($stt as $slide)

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header text-center">
                                    Serial No: <strong>{{$sl}}</strong>

                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{route('admin.staticupdate',$slide->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        <div class="form-group">
                                            <h4>Title</h4>
                                            <input type="text" value="{{$slide->title}}" class="form-control"  name="title" >
                                        </div>
                                        <div class="form-group">
                                            <h4>Amount</h4>
                                            <input type="text" value="{{$slide->amount}}" class="form-control"  name="amount" >
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-block">Update</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        @php $sl = $sl+1; @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>



@endsection
