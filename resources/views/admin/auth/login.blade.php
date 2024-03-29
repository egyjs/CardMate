<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}">

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>{{$gnl->title}} - Admin</title>
</head>
<body>
<section class="material-half-bg">
  <div class="cover"></div>
</section>
<section class="login-content">
  <div class="logo">
    <img src="{{asset('assets/images/logo/logo.png')}}" alt="logo" class="logo-default" style="width: 220px; height: 46px;">
  </div>
  <div class="login-box">
    <form class="login-form" method="POST" action="{{ route('admin.loginpost') }}">
      @csrf
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
      <div class="form-group">
        <label class="control-label">USERNAME</label>
        <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" type="text" placeholder="Username" required name="username" autofocus>

      </div>
      <div class="form-group">
        <label class="control-label">PASSWORD</label>
        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" required placeholder="Password">
      </div>

      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
      </div>
    </form>
  </div>
</section>
<script src="{{asset('assets/admin/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/main.js')}}"></script>
<script src="{{asset('assets/admin/js/plugins/bootstrap-notify.min.js')}}"></script>
<script src="{{url('/')}}assets/js/plugins/pace.min.js"></script>
@include('layouts.message')
</body>
</html>


