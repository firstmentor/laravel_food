@extends('layouts.app')
@include('layouts.css')
@section('content')

 
<body class="login-page">
    <div class="login-box" >
        <div class="login-logo" >
            <a href="login">Login</a>
        </div><!-- /.login-logo -->
        <div class="container">  
            <div class="col-md-4">
                <div class="login-box-body"  style="background-color:rgb(158,158,158,0.93 );">
                    <p class="login-box-msg"><b>Sign in to start your session</b></p>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                      {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback"> 
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span> 
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif      
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback"> 
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            <input id="password" type="password" class="form-control" placeholder="password" name="password" required> 
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-xs-8" style="color:red;">
                              <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                              </div>
                            </div><!-- /.col -->
                            <!-- <div class="col-xs-4">
                              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                            </div> --><!-- /.col -->
                        </div><br>
                        <div class="form-group">
                            <div class="col-xs-12"> 
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form> 
                    <div class="row">
                        <div class="form-group">
                            <div class="col-xs-6"> 
                               <a href="{{ route('password.request') }}" style="color:red; float:left;">I forgot my password</a>
                            </div>
                            <div class="col-xs-6"> 
                               <a href="{{url('register')}}" style="color:red; float:right;">Register</a> 
                            </div>
                        </div> 
                    </div>
                </div><!-- /.login-box-body -->
            </div>
        </div>
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
</body> 

@include('layouts.js')

@endsection
