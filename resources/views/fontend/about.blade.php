@extends('fontend.master')
@section('css')
@endsection
@section('content')
    <!-- about page content area start -->
    <section class="about-page-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-page-content-inner"><!-- about page content inner -->

                        {!! $gnl->about_details !!}

                    </div><!-- //.about page content inner -->
                </div>
            </div>
        </div>
    </section>
    <!-- about page content area end -->
@endsection