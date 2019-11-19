
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Reset Password - {{config('settings.sitename')}}
  </title>
  <link rel="apple-touch-icon" href="{{url('')}}/assets/app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="{{url('')}}/assets/app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/vendors.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/forms/icheck/custom.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/app.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/custom-rtl.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/pages/login-register.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/css/style-rtl.css">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <img src="{{url(config('settings.logo'))}}" alt="branding logo">
                    </div>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>{{config('settings.sitename')}}</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">

                     <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                        
                      
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                    @if (count($errors) > 0 )

                    <div class="alert alert-danger">
                        <button class="close" data-close="alert"></button>
                        @foreach ($errors->all() as $error)
                        <span> {{ $error }} </span></br>
                        @endforeach
                    </div>
                    @endif



                    
                      <fieldset class="form-group position-relative has-icon-left mb-0">
                        <input type="text" class="form-control form-control-lg input-lg" id="user-name" name="email" placeholder="Email"
                        value="{{ $email ?? old('email') }}" required autofocus>
                        <div class="form-control-position">
                          <i class="la la-at"></i>
                        </div>
                      </fieldset>


</br>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input name="password"  type="password" class="form-control form-control-lg input-lg" id="user-password"
                        placeholder="Enter Password" required>
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                      </fieldset>



                      <fieldset class="form-group position-relative has-icon-left">
                        <input name="password_confirmation"  type="password" class="form-control form-control-lg input-lg" id="user-password"
                        placeholder="Enter Confirm Password" required>
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                      </fieldset>


                      
                      <button type="submit" class="btn btn-info btn-lg btn-block"><i class="la la-key"></i> Reset Password</button>
                   </form>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="">
                    
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="{{url('')}}/assets/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{url('')}}/assets/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="{{url('')}}/assets/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
  type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{url('')}}/assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="{{url('')}}/assets/app-assets/js/core/app.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{url('')}}/assets/app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>