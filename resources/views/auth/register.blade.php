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
                        <h2 class="title">{{display('Create An Account')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="login-form-wrapper"><!-- login form wrapper -->
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <p>{{ display($error) }}</p>
                                </div>
                            @endforeach
                        @endif

                        <form action="{{ route('register') }}" method="post" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-element margin-bottom-20">
                                        <input type="text" class="input-field" name="name" value="{{ old('name') }}"
                                               placeholder="{{display('Full Name')}}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-element margin-bottom-20">
                                        <input type="email" class="input-field" name="email" value="{{ old('email') }}"
                                               placeholder="{{display('Email')}}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-element margin-bottom-20">
                                        <input type="text" class="input-field" name="username" value="{{ old('username') }}"
                                               placeholder="{{display('Username')}}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-element margin-bottom-20">
                                        <input type="text" name="mobile" value="{{ old('mobile') }}" class="input-field"
                                               placeholder="{{display('Phone')}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-element margin-bottom-20">
                                        <input type="text" class="input-field" name="city" value="{{ old('city') }}"
                                               placeholder="{{display('Enter Name of City')}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-element margin-bottom-20">
                                        <input type="text" class="input-field"  name="country" value="{{ old('country') }}"
                                               placeholder="{{display('Country Name')}}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-element margin-bottom-20">
                                        <input type="password" class="input-field" name="password"
                                               placeholder="{{display('Enter Password')}}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-element margin-bottom-20">
                                        <input type="password" class="input-field" name="password_confirmation"
                                               placeholder="{{display('Confirm Password')}}">
                                    </div>
                                </div>

                                <div class="col-lg-12">

                                    <div class="btn-wrapper">
                                        <div class="left-content">
                                            <input type="submit" class="submit-btn" value="{{display('Register')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div><!-- //. login form wrapper -->
                </div>
            </div>
        </div>
    </section>
    <!-- login page content area end -->
@endsection
