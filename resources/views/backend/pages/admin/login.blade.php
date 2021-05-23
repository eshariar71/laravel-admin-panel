<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Custom style -->
  <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/login.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  {{-- Favicon Link --}}
	<link rel="favicon" sizes="48x48" href="{!! asset('assets/frontend/images/favicon/favicon.ico') !!}">
	<link rel="apple-touch-icon" sizes="180x180" href="{!! asset('assets/frontend/images/favicon/apple-touch-icon.png') !!}">
	<link rel="icon" type="image/png" sizes="32x32" href="{!! asset('assets/frontend/images/favicon/favicon-32x32.png') !!}">
	<link rel="icon" type="image/png" sizes="16x16" href="{!! asset('assets/frontend/images/favicon/favicon-16x16.png') !!}">
	<link rel="manifest" href="{!! asset('assets/frontend/images/favicon/site.webmanifest') !!}">
</head>
<body class="hold-transition login-bg login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ url('/') }}">
      <img src="{{ url('assets/frontend/images/logo/logo.png') }}" class="img-responsive" alt="Logo"></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <h5 class="login-b text-center"><i class="fas fa-sun"></i> Welcome To Admin Login page  <i class="fas fa-sun"></i></h5>

      @include('backend/partials/message')
      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input name="email" id="email" type="text" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" id="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          {{-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> --}}
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-paper-plane"></i>  Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/backend/dist/js/adminlte.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
      });
    }, 3000);
    });
</script>

</body>
</html>
