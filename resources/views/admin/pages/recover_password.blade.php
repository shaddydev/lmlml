<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>{{config('app.name')}}-admin-login</title>

  <!-- Bootstrap CSS -->
  <link href="{{asset('adminAssets/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{asset('adminAssets/css/bootstrap-theme.css')}}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{asset('adminAssets/css/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{asset('adminAssets/css/font-awesome.css')}}" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="{{asset('adminAssets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('adminAssets/css/style-responsive.css')}}" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

  <div class="container">
 
    <form class="login-form" action="" method  = "post">
    {{csrf_field()}}
      <div class="login-wrap">
      @include('admin.message')
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name = "otp" class="form-control" placeholder="OTP" autofocus>
         
        </div>
        <span class = "text-danger">{{$errors->first('otp')}}</span>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name = "password" class="form-control" placeholder="Password">
        </div>
        <span class = "text-danger">{{$errors->first('password')}}</span>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name = "password_confirmation" class="form-control" placeholder="Confirm Password">
        </div>
        <span class = "text-danger">{{$errors->first('password_confirmation')}}</span>
        
        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
       
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
        
        </div>
    </div>
  </div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script src="{{asset('adminAssets/js/custom.js')}}"></script>

</body>

</html>
