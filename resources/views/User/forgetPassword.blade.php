<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Forget Password</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('plugins/iCheck/square/blue.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Forget Your password?</b>
  </div>
  <div class="login-box-body">
    <br/>
    <p class="login-box-msg">Enter your registered email</p>
     @if(Session::has('forgetError'))
        <p class="text-red">{{ Session::get('forgetError')}}</p>
        {{Session::forget('forgetError')}}
    @endif
    @foreach ($errors->all() as $error)
        <p class="text-red">{{ $error }}</p>
    @endforeach
    {!! Form::open(['action' => 'Admin\UserController@sendForgetMail']) !!}
      <div class="form-group has-feedback">
        {!! Form::email('email', null, array('class' => 'form-control', "placeholder" => "Email" )) !!}
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          {!! Form::submit( 'Submit', array('class' => 'btn btn-primary btn-block btn-flat')) !!}
        </div>
      </div>
    {!! Form::close() !!}
    <br/>
    <a href="{{ URL::to('/') }}">Go Back to Login Page</a>
    <br/><br/>
  </div>
</div>

<script src="{{ URL::asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('plugins/iCheck/icheck.min.js') }}"></script>
</body>
</html>
