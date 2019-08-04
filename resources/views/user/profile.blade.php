@extends('fontend.master')
@section('css')

@endsection
@section('content')

    <!-- login page content area start -->
    <section class="login-page-area">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="login-form-wrapper"><!-- login form wrapper -->
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <p>{{ $error }}</p>
                                </div>
                            @endforeach
                        @endif

                        <form action="{{ route('update.profile') }}" method="post" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-element margin-bottom-20">
                                        <input type="text" class="input-field" name="name" value="{{ Auth::user()->name }}" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-element margin-bottom-20">
                                        <input type="email" class="input-field" name="email" value="{{ Auth::user()->email }}" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-element margin-bottom-20">
                                        <input type="text" name="mobile" value="{{ Auth::user()->mobile }}" class="input-field" placeholder="Phone">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-element margin-bottom-20">
                                        <input type="text" class="input-field" name="city" value="{{ Auth::user()->city }}" placeholder="Enter Name of City">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-element margin-bottom-20">
                                        <input type="text" class="input-field"  name="country" value="{{ Auth::user()->country }}" placeholder="Country Name">
                                    </div>
                                </div>

                                <div class="col-lg-12">

                                    <div class="btn-wrapper">
                                        <div class="left-content">
                                            <input type="submit" class="submit-btn" value="Update Profile">
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
