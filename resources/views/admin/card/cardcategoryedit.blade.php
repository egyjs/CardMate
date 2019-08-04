@extends('layouts.admin')
@section('page_styles')
    <script type="text/javascript" src="{{asset('assets/admin/js/nicEdit-latest.js')}}"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection
@section('content')
    <div class="tile">
        <div class="row">
            <div class="col-md-12">


                <form role="form" method="POST" action="{{route('admin.catagoryupdate')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <h4>Card Category Name</h4>
                        <input type="hidden" name="id" value="{{$editcat->id}}">
                        <input type="text" value="{{$editcat->cat_name}}" class="form-control" id="contact_number" name="cat_name" >
                    </div>



                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Update</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
@endsection
