@extends('layouts.admin')
@section('page_styles')

    <script type="text/javascript" src="{{asset('assets/admin/js/nicEdit-latest.js')}}"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection
@section('content')
    <div class="tile">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="caption">
                            <h2 style="text-align: center; color: white">About Page </h2>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-scrollable">
                            <form role="form" method="POST" action="{{route('admin.about-update')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h4>Page Heading</h4>
                                    <input type="text" value="{{$gnl->about_heading}}" class="form-control" id="about_heading" name="about_heading" >
                                </div>
                                <div class="form-group">
                                    <h4>Page Details</h4>
                                    <textarea class="form-control" id="about_details" name="about_details" rows="7">{!! $gnl->about_details !!}</textarea>
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


@endsection
