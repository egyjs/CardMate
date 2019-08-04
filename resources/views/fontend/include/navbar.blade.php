<nav class="navbar navbar-area navbar-expand-lg navbar-light ">
    <div class="container nav-container">
        <div class="logo-wrapper navbar-brand">
            <a href="{{url('/')}}" class="logo main-logo">
                <img src="{{asset('assets/images/')}}/logo/logo.png" style="width: 160px" alt="logo">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="mirex">
            <!-- navbar collapse start -->
            <ul class="navbar-nav">
            @guest
                <!-- navbar- nav -->
                    <li class="nav-item active">
                        <a class="nav-link pl-0" href="{{route('user.index')}}">{{display('Home')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.about')}}">{{display('About us')}}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('blog.in')}}">{{display('Blog')}}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('contact')}}">{{display('Contact us')}}</a>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">{{display('Account')}}</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('login')}}">{{display('Login')}}</a>
                            <a class="dropdown-item" href="{{route('register')}}">{{display('Register')}}</a>
                        </div>
                    </li>

                @else


                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">{{display('Dashboard')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.buycard')}}">{{display('Buy Card')}}</a>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">{{display('My Card')}}</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('user.mycard')}}">{{display('My Cards')}}</a>
                            <a class="dropdown-item" href="{{route('user.old.card')}}">{{display('Used Card')}}</a>
                        </div>
                    </li>



                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('user.deposit')}}">{{display('Deposit')}}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('user.transaction')}}">{{display('Transactions')}}</a>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">{{Auth::user()->name}}</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"> {{display('Balance')}}: {{Auth::user()->balance}} {{display($gnl->cur)}} </a>
                            <a class="dropdown-item" href="{{route('user.change-password')}}">{{display('Change Password')}}</a>
                            <a class="dropdown-item" href="{{route('profile.index')}}">Profile</a>
                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{display('Logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>


                @endguest
                <form action="{{ route('Slang') }}" method="post">
                    @csrf
                    @if(is_arabic())
                        <li class="nav-item">
                            <button type="submit" name="userLocale" value="en" class="nav-link btn-link btn-lg btn">EN</button>
                        </li>
                    @else
                        <li class="nav-item">
                            <button type="submit" name="userLocale" value="ar" class="nav-link btn-link btn-lg btn">ع</button>
                        </li>
                    @endif
                </form>
            </ul>
            <!-- /.navbar-nav -->
        </div>


        <!-- /.navbar btn wrapper -->
        <div class="responsive-mobile-menu">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mirex"
                    aria-controls="mirex"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <!-- navbar collapse end -->
    </div>
</nav>