@extends('fontend.master')

@section('content')


    <section class="login-page-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title">Change Password</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="login-form-wrapper"><!-- login form wrapper -->
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <p>{{ $error }}</p>
                                </div>
                            @endforeach
                        @endif

                        <form role="form" method="POST" action="{{ route('user.password-update') }}">
                            @csrf
                                                  
                            
                            
                            <div class="form-element margin-bottom-20" >
                                <label class="control-label visible-ie8 visible-ie9">Old Password</label>
                                <input id="passwordold" type="password" class="input-field" name="passwordold" placeholder="Old Password">
                            </div>
                            <div class="form-element margin-bottom-20" >
                                <label class="control-label visible-ie8 visible-ie9">New Password</label>
                                <input id="password" type="password" class="input-field" name="password" placeholder="New Password">
                            </div>
                            <div class="form-element margin-bottom-20" >
                                <label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
                                <input id="password-confirm" type="password" class="input-field" name="password_confirmation" placeholder="Confirm Password">
                            </div>

                    
                                    <div class="btfn-wrapper">
                                        <div class="left-content">
                                            <input type="submit" class="submit-btn" value="Change Password">
                                        </div>
                                    </div>

                        </form>
                        

                    </div><!-- //. login form wrapper -->
                </div>
            </div>
        </div>
    </section>
    
  
    <!-- about page content area end -->



@endsection