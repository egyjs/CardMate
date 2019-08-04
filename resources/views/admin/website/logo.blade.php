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
                            <h2 style="text-align: center">Logo & icon</h2>
                        </div>

                    </div>
                    <div class="card-body"  style='background:#eaeaea;'>
                        <div class="table-scrollable">
                            <form method="POST" action="{{route('admin.logoupdate')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" >
                                                    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="" style="width: 100%"/>
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" > </div>
                                                <div>
                    <span class="btn btn-success btn-file">
                        <span class="fileinput-new"> Change Logo </span>
                        <span class="fileinput-exists"> Change </span>
                        <input type="file" name="logo"> </span>
                                                    <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" >
                                                    <img src="{{ asset('assets/images/logo/icon.png') }}" alt="" style="width: 100%"/> </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" > </div>
                                                <div>
                            <span class="btn btn-success btn-file">
                                <span class="fileinput-new"> Change Icon </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="file" name="icon"> </span>
                                                    <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
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