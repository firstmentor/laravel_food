@extends('layouts.app')
@include('layouts.css')
@section('content')
<body class="register-page">
    <div class="register-box">
        <div class="register-logo">
             Register 
        </div> 
        <div class="container">  
            <div class="col-md-4">
                <div class="register-box-body"  style="background-color:rgb(158,158,158,0.93 );">
                    <p class="login-box-msg"><b>Register a new membership</b></p>
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group has-feedback">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="name"> 
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="email"> 
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input id="password" type="password" class="form-control" name="password" required placeholder="password"> 
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="confirm password">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div> 
                        <div class="row">
                            <div class="col-xs-8">
                              <div class="checkbox icheck">
                                <label>
                                  <input type="checkbox"> I agree to the terms 
                                </label>
                              </div>
                            </div>  
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12"> 
                                <button type="submit" class="btn btn-primary btn-block">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-xs-12"> 
                               <a href="login" style="color:red; float:;">I already have a membership/Please Login</a>
                            </div> 
                        </div> 
                    </div> 
                     
                </div><!-- /.form-box -->
            </div>
        </div>
    </div><!-- /.register-box -->

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
