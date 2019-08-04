@extends('fontend.master')
@section('css')

@endsection
@section('content')
    <!-- blog page content area start-->
    <div class="blog-details-page-conent">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 single-blog-details-inner-wrapper">
                    <div class="single-blog-details-post"><!-- single blog page -->
                        <div class="thumb">
                            <img src="{{asset($blogdetails->image)}}" alt="blog images">
                        </div>
                        <div class="content">
                            <h4 class="title">{{$blogdetails->title}}</h4>
                            <div class="post-meta">
                                <span class="time"><i class="far fa-clock"></i> {{ date(' l jS F Y', strtotime($blogdetails->created_at)) }}</span>
                            </div>
                            <p>{!! $blogdetails->des !!}</p>

                        </div>
                    </div><!-- //. single blog page content -->

                    <div class="post-meta-wrapper">
                        <div class="right-content-wrapper"><!-- left content wrapper -->
                            <ul>
                                <li class="title">Share:</li>

                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{urlencode(url()->current()) }}">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://plus.google.com/share?url={{urlencode(url()->current()) }}">
                                        <i class="fab fa-google"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title=my share text&amp;summary=dit is de linkedin summary">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </li>



                            </ul>
                        </div><!-- //.left content wrapper -->
                    </div>

                    <div class="comments-section">
                        <h2>Comments</h2>
                        <div class="comment-list">
                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1421567158073949";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));
                            </script>
                            <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- blog page content area end-->
@endsection