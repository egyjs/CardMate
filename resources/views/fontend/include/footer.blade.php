<section class="footer-area blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="footer-widget about"><!-- footer widget -->
                    <div class="widget-body">
                        <a href="{{url('/')}}" class="footer-logo">
                            <img style="width: 100%;" src="{{asset('assets/images/')}}/logo/logo.png" alt="footer logo">
                        </a>

                        <p>{{display($gnl->footer)}}</p>
                        <ul class="social-icons">
                            @foreach($icon as $ic)
                            <li class="{{$ic->icon}}"><a href="{{$ic->link}}"><i class="fab fa-{{$ic->icon}}"></i></a></li>
                            @endforeach


                        </ul>
                    </div>
                </div><!-- //.footer widget -->
            </div>
            <div class="col-lg-3">
                <div class="footer-widget"><!-- footer widget -->
                    <div class="widget-title">
                        <h4 class="title">{{display('Links')}}</h4>
                    </div>
                    <div class="widget-body">
                        <ul>
                            <li><a href="{{url('/')}}">{{display('Home')}}</a></li>
                            <li><a href="{{route('user.about')}}">{{display('About us')}}</a></li>
                            <li><a href="{{route('contact')}}">{{display('Contact us')}}</a></li>
                            <li><a href="{{route('login')}}">{{display('Login')}}</a></li>
                            <li><a href="{{route('register')}}">{{display('Register')}}</a></li>
                        </ul>
                    </div>
                </div><!-- //.footer widget -->
            </div>

            <div class="col-lg-4">
                <div class="footer-widget contact"><!-- footer widget -->
                    <div class="widget-title">
                        <h4 class="title">{{display('Contact Us')}}</h4>
                    </div>
                    <div class="widget-body">
                        <span class="details">{{$gnl->website_email_address}}</span>
                        <span class="details">{{$gnl->website_number}}</span>
                        <span class="details">{{$gnl->website_address}}</span>
                    </div>
                </div><!-- //.footer widget -->
            </div>
        </div>
    </div>
</section>