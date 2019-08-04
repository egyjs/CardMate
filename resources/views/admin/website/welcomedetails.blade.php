@extends('layouts.admin')
@section('page_styles')

@endsection
@section('content')

    <div class="tile">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="caption">
                            <h2 style="text-align: center;color: white">Video Section Details</h2>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-scrollable">

                <form role="form" method="POST" action="{{route('admin.welcomedetails.submit')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <h4>Title</h4>

                        <input type="text" value="{{$gnl->welcome_details_title}}" class="form-control" id="contact_number" name="welcome_details_title" >
                    </div>

                    <div class="form-group">
                        <h4>Sort Description</h4>
                        <textarea class="form-control" id="footer" name="welcome_details_des" rows="7">{{$gnl->welcome_details_des}}</textarea>
                    </div>
                    <div class="form-group">
                        <h4>Youtube Video Url</h4>
                        <input type="text" value="{{$gnl->welcome_details_youtube}}" class="form-control" id="contact_number" name="welcome_details_youtube" >
                    </div>


                    <div class="form-group">
                        <h4>Background Image</h4>

                        <img src="{{asset('assets/images/video_bg.jpg')}}" > <br><br>

                        <input type="file" class="form-control" name="video_image" >
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

        </div>
    </div>
@endsection
