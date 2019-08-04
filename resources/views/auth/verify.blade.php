@extends('fontend.master')

@section('content')
    <!-- login page content area start -->
    <section class="login-page-area">
        <div class="container">
            @if(Auth::user()->status!=1)
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title">
                            <h2 class="title" style="color: red">{{display('Account Deactivated')}}</h2>
                        </div>
                    </div>
                </div>
            @elseif(Auth::user()->emailv!=1)
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title">
                            <h2 class="title"> {{display('Email Verification')}}</h2>
                            @include('layouts.error')
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-6">
                        <div class="login-form-wrapper"><!-- login form wrapper -->

                            <form action="{{ route('user.send-vcode') }}" method="post" >
                                @csrf
                                <input id="email" type="hidden"  name="email" value="{{Auth::user()->email}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="text-center">{{display('Your Email')}}:</h4>
                                        <br>
                                        <h5 class="text-center"> {{Auth::user()->email}}</h5>
                                    </div>
                                    <br>

                                    <div class="col-md-12">
                                        <input type="submit" value="{{display('Send Verification Code')}}" class="submit-btn btn-block">
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-form-wrapper"><!-- login form wrapper -->

                            <form action="{{ route('user.email-verify') }}" method="post" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-element has-icon margin-bottom-20">
                                            <input type="text" class="input-field" name="code" id="uname"
                                                   placeholder="{{display('Enter Verification Code')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-element">
                                            <input type="submit" value="{{display('Submit')}}" class="submit-btn btn-block">
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            @elseif(Auth::user()->smsv!=1)

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title">
                            <h2 class="title"> {{display('Phone Verification')}}</h2>
                            @include('layouts.error')
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-6">
                        <div class="login-form-wrapper"><!-- login form wrapper -->

                            <form action="{{ route('user.send-vcode') }}" method="post" >
                                @csrf
                                <input id="email" type="hidden"  name="mobile" value="{{Auth::user()->mobile}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="text-center">{{display('Your Phone')}}:</h4>
                                        <br>
                                        <h5 class="text-center"> {{Auth::user()->mobile}}</h5>
                                    </div>
                                    <br>

                                    <div class="col-md-12">
                                        <input type="submit" value="{{display('Send Verification Code')}}" class="submit-btn btn-block">
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-form-wrapper"><!-- login form wrapper -->

                            <form action="{{ route('user.sms-verify') }}" method="post" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-element has-icon margin-bottom-20">
                                            <input type="text" class="input-field" name="code" id="uname" placeholder="Enter Verification Code">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-element">
                                            <input type="submit" value="{{display('Submit')}}" class="submit-btn btn-block">
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            @endif
        </div>
    </section>
    <!-- login page content area end -->
@endsection
