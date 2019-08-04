@extends('fontend.master')
@section('css')

@endsection
@section('content')
    <!-- login page content area start -->
    <section class="login-page-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title">{{display('Login Your Account')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="login-form-wrapper"><!-- login form wrapper -->


                        <form  action="{{ route('login') }}" method="post" >
                            @csrf
                            <div class="form-element has-icon margin-bottom-20">
                                <input type="text" class="input-field" name="username" value="{{ old('username') }}"
                                       placeholder="{{display('Enter username')}}">
                                <div class="the-icon">
                                    <i class="far fa-user"></i>
                                </div>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                        <strong>{{ display($errors->first('username')) }}</strong>
                    </span>
                                @endif
                            </div>
                            <div class="form-element has-icon margin-bottom-20">
                                <input type="password" class="input-field" name="password"
                                       placeholder="{{display('Enter Password')}}">
                                <div class="the-icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                        <strong>{{ display($errors->first('password')) }}</strong>
                    </span>
                                @endif
                            </div>

                            <div class="btn-wrapper margin-bottom-20">
                                <div class="left-content">
                                    <input type="submit" class="submit-btn" value="{{display('Login')}}">
                                </div>

                            </div>
                            <div class="from-footer">
                                <span class="ftext">{{display('Not a member?')}}  <a href="{{url('register')}}">{{display('Create an Account')}}</a></span>
                            </div>
                        </form>
                    </div><!-- //. login form wrapper -->
                </div>
            </div>
        </div>
    </section>
    <!-- login page content area end -->
@endsection
