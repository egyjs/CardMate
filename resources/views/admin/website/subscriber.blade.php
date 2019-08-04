@extends('layouts.admin')

@section('content')

    <div class="tile">
        <div class="tile-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="caption">
                                <h2 style="text-align: center;color: white">Subscriber Header</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-scrollable table-responsive">
                                <form role="form" method="POST" action="{{route('admin.subscrive.submit')}}">
                                    @csrf
                                    <div class="form-group">
                                        <h4>Title</h4>

                                        <input type="text" value="{{$gnl->subs_title}}" class="form-control"
                                               id="contact_number" name="subs_title">
                                    </div>
                                    <div class="form-group">
                                        <h4>Detail</h4>

                                        <input type="text" value="{{$gnl->subs_des}}" class="form-control"
                                               id="contact_number" name="subs_des">
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
                    <h2 style="text-align: center; color: white">Subscribers</h2>
                </div>

            </div>
            <div class="card-body">
                <div class="table-scrollable table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>
                                Serial
                            </th>
                            <th>
                                Email
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subs as $key => $user)
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>

                            </tr>
                        @endforeach
                        <tbody>
                    </table>
                    {{$subs->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection