<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      {{-- <form action="register" method="post">
        @csrf
        {!! (isset($usr))? method_field('PUT') : '' !!}
        
        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user" style="color: #1e3050;"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input name="name" type="text" class="form-control" placeholder="Full Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user" style="color: #1e3050;"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="E-mail">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope" style="color: #1e3050;"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock" style="color: #1e3050;"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>

          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form> --}}

      <form method="POST" action="register">
        @csrf
        {!! (isset($usr))? method_field('PUT') : ''!!}
        <div class="input-group mb-3">
          <input class="form-control @error('username') is-invalid @enderror" value="{{ isset($usr)? $usr->username : old('username') }}" name="username" type="text" placeholder="Username">
          @error('username')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
          
        </div>
        <div class="input-group mb-3">
          <input class="form-control @error('name') is-invalid @enderror" value="{{ isset($usr)? $usr->name : old('name') }}" name="name" type="text" placeholder="Full name">
          @error('name')
            <span class="error invalid-feedback" >{{ $message }} </span>
          @enderror
          
        </div>
        <div class="input-group mb-3">
          <input class="form-control @error('email') is-invalid @enderror" value="{{ isset($usr)? $usr->name : old('email') }}" name="email" type="email" placeholder="Email">
          @error('email')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
          
        </div>
        <div class="input-group mb-3">
          <input class="form-control @error('password') is-invalid @enderror" value="{{ isset($usr)? $usr->password : old('password') }}" name="password" type="password" placeholder="Password">
          @error('password')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
          
        </div>
        <div class="form-group">
          <button class="btn btn-primary btn-block">Register</button>
        </div>
      </form>

      <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
    </div>
  </div>
</div>


<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
