<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{display($gnl->title)}} - {{display($gnl->subtitle)}}  </title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/')}}/logo/icon.png" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{url('/')}}/assets/fontend/css/bootstrap.min.css">
    <!-- icofont -->
    <link rel="stylesheet" href="{{url('/')}}/assets/fontend/css/fontawesome.min.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{url('/')}}/assets/fontend/css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{url('/')}}/assets/fontend/css/owl.carousel.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{url('/')}}/assets/fontend/css/magnific-popup.css">
    <!-- stylesheet -->
    @if(is_rtl())
    <!-- stylesheet -->
        <link rel="stylesheet" href="{{url('/')}}/assets/fontend/css/rtl_style.css">
    @else
        <link rel="stylesheet" href="{{url('/')}}/assets/fontend/css/style.css">
    @endif
    <!-- responsive -->
    <link rel="stylesheet" href="{{url('/')}}/assets/fontend/css/responsive.css">
    @yield('css')
</head>

<body>


<!-- navbar area start -->
@include('fontend.include.navbar')
<!-- navbar area end -->

<!-- header area start -->
@include('fontend.include.header')
<!-- header area end -->

@yield('content')

<!-- footer area start -->
@include('fontend.include.footer')

<div class="copyright-area dark-blug-lg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <span class="copytext">&copy; {{date('Y')}}. {{ display('All Rights Reserved By') }} {{display($gnl->title)}}.</span>
            </div>
        </div>
    </div>
</div>
<!-- footer area end -->

<!-- preloader area start -->
<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="preloader-container">
            <div class="item item-1"></div>
            <div class="item item-2"></div>
            <div class="item item-3"></div>
            <div class="item item-4"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->


<!-- back to top start -->
<div class="back-to-top">
    <i class="fas fa-rocket"></i>
</div>
<!-- back to top end -->

<!-- jquery -->
<script src="{{url('/')}}/assets/fontend/js/jquery.js"></script>
<!-- popper -->
<script src="{{url('/')}}/assets/fontend/js/popper.min.js"></script>
<!-- bootstrap -->
<script src="{{url('/')}}/assets/fontend/js/bootstrap.min.js"></script>
<!-- way poin js-->
<script src="{{url('/')}}/assets/fontend/js/waypoints.min.js"></script>
<!-- owl carousel -->
<script src="{{url('/')}}/assets/fontend/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="{{url('/')}}/assets/fontend/js/jquery.magnific-popup.js"></script>
<!-- wow js-->
<script src="{{url('/')}}/assets/fontend/js/wow.min.js"></script>
<!-- counterup js-->
<script src="{{url('/')}}/assets/fontend/js/jquery.counterup.min.js"></script>
<!-- main -->
<script src="{{url('/')}}/assets/fontend/js/main.js"></script>
@yield('js')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    @if(Session::has('msg'))
    swal("{{display(Session::get('msg'))}}", "", "success");
    @endif

    @if(Session::has('alert'))
    swal("{{display(Session::get('alert'))}}", "", "warning");
    @endif
</script>
</body>

</html>