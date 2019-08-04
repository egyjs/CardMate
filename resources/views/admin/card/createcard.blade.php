@extends('layouts.admin')
@section('page_styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endsection
@section('content')

    <div class="tile">
        <div class="card success col-md-6 offset-3">
            <br>
            <div class="card-header bg-info">
                <h2 style="color: #fff; text-transform: uppercase;">Create Card </h2>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="{{route('admin.card.store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <strong>Select Sub-Category</strong>
                            <select class="form-control" name="category_id">
                                @foreach($cardcategory as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}} (Cat Name: {{$cat->sub_cat->cat_name}})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <strong>Card Image (OPTIONAL And It will be hidden for Unpaid User)  </strong>
                            <input type="file"  class="form-control" id="name" name="card_image">
                        </div>

                        <div class="form-group">
                            <strong>Card Details</strong>
                            <textarea  class="form-control" id="val1" rows="3" name="card_details"></textarea>
                        </div>


                    <div class="modal-footer">

                        <button type="submit" class="btn btn-success btn-block">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
@section('page_scripts')
    <script src="{{asset('assets/admin/js/bootstrap-fileinput.js')}}"></script>
@endsection