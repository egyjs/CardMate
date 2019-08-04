@extends('fontend.master')
@section('css')

@endsection
@section('content')
    <!-- service area start -->
    <section class="service-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title extra">
                        <h2 class="title">{{ display($gnl->practise_header_title) }}</h2>
                        <p>{!! display($gnl->practise_header_des) !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($practs as $pc)

                <div class="col-lg-6 col-md-6">
                    <div class="single-service-item"><!-- single service item -->
                        <div class="icon">
                            <i style="font-size: 30px;" class="fa fa-{{$pc->icon}}"></i>

                        </div>
                        <div class="content">
                            <h4 class="title">{{display($pc->title)}}</h4>
                            <p>{{display($pc->des)}}</p>
                        </div>
                    </div><!-- //. single service item -->
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- service area end -->

    <!-- video area start -->
    <section class="video-area video-area-bg grd-overlay" style="background-image: url({{asset('assets/images/video_bg.jpg')}})">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="video-area-content">
                        <div class="video-ply-wrapper">
                            <a href="{{display($gnl->welcome_details_youtube)}}" class="video-play-btn mfp-iframe"><i class="fas fa-play"></i></a>
                        </div>
                        <h2 class="title">{{display($gnl->welcome_details_title)}}</h2>

                        <p>{!! ($gnl->welcome_details_des) !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- video area end -->

    <!-- testimonial area start -->
    <section class="testimonial-area " id="testimonial_carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content-area"><!-- left content area -->
                        <h3 class="title">{{display($gnl->attorney_header_title)}}</h3>
                        <p>{!! display($gnl->attorney_header_des) !!}</p>
                    </div><!-- //.left content area -->
                </div>
                <div class="col-lg-6">
                    <div class="right-content-area"><!-- right content area -->
                        <div class="testimonial-carousel" id="testimonial-carousel"><!-- testimonial carsouel -->
                            @foreach($category as $data)
                            <div class="single-testimonial-carousel"><!-- single testimonial carousel -->
                                <div class="author-details">
                                    <div class="pro-immage">
                                        <img src="{{asset($data->image)}}" alt="card banner">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">{{display($data->cat_name)}}</h4>
                                        <span class="post">{{ display('Card Name') }}-{{display($data->cat_name)}}</span>
                                    </div>
                                </div>
                            </div><!-- //.single testimonial carousel -->
                            @endforeach



                        </div><!-- //. testiomonial carousel -->
                    </div><!-- //. right content area -->
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial area end -->

    <!-- achivment area start -->
    <section class="achivement-area gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title">{{display($gnl->static_head)}}</h2>
                        <p>{{display($gnl->static_des)}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($statuc as $st)
                <div class="col-lg-4 col-md-6">
                    <div class="single-achivement-item"><!-- single achivement item -->
                        <div class="number">
                            <span class="num-count">{{$st->amount}}</span>
                        </div>
                        <h4 class="title">{{display($st->title)}}</h4>
                    </div><!-- //.single achivement item -->
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- achivment area end -->

    <!-- faq area start -->
    <section class="faq-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title extra">
                        <h2 class="title">{{display($gnl->faq_title)}}</h2>
                        <p>{{ ($gnl->faq_des)}}</p>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="left-content-wrapper"><!-- left content wrapper -->
                        <div id="accordion">
                           <div class="row">
                               @foreach($faq as $key => $ft)
                               <div class="card col-6">
                                   <div class="card-header" id="headingOne{{$ft->id}}">
                                       <a  data-toggle="collapse" data-target="#collapseOne{{$ft->id}}" aria-expanded="false" aria-controls="collapseOne">
                                           {{display($ft->title)}}
                                       </a>
                                   </div>

                                   <div id="collapseOne{{$ft->id}}" class="collapse" aria-labelledby="headingOne{{$ft->id}}" data-parent="#accordion">
                                       <div class="card-body">
                                           {!! ($ft->sortdes) !!}
                                       </div>
                                   </div>
                               </div>
                               @endforeach
                           </div>
                        </div>
                    </div><!-- //.left content wrapper -->
                </div>



            </div>
        </div>
    </section>
    <!-- faq area end -->

    <!-- maketing area start -->
    <section class="marketing-area gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="marekting-inner">
                        <h2 class="title">{{display($gnl->subs_title)}}</h2>
                        <p>{{ ($gnl->subs_des)}}</p>
                        <div class="subscribe-form-wapper">
                            <form action="{{route('subscript')}}" method="post" class="subscribe-form">
                                @csrf
                                <div class="form-element">
                                    <input type="email" name="email" class="input-field" required placeholder="{{display('Enter your email')}}...">
                                </div>
                                <input type="submit" class="submit-btn" value="{{display('Subscribe now')}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- maketing area end -->

@endsection
@section('js')

@endsection