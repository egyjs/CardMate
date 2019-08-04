@extends('fontend.master')

@section('content')

    <!-- blog page content area start-->
    <div class="blog-details-page-conent">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 single-blog-details-inner-wrapper">
                    <div class="single-blog-details-post text-center"><!-- single blog page -->
                        <h3 style="color: #cc0000;">{{ display('Sorry! Page Not Found') }}</h3><br>
                        <h4><a href="{{route('home')}}"><button class="btn btn-info ">{{ display('Back to Home')}}</button></a></h4>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- blog page content area end-->

@endsection