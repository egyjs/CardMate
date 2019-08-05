<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{display($gnl->title)}} - {{display($gnl->subtitle)}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/logo/icon.png')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/bootstrap-toggle.min.css') }}">

@yield('page_styles')

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini rtl">

<header class="app-header">
    <a class="app-header__logo" href="{{route('admin.dashboard')}}">
        <img src="{{asset('assets/images/logo/logo.png')}}" alt="logo" class="logo-default" style="width: 160px;">
    </a>

    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>


    <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">{{Auth::user()->name}} <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="{{route('admin.new-admin')}}"><i class="fa fa-user fa-lg"></i>Create New Admin </a></li>
                <li><a class="dropdown-item" href="{{route('admin.list-admin')}}"><i class="fa fa-users fa-lg"></i>List of Admin </a></li>
                <li><a class="dropdown-item" href="{{route('admin.change-password')}}"><i class="fa fa-cog fa-lg"></i> Change Password </a></li>

                <li>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</header>

<!-- Sidebar menu-->

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<main class="app-content">
    <aside class="app-sidebar">


        <ul class="app-menu">
            <li>
                <a class="app-menu__item @if(request()->path() == 'admin/dashboard') active @endif" href="{{route('admin.dashboard')}}">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Dashboard</span></a>
            </li>


            <li class="treeview">
                <a class="app-menu__item @if(request()->path() == 'admin/card-category') active @endif" href="{{route('admin.card.category')}}" >
                    <i class="app-menu__icon fa fa-caret-square-o-right"></i>
                    <span class="app-menu__label">Card Category</span>
                </a>
            </li>

            <li class="treeview">
                <a class="app-menu__item @if(request()->path() == 'admin/card-subcategory') active @endif" href="{{route('admin.card.subcategory')}}" >
                    <i class="app-menu__icon fa fa-bars"></i>
                    <span class="app-menu__label">Card Sub Category</span>
                </a>
            </li>


            <li class="treeview @if(request()->path() == 'admin/card-create') is-expanded
@elseif(request()->path() == 'admin/card-list') is-expanded
@endif">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-credit-card"></i>
                    <span class="app-menu__label">Manage Card </span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item  @if(request()->path() == 'admin/card-create') active @endif" href="{{route('admin.card.create')}}">
                            <i class="icon fa fa-plus"></i> Create Card</a></li>
                    <li><a class="treeview-item @if(request()->path() == 'admin/card-list') active @endif" href="{{route('admin.card.index')}}">
                            <i class="icon fa fa-edit"></i>Manage Card</a></li>


                </ul>
            </li>





            <li class="treeview @if(request()->path() == 'admin/users') is-expanded
@elseif(request()->path() == 'admin/user-search') is-expanded
@elseif(request()->path() == 'admin/user-banned') is-expanded
@elseif(request()->path() == 'admin/subscribers') is-expanded
@endif">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-users"></i>
                    <span class="app-menu__label">Manage Users</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item  @if(request()->path() == 'admin/users') active @endif" href="{{route('admin.users')}}">
                            <i class="icon fa fa-users"></i> All Users</a></li>

                    <li><a class="treeview-item @if(request()->path() == 'admin/user-banned') active @endif" href="{{route('admin.user-ban')}}">
                            <i class="icon fa fa-users" style="color:brown;"></i> Banned Users</a></li>

                </ul>
            </li>
            <li class="treeview
@if(request()->path() == 'admin/deposit-request')  is-expanded
@elseif(request()->path() == 'admin/gateway')  is-expanded
@endif">
                <a class="app-menu__item @if(request()->path() == 'admin/gateway') active @endif" href="{{route('admin.gateway')}}" >
                    <i class="app-menu__icon fa fa-money"></i>
                    <span class="app-menu__label">Payment Gateway</span>

                </a>
                <ul class="treeview-menu">


                </ul>
            </li>
            <li class="treeview
@if(request()->path() == 'admin/about-section') is-expanded
@elseif(request()->path() == 'admin/transaction-log') is-expanded

@endif">
                <a class="app-menu__item @if(request()->path() == 'admin/transaction-log') active @endif" href="{{route('admin.transaction')}}" >
                    <i class="app-menu__icon fa fa-exchange"></i>
                    <span class="app-menu__label">Transaction</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item @if(request()->path() == 'admin/blog') active @endif" href="{{route('admin.blog')}}">
                    <i class="app-menu__icon fa fa-edit"></i>
                    <span class="app-menu__label">Manage Blog</span></a>
            </li>


            <li class="treeview
@if(request()->path() == 'admin/about-section') is-expanded
@elseif(request()->path() == 'admin/footer-section') is-expanded
@elseif(request()->path() == 'admin/social-section') is-expanded
@elseif(request()->path() == 'admin/contact') is-expanded
@elseif(request()->path() == 'admin/welcome-header') is-expanded
@elseif(request()->path() == 'admin/video-section') is-expanded
@elseif(request()->path() == 'admin/practise-header') is-expanded
@elseif(request()->path() == 'admin/our-features-section') is-expanded
@elseif(request()->path() == 'admin/banner') is-expanded
@elseif(request()->path() == 'admin/static') is-expanded
@elseif(request()->path() == 'admin/breadcrumb') is-expanded
@elseif(request()->path() == 'admin/faq-header') is-expanded
@elseif(request()->path() == 'admin/faq-section') is-expanded
@elseif(request()->path() == 'admin/about-static') is-expanded

