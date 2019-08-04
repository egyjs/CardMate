@extends('fontend.master')
@section('css')

@endsection
@section('content')
    <!-- testimonial page content area start-->

    <div class="blog-page-conent">
        <div class="container">
            <div class="row">
                @foreach($category as $cat)
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post"><!-- single blog page -->
                        <div class="thumb">
                            <img src="{{asset($cat->image)}}" alt="card banner images">
                        </div>
                        <div class="content text-center">
                            <a href="{{route('category.card',$cat->id)}}"><h4 class="title">{{$cat->cat_name}}</h4></a>

                            <a href="{{route('category.card',$cat->id)}}" class="btn btn-info btn-block">Select</a>
                        </div>
                    </div><!-- //. single blog page content -->
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- testimonial page content area end-->
@endsection