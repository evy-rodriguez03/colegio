<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Instituto Cosmer Garcia C.
  </title>
  <!-- Favicon -->
  <link href="{{ asset('img/brand/favicon.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
  <link href="{{ asset('js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
</head>

<body class="bg-white">
  <div class="main-content">


    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">   
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <img src="{{ asset('img/brand/') }}">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-info py-3 py-lg-5">
      <div class="container">
        <div class="header-body text-center mb-3">
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
      </div>
    </div>
   
    @yield('content')

    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              @if($errors->any())
              <div class="text-center text-muted mb-4">
                <small>Se encontro el siguiente error</small>
              </div>

              <div class="alert alert-danger" role="alert">
                {{ $errors-> first()}}
              </div>
              @else
              <div class="text-center text-muted mb-4">
                <h1>Login</h1>
              </div>
              @endif
              
              <form role="form" action="{{ route('dashboard.index') }}" method="POST" >
              @csrf  
              <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Correo Electronico" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Contraseña" type="password" name="pasword" required autocomplete="current-password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input name="remember" class="custom-control-input" id="remember" type="checkbox" {{ old('remember') ? 'Checked' : ''}}>
                  <label class="custom-control-label" for=" remember">
                    <span class="text-muted">Recordar Sessión</span>
                  </label>
                </div>
              
                <div class="text-center">
                  <button type="submit" class="btn btn-info my-4">Entrar</button>
                </div>
                <div class="col-6" >
              <a href="(#)"><small><center>Olvidaste tu contraseña</center></small></a>
            </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
          </div>
        </div>
      </div>
    </div>
    <footer class="py-5">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
        </div>
      </div>
    </footer>
  </div>
</body>

</html>