@extends('layouts.admin')
@section('page_styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endsection
@section('content')

    <div class="tile">
        <div class="card success col-md-6 offset-3">
            <br>
            <div class="card-header bg-info">
                <h2 style="color: #fff; text-transform: uppercase;"> Card List</h2>
            </div>
            <div class="card-body">
                <form role="form" method="GET" action="{{route('admin.card.search')}}">

                        <div class="form-group">
                            <strong>Select Category For Search Card</strong>
                            <select class="form-control" name="category_id">
                                @foreach($cat as $data)
                                    <option value="{{$data->id}}">{{$data->cat_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <strong>Select Sub-Category For Search Card</strong>
                            <select class="form-control" name="sub_cate_id">
                                @foreach($sub_cat as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-block">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    @if(isset($card))

    <div class="tile">
        <div class="card success">
            <div class="card-header bg-info">

                <h2 style="color: #fff; text-transform: uppercase;">Card List </h2>


            </div>
            <div class="card-body">
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Card-Id</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($card as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                
                                <td>
                                    @if($cat->user_id == 0)
                                        No User Bought
                                    @else
                                    
                                    @php $user_name = App\User::find($cat->user_id) ; @endphp
                                       @if(isset($user_name))
                                       <a href="{{url('admin/user/'.$user_name->id)}}">{{ $user_name->name  }}</a>
                                       @endif
                                    @endif
                                    
                                </td>
                                <td>
                                    @if($cat->user_id == 0)
                                        <label class="badge badge-success">available</label>
                                    @else
                                        <label class="badge badge-danger">sold</label>
                                    @endif
                                </td>


                                <td>
                                    @if($cat->user_id == 0)
                                        <button class="btn btn-info etdbtn" data-toggle="modal" data-target="#editfeatures{{$cat->id}}" data-id="{{$cat->id}}">Edit</button>
                                    @else

                                    @endif
                                    

                                    <div id="editfeatures{{$cat->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">


                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Card </h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="{{route('admin.cardupdate', $cat->id)}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <strong>Select Sub-Category</strong>
                                                                <select class="form-control" name="category_id">
                                                                    @foreach($sub_cat  as $data)
                                                                        <option {{ $cat->sub_category_id == $data->id ? 'selected':''}} value="{{$data->id}}">{{$data->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <strong>Card Image (OPTIONAL And It will be hidden for Unpaid User)  </strong>
                                                                <br>
                                                                <br>
                                                                @if($cat->card_image != '')
                                                                    <img style="width: 250px;" src="{{asset('assets/images/cardimage/'.$cat->card_image)}}">
                                                                @endif
                                                                <br>
                                                                <br>
                                                                <input type="file"  class="form-control"  name="card_image">
                                                            </div>

                                                            <div class="form-group">
                                                                <strong>Card Details</strong>
                                                                <textarea  class="form-control" id="val1" rows="3" name="card_details">{{$cat->card_details}}</textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <strong>Status</strong>
                                                                <select name="status" class="form-control">
                                                                    <option {{$cat->status == 1? 'selected':''}} value="1">available</option>
                                                                    <option {{$cat->status == 0? 'selected':''}} value="0">sold</option>
                                                                </select>
                                                            </div>


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


                                </td>
                            </tr>

                        @endforeach
                        <tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

@endif


@endsection
@section('page_scripts')
    <script src="{{asset('assets/admin/js/bootstrap-fileinput.js')}}"></script>
@endsection