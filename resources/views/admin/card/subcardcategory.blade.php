@extends('layouts.admin')
@section('page_styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endsection
@section('content')






    <div class="tile">
        <div class="card success">
            <div class="card-header bg-info">

                <h2 style="color: #fff; text-transform: uppercase;">Card subcategory

                    <a class="btn btn-dark pull-right" data-toggle="modal" data-target="#cardcategory">
                        <i class="fa fa-plus"></i> New subCategory
                    </a>
                </h2>


            </div>
            <div class="card-body">
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Sub Category Name </th>
                            <th width="20%">Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subcat as $cat)
                            <tr>
                                <td>
                                    {{$cat->sub_cat->cat_name}}
                                </td>
                                <td>
                                    {{$cat->name}}
                                </td>
                                <td>
                                    {{$cat->price}} {{$gnl->cur}}
                                </td>
                                <td>
                                    @if($cat->status == 1)
                                        <label class="badge badge-success">ACTIVE</label>
                                    @else
                                        <label class="badge badge-danger">INACTIVE</label>
                                    @endif
                                </td>


                                <td>
                                    <button class="btn btn-info etdbtn" data-toggle="modal" data-target="#editfeatures{{$cat->id}}" data-id="{{$cat->id}}">Edit</button>



                                    <div id="editfeatures{{$cat->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">


                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Category </h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="{{route('admin.subcatagoryupdate', $cat->id)}}">
                                                        @csrf
                                                        <div class="modal-body">


                                                            <div class="form-group">
                                                                <strong>Select Category</strong>
                                                                <select class="form-control" name="cat_id">
                                                                    @foreach($cate as $data)
                                                                        <option {{ $cat->cat_id == $data->id ? 'selected':'' }} value="{{$data->id}}">{{$data->cat_name}}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                            <div class="form-group">
                                                                <strong>Sub Category Name</strong>
                                                                <input type="text"  class="form-control" value="{{$cat->name}}" name="name" placeholder="Name" >
                                                            </div>

                                                            <div class="form-group">
                                                                <strong>Card Price</strong>
                                                                <div class="input-group">
                                                                    <input class="form-control" name="price" value="{{$cat->price}}" type="text" placeholder="Price">
                                                                    <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                    {{$gnl->cur}}
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <strong>Category Status</strong>
                                                                <select name="status" class="form-control">
                                                                    <option {{$cat->status == 1? 'selected':''}} value="1" selected>ACTIVE</option>
                                                                    <option {{$cat->status == 0? 'selected':''}} value="0">INACTIVE</option>
                                                                </select>
                                                            </div>

                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success ">Update</button>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                        <tbody>
                    </table>
                    {{$subcat->links()}}
                </div>
            </div>
        </div>
    </div>






    <div id="cardcategory" class="modal fade" role="dialog">
        <div class="modal-dialog">


            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Subcategory</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>


                <div class="modal-body">
                    <form role="form" method="POST" action="{{route('admin.subcategory.store')}}">
                        @csrf
                        <div class="modal-body">


                            <div class="form-group">
                                <strong>Select Category</strong>
                                <select class="form-control" name="cat_id">
                                    @foreach($cate as $data)
                                        <option value="{{$data->id}}">{{$data->cat_name}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <strong>Sub Category Name</strong>
                                <input type="text"  class="form-control" name="name" placeholder="Name" >
                            </div>

                            <div class="form-group">
                                <strong>Card Price</strong>
                                <div class="input-group">
                                    <input class="form-control" name="price" type="text" placeholder="Price">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        {{$gnl->cur}}
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success ">Create</button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('page_scripts')

    <script>
        $(document).ready(function () {



            $('.catdelete').click(function (e) {
                e.preventDefault();
                $('#deletecat').modal('show');
                var id = $(this).data('id');
                $('.delid').val(id);
            })

        })
    </script>

@endsection