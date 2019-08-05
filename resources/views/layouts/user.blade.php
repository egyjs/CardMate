<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>{{display($gnl->title)}} | {{display($gnl->subtitle)}}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/logo/icon.png')}}">
    
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('assets/user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/color.css')}}">
    <link href="{{asset('assets/user/css/color.php?color=') }}{{$gnl->color}}" rel="stylesheet">
    <script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/admin/')}}/css/sweetalert.css">
    @yield('page_styles')
</head>
<body>

    <nav class="navbar navbar-default header-navigation stricky stricky-fixed slideInDown animated">
        <div class="thm-container clearfix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('assets/images/logo/logo.png')}}" style="max-width:83px; max-height:98px;" alt="Awesome Image"/>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse main-navigation mainmenu one-page-scroll-menu" id="main-nav-bar">
                
                <ul class="nav navbar-nav navigation-box">               
                    @auth
                    
                    
                    <li class="scrollToLink dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                            role="button" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}} <span class="caret"></span></a>
                             
        
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li class="scrollToLink">
                                    <a href="{{ route('home') }}">{{display('Home')}}</a>
                                 </li>
                                   
                                    <li class="scrollToLink">
                                        <a href="{{route('user.change-password')}}">{{display('Change Password')}}</a>
                                    </li>

                                    <li class="scrollToLink">    
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                           {{display('Logout')}} </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li> 
                            </ul>
                    </li>
                    @endauth
                    @guest
                     <li class="scrollToLink">  <a href="{{route('login')}}" style="color:white"> {{display('Sign In')}} </a> </li>
                    @endguest          
                </ul>
                
            </div>

        </div><!-- /.container -->
    </nav>   
</header><!-- /.header -->
   
@yield('content')



<div class="footer-bottom">
    <div class="thm-container clearfix">
        <div class="left-copy pull-left">
        <p>Copyright - <a href="{{url('/')}}">{{display($gnl->title)}}</a></p>
        </div>
    </div>
</div>






<script src="{{asset('assets/user/js/jquery.min.js')}}"></script>

<script src="{{asset('assets/user/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/sweetalert.js')}}"></script>
    <script src="{{asset('assets/admin/js/sweetalert.min.js')}}"></script>
@include('layouts.message')
@yield('page_scripts')

    <script>
        @if(Session::has('msg'))
        swal("{{Session::get('msg')}}", "", "success");
        @endif

        @if(Session::has('alert'))
        swal("{{Session::get('alert')}}", "", "warning");
        @endif
    </script>

</body>
</html>