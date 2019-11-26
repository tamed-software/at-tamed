<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory --> 
  <link rel="shortcut icon" type="image/ico" href="{{ asset('icons/favicon.png') }}" />

  <!-- Custom fonts for this template-->
  <link href="{{ asset('inmobiliarias/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('inmobiliarias/css/sb-admin-2.min.css') }}" rel="stylesheet">

  <style type="text/css">
    .bg-login-image{background:url(http://54.191.69.59:8001/inmobiliarias/img/login.png);background-position:center;background-size:cover}
  </style>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6" style="padding-bottom: 110px; padding-top: 110px;">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">INGRESAR</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('rezepka/login_cliente_inmobiliaria') }}">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                      <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Tu Email..." value="{{ old('email') }}">
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }}">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Tu clave...">
                      {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Ingresar</button>
                    <hr>
                    {!! $errors->first('email', '<center><span class="help-block text-danger border-bottom-danger">:message</span></center>') !!}
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('inmobiliarias/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('inmobiliarias/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('inmobiliarias/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('inmobiliarias/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
