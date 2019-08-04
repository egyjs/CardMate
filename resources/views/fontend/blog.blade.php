@extends('fontend.master')
@section('css')
@endsection
@section('content')
    <!-- blog page content area start-->
    <div class="blog-page-conent">
        <div class="container">
            <div class="row">
                @foreach($blog as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post"><!-- single blog page -->
                        <div class="thumb">
                            <img src="{{asset($data->image)}}" alt="{{ display('blog images') }}">
                        </div>
                        <div class="content">
                            <a href="{{route('blog.details',$data->id)}}"><h4 class="title">{{$data->title}}</h4></a>
                            <div class="post-meta">
                                <span class="time"><i class="far fa-clock"></i> {{ date(' l jS F Y', strtotime($data->created_at)) }}</span>
                            </div>
                            <p>{{str_limit($data->des, 100)}} </p>
                            <a href="{{route('blog.details',$data->id)}}" class="readmore">{{ display('Read More') }}</a>
                        </div>
                    </div><!-- //. single blog page content -->
                </div>
               @endforeach
            </div>
            {{$blog->links()}}
        </div>
    </div>
    <!-- blog page content area end-->
@endsection