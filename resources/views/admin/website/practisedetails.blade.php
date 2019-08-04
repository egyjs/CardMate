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
                            <h2 style="text-align: center;color: white">Our Features Header</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-scrollable table-responsive">
                            <form role="form" method="POST" action="{{route('admin.practiseheader.submit')}}">
                                @csrf
                                <div class="form-group">
                                    <h4>Title</h4>
                                    <input type="text" value="{{$gnl->practise_header_title}}" class="form-control" id="contact_number" name="practise_header_title" >
                                </div>
                                <div class="form-group">
                                    <h4>Sort Description</h4>
                                    <textarea class="form-control" id="footer" name="practise_header_des" rows="7">{!! $gnl-> practise_header_des!!}</textarea>
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


    <br><br><br>


    <div class="tile">
        <div class="card">
            <div class="card-header bg-info">
                <div class="caption">
                    <h2 style="text-align: center; color: white">Our Features Details

                        <a class="btn btn-dark pull-right" data-toggle="modal" data-target="#newfeatures">
                            <i class="fa fa-plus"></i> New Features
                        </a>
                    </h2>
                </div>

            </div>
            <div class="card-body">
                <div class="table-scrollable">
                    <div class="row">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>
                                    Title
                                </th>

                                <th>
                                    Icon
                                </th>

                                <th width="50%">
                                    Description
                                </th>

                                <th>
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($practs as $data)
                                <tr>
                                    <td>
                                        {{$data->title}}
                                    </td>
                                    <td>
                                        <i class="fa fa-{{$data->icon}}"></i>
                                    </td>
                                    <td>
                                        {{$data->des}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.user-single', $data->id)}}" class="etdbtn" data-toggle="modal" data-target="#editfeatures{{$data->id}}" data-id="{{$data->id}}">
                                            <button class="btn btn-info">Edit</button> </a>
                                        <a href="{{route('admin.user-single', $data->id)}}" class="delbtn" data-id="{{$data->id}}" data-toggle="modal" data-target="#delModal">
                                            <button class="btn btn-danger">Delete</button> </a>
                                    </td>
                                </tr>
                                <div id="editfeatures{{$data->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">


                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Features </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                            </div>
                                            <div class="modal-body">
                                                <form role="form" method="POST" action="{{route('admin.pracdetails-update')}}" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group">
                                                        <h4>Title</h4>
                                                        <input type="hidden" name="id" value="{{$data->id}}">
                                                        <input type="text"  class="form-control" value="{{$data->title}}"  name="title" >
                                                    </div>
                                                    <div class="form-group">
                                                        <h4>Icon <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/" class="pull-right">Fontawesome Icon</a></h4>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">fa fa-</span>

                                                            </div>
                                                            <input type="text" value="{{$data->icon}}"  class="form-control"  name="icon" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h4>Description</h4>
                                                        <textarea class="form-control" id="footer" name="des" rows="4">{!! $data->des !!}</textarea>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success pull-left">Update</button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <tbody>
                        </table>
                        {{$practs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>


    <div id="newfeatures" class="modal fade" role="dialog">
        <div class="modal-dialog">


            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Features</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="{{route('admin.features.add')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <h4>Title</h4>
                            <input type="text"  class="form-control"  name="title" >
                        </div>
                        <div class="form-group">
                            <h4>Icon <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/" class="pull-right">Fontawesome Icon</a></h4>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">fa fa-</span>

                                </div>
                                <input type="text"  class="form-control"  name="icon" >
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>Description</h4>
                            <textarea class="form-control" id="footer" name="des" rows="7"></textarea>
                        </div>


                        <div class="form-group">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success pull-left">Create</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>




    <div id="delModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Features</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="{{route('admin.features.delete')}}" >
                        @csrf
                        @method('put')
                        <input type="hidden" class="delmbtm" name="delcfrm">
                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>






@endsection
@section('page_scripts')
    <script src="{{asset('assets/admin/js/bootstrap-fileinput.js')}}"></script>
    <script>
        $(document).ready(function () {

            $('.delbtn').click(function () {
                var id = $(this).data('id');
                $('.delmbtm').val(id);
            })

        })
    </script>
@endsection