@elseif(request()->path() == 'admin/happy-client') is-expanded
@elseif(request()->path() == 'admin/category-header') is-expanded
@endif">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-globe"></i>
                    <span class="app-menu__label">Frontend Content</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item  @if(request()->path() == 'admin/banner') active  @endif " href="{{route('admin.banner')}}">
                            <i class="icon fa fa-arrow-right"></i> Banner Setting</a>
                    </li>

                    <li>
                        <a class="treeview-item  @if(request()->path() == 'admin/our-features-section') active  @endif " href="{{route('admin.practisedetails')}}">
                            <i class="icon fa fa-arrow-right"></i>  Our Features </a>
                    </li>
                    

                    <li>
                        <a class="treeview-item  @if(request()->path() == 'admin/video-section') active  @endif " href="{{route('admin.welcomedetails')}}">
                            <i class="icon fa fa-arrow-right"></i>  Video-Share Section </a>
                    </li>


                    <li>
                        <a class="treeview-item  @if(request()->path() == 'admin/static') active  @endif " href="{{route('admin.static')}}">
                            <i class="icon fa fa-arrow-right"></i>  Statistics </a>
                    </li>



                    <li>
                        <a class="treeview-item  @if(request()->path() == 'admin/faq-section') active  @endif " href="{{route('admin.faqdetails')}}">
                            <i class="icon fa fa-arrow-right"></i>  FAQ Section </a>
                    </li>


                    <li>
                        <a class="treeview-item  @if(request()->path() == 'admin/footer-section') active  @endif " href="{{route('admin.footersection')}}">
                            <i class="icon fa fa-arrow-right"></i> Footer Section</a>
                    </li>

                    <li>
                        <a class="treeview-item  @if(request()->path() == 'admin/social-section') active  @endif " href="{{route('admin.socialsection')}}">
                            <i class="icon fa fa-arrow-right"></i> Social Section</a>
                    </li>

                    <li>
                        <a class="treeview-item  @if(request()->path() == 'admin/contact') active  @endif " href="{{route('admin.contact')}}">
                            <i class="icon fa fa-arrow-right"></i> Contact Setting</a>
                    </li>

                    <li>
                        <a class="treeview-item  @if(request()->path() == 'admin/about-section') active  @endif " href="{{route('admin.aboutsection')}}">
                            <i class="icon fa fa-arrow-right"></i>  About Page</a>
                    </li>


                    <li>
                        <a class="treeview-item  @if(request()->path() == 'admin/breadcrumb') active  @endif " href="{{route('admin.breadcrumb')}}">
                            <i class="icon fa fa-arrow-right"></i> Breadcrumb</a>
                    </li>




                </ul>
            </li>




            <li class="treeview
@if(request()->path() == 'admin/subscriber') is-expanded
@elseif(request()->path() == 'admin/broadcast-subscriber') is-expanded
@elseif(request()->path() == 'admin/broadcast') is-expanded @endif">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-bookmark-o"></i>
                    <span class="app-menu__label">Newsletter</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">

                    <li>
                        <a class="treeview-item @if(request()->path() == 'admin/subscriber') active  @endif" href="{{route('admin.subscriber')}}">
                            <i class="icon fa fa-save"></i>Subscriber</a>
                    </li>
                    <li>
                        <a class="treeview-item @if(request()->path() == 'admin/broadcast-subscriber') active  @endif" href="{{route('mail.subscriber')}}">
                            <i class="icon fa fa-envelope"></i>Mail To All Subscriber</a>
                    </li>
                    <li><a class="treeview-item @if(request()->path() == 'admin/broadcast') active @endif" href="{{route('admin.broadcast')}}">
                            <i class="icon fa fa-envelope"></i> Mail To All User </a></li>

                </ul>
            </li>

            <li class="treeview
@if(request()->path() == 'admin/general') is-expanded
@elseif(request()->path() == 'admin/logo-icon') is-expanded
@elseif(request()->path() == 'admin/email-sms') is-expanded @endif">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-cogs"></i>
                    <span class="app-menu__label">Website Control</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item  @if(request()->path() == 'admin/general') active  @endif " href="{{route('admin.general')}}">
                            <i class="icon fa fa-cog"></i> General Settings</a>
                    </li>
                    <li><a class="treeview-item @if(request()->path() == 'admin/logo-icon') active  @endif" href="{{route('admin.logo')}}">
                            <i class="icon fa fa-picture-o"></i> Logo and Icon</a></li>
                    <li><a class="treeview-item @if(request()->path() == 'admin/email-sms') active @endif" href="{{route('admin.email')}}">
                            <i class="icon fa fa-envelope"></i> Email and SMS</a></li>
                    <li><a class="treeview-item @if(request()->path() == 'admin/translation') active @endif"
                           href="{{route('admin.translation')}}">
                            <i class="icon fa fa-language"></i>{{ display('translation') }}</a></li>

                </ul>
            </li>


        </ul>
    </aside>
    <div class="row">
        <div class="col-md-12">
            @include('layouts.error')
            @yield('content')
        </div>
    </div>
</main>
<script src="{{asset('assets/admin/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/main.js')}}"></script>
<script src="{{asset('assets/admin/js/plugins/pace.min.js')}}"></script>
<script src="{{asset('assets/admin/js/plugins/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-toggle.min.js')}}"></script>
@yield('page_scripts')
@include('layouts.message')
</body>
</html>