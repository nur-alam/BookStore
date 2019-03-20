<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="../css/admin/all.css" rel="stylesheet">
    <link href="../css/admin/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/admin/app.css" rel="stylesheet">

</head>

<body id="page-top">


<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image">
               <!--  <img src="{{ asset('img/admin-login-bg-min.jpg') }}" alt="admin-login-bg-img"> -->
              </div>
              <div class="col-lg-6">
                <div class="p-5">

                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Form!</h1>
                  </div>

                  <form class="user" method="POST" action="{{ route('admin.login.submit') }}">

                    @csrf

                    <div class="form-group">
                        <input id="email" type="email" class="form-control-user form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="enter email">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control-user form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="enter password">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif  
                    </div>

                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                     
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Login') }}
                    </button>

                    <hr>

                  </form>

                  <hr>

                  <div class="text-center">
                    @if (Route::has('password.request'))
                        <a class="small" href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    @endif                    
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="../js/admin/jquery.min.js"></script>
  <script src="../js/admin/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../js/admin/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/admin/sb-admin-2.min.js"></script>
  <script src="../js/admin/app.js"></script>

</body>

</html>