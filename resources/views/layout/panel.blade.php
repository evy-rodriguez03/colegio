<html lang="en">

<head>
  <style>

.tabla-dashboard .table {
  border-collapse: collapse;
  width: 100%;
}

.tabla-dashboard .table th,
.tabla-dashboard .table td {
  padding: 10px;
  text-align: center;
}

.tabla-dashboard .table th {
  background-color: #333;
  color: #fff;
}

.tabla-dashboard .table tbody tr:nth-child(odd) {
  background-color: #f2f2f2;
}

.tabla-dashboard .table tbody tr:hover {
  background-color: #ddd;


}


    #agregar-padre-link {
   display: none;
}

  </style>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Instituto Cosme Garcia C.
  </title>
  <!-- JSS Files -->

  <!-- Favicon -->
  <link href=" {{asset('img/brand/favicon.png') }} " rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="  {{asset('js/plugins/nucleo/css/nucleo.css') }}"  rel="stylesheet" />
  <link href=" {{asset('js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}} " rel="stylesheet" />
  <!-- CSS Files -->
  <link href=" {{asset('css/argon-dashboard.css?v=1.1.2')}} " rel="stylesheet" />
  <link rel="stylesheet" href=" {{asset('css/nuevo-estilo.css')}} ">
  @stack('styles')


  @yield('css')
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.html" >
        <br>

      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          @include('includes.panel.userOptions')
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ '/'.Auth::user()->imagen }}">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src=" {{asset('img/brand/ins.jpg')}} >
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>


        <!-- Navigation -->
            @include('includes.panel.menu')
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Panel Administrativo</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                
                <img src="{{ '/'.Auth::user()->imagen }}"  id="imagen-nav" onerror="cargarImagenPredeterminadaNav()">

                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"></span>
                </div>
              </div>
            </a>
            @include('includes.panel.userOptions')
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
     
    <script>
      
      function cargarImagenPredeterminadaNav() {
               document.getElementById('imagen-nav').src = "{{ asset('img/brand/avatar.png') }}";
               }
    </script>

    <!-- Header -->
    <div class="header bg-gradient-info pb-8 pt-5 pt-md-8">

    </div>
    <div class="container-fluid mt--7">
      @yield('content')

    </div>
  </div>
  <!--   Core   -->
  <script src=" {{asset('js/plugins/jquery/dist/jquery.min.js') }} "></script>
  <script src=" {{asset('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}} "></script>
  <!--   Optional JS   -->
  <script src=" {{asset('js/plugins/chart.js/dist/Chart.min.js')}} "></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>

  @include('includes.panel.footer')
  @yield('js')
</body>

</html>
