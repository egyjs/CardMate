@extends('layouts.admin')

@section('content')
    <div class="tile">
        <div class="tile-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="caption">
                            <h2 style="text-align: center;color: white">Faq Header</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-scrollable table-responsive">
                            <form role="form" method="POST" action="{{route('admin.faq.submit')}}">
                                @csrf
                                <div class="form-group">
                                    <h4>Title</h4>

                                    <input type="text" value="{{$gnl->faq_title}}" class="form-control"
                                           id="contact_number" name="faq_title">
                                </div>
                                <div class="form-group">
                                    <h4>Detail</h4>

                                    <input type="text" value="{{$gnl->faq_des}}" class="form-control"
                                           id="contact_number" name="faq_des">
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
    <br><br>
    <div class="tile">
        <div class="tile-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="caption">
                            <h2 style="text-align: center; color: white">Faq Details
                            <a class="btn btn-dark pull-right" href="#addfeatures" data-toggle="modal"><i class="fa fa-plus"></i>Add New</a>
                            </h2>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-scrollable table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        Title
                                    </th>


                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($faq as $data)
                                    <tr>
                                        <td>
                                            {{$data->title}}
                                        </td>

                    
                                        <td>
                                            <a href="{{route('admin.user-single', $data->id)}}" class="etdbtn" data-toggle="modal" data-target="#editfeatures{{$data->id}}" data-id="{{$data->id}}">
                                                <button class="btn btn-info">Edit</button> </a>
                                            <a href="{{route('admin.user-single', $data->id)}}" class="delbtn" data-id="{{$data->id}}" data-toggle="modal" data-target="#delModal">
                                                <button class="btn btn-danger">Delete</button> </a>
                                      
                                    <div id="editfeatures{{$data->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                           
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Faq Update </h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="{{route('admin.faq-update')}}" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="form-group">
                                                            <h4>Title</h4>
                                                            <input type="hidden" name="id" value="{{$data->id}}">
                                                            <input type="text"  class="form-control" value="{{$data->title}}"  name="title" >
                                                        </div>
        

                                                        <div class="form-group">
                                                            <h4>Description</h4>
                                                            <textarea class="form-control" id="footer" name="sortdes" rows="7">{!! $data->sortdes !!}</textarea>
                                                        </div>

                                                        <div class="form-group">

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
        </div>
        </div>
    </div>

    <div id="addfeatures" class="modal fade" role="dialog">
        <div class="modal-dialog">


            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Faq Create </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="{{route('admin.faq-store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <h4>Title</h4>
                            <input type="text"  class="form-control" name="title" >
                        </div>


                        <div class="form-group">
                            <h4>Description</h4>
                            <textarea class="form-control"  name="sortdes" rows="4"></textarea>
                        </div>

                        <div class="form-group">

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
    <div id="delModal" class="modal fade" role="dialog">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Delete Features</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div>
               <div class="modal-body">
                   <form role="form" method="POST" action="{{route('admin.faq.delete')}}" >
                       @csrf 
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