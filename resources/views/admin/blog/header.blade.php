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
                            <h2 style="text-align: center; color: white">Blog Header</h2>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-scrollable">
                <form role="form" method="POST" action="{{route('admin.blog.head.save')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <h4>Footer Section Content</h4>
                        <input class="form-control" id="footer" value="{{$blog_he->blog_titme}}" name="blog_titme" >

                    </div>


                    <div class="form-group">
                        <h4>Footer Section Content</h4>
                        <textarea class="form-control" id="footer"  name="blog_des" rows="7">
                    {!! $blog_he->blog_des!!}
                    </textarea>
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
