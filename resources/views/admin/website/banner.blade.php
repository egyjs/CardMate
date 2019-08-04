@extends('layouts.admin')
@section('page_styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endsection
@section('content')
    <div class="tile">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="caption">
                            <h2 style="text-align: center;color: white">Banner Section</h2>
                        </div>

                    </div>
                    <div class="card-body"  style='background:#eaeaea;'>
                        <div class="table-scrollable">
                            <form method="POST" action="{{route('admin.banner.updateppp')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <strong>Banner Title</strong>
                                            <input class="form-control" name="welcome_header_title" value="{{$gnl->welcome_header_title}}">
                                        </div>
                                        <div class="form-group">
                                            <strong>Banner Description</strong>
                                            <input class="form-control" name="welcome_header_des" value="{{$gnl->welcome_header_des}}">
                                        </div>
                                        <div class="form-group">

                                            <div class="fileinput-new thumbnail" >
                                                <img src="{{ asset('assets/images/banner.png') }}" alt="" style="width: 100%"/>
                                            </div>
                                            <br>
                                            <br>
                                            <input class="form-control" name="banner" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-success btn-lg btn-block">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('page_scripts')
    <script src="{{asset('assets/admin/js/bootstrap-fileinput.js')}}"></script>
@endsection