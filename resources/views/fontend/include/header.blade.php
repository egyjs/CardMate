
@if(request()->path() == '/')

<div class="header-area header-bg" style="background-image: url({{ asset('assets/images/banner.png') }})">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-12">
                <div class="header-inner "><!-- header inner -->
                    <h1 class="title">{{display($gnl->welcome_header_title)}}</h1>
                    <p class="wow fadeInDown">{{display($gnl->welcome_header_des)}}</p>

                </div><!-- //. header inner -->
            </div>
        </div>
    </div>
</div>

@else
    <!-- breadcrumb area start -->
    <section class="breadcrumb-area breadcrumb-bg" style="background-image: url({{ asset('assets/images/menu.png') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner"><!-- breadcrumb inner -->
                        <h1 class="title">{{display($pt) ?? ''}}</h1>
                    </div><!-- //.breadcrumb inner -->
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->
@endif

