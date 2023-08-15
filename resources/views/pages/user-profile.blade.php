<!DOCTYPE html>
<html lang="en">

<head>

<style>
  .hide-button {
    display: none;
  }
</style>



  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
   Perfil Usuario
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
<link rel="stylesheet" href="estilos.css">
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">

    <!-- Navigation -->
    @include('includes.panel.menu')
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          @include('includes.panel.userOptions')
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="../index.html">
                <img src="{{ asset('img/brand/blue.png') }}">
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
      </div>
    </div>
  </nav>
  <div class="main-content">

    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route ('profile') }}">Mi Perfil</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">

                  <img src="{{ '/'.Auth::user()->imagen }}"  id="imagen-nav" onerror="cargarImagenPredeterminadaNav()">

                </span>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
      <h6 class="text-overflow m-0">¡Bienvenido!</h6>
    </div>
    <a href="{{ route ('profile') }}" class="dropdown-item">
      <i class="ni ni-single-02"></i>
      <span>Mi Perfil</span>
    </a>
    <a href="#" class="dropdown-item">
      <i class="ni ni-settings-gear-65"></i>
      <span>Configuración</span>
    </a>
    <div class="dropdown-divider"></div>
    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="ni ni-button-power"></i>
        <span>Cerrar sesión</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

  </div>

            </a>

    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hola</h1>

            <a href="{{ route('profile.edit') }}" class="btn btn-info">Editar Perfil</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">



                <img src="{{ '/'.Auth::user()->imagen }}" class="rounded-circle" id="imagen_perfil" onClick="cambiarImagen()" onerror="cargarImagenPredeterminada()">
              <form id="cambiarImagenForm" action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data" style="display: none;">
                 @csrf
                 <input type="file" name="image" id="imagen" style="display: none;">
               </form>
                  
          


                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">

                <form action="{{route ('imagenE.destroy',[Auth::user()->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button id="deleteProfileBtn" class="btn btn-sm btn-default float-right hide-button">Eliminar</button>
              </form>
  
              <script>
                 
              function cambiarImagen(){
               document.getElementById('imagen').click();
               }
            
               document.getElementById('imagen').addEventListener('change', function() {
               document.getElementById('cambiarImagenForm').submit();
              });

               //funcion cargar imagen por defecto 
               function cargarImagenPredeterminada() {
                document.getElementById('imagen_perfil').src = "{{ asset('img/brand/avatar.png') }}";
               }

               function cargarImagenPredeterminadaNav() {
               document.getElementById('imagen-nav').src = "{{ asset('img/brand/avatar.png') }}";
               }


    // Función para verificar si el usuario tiene una foto de perfil
    function tieneFotoPerfil() {
      var imagen = "{{ Auth::user()->imagen }}"; // Aquí utilizamos el atributo imagen del modelo User para obtener la URL de la foto de perfil del usuario
      return imagen !== null && imagen !== undefined && imagen !== "";
    }

    // Función para ocultar el botón de borrar si no hay foto de perfil
    function ocultarBotonBorrar() {
      var botonBorrar = document.getElementById("deleteProfileBtn");
      if (!tieneFotoPerfil()) {
        botonBorrar.style.display = "none";
      } else {
        botonBorrar.style.display = "block"; // O cualquier otro estilo para mostrar el botón
      }
    }

    // Llamamos a la función de ocultarBotonBorrar al cargar la página (o cuando se actualiza la foto de perfil)
    ocultarBotonBorrar();
  </script>

              </div>
            </div>

            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  </div>
                </div>
              </div>
              <div class="text-center">
                <div class="h5 font-weight-300">
                </div>
                <hr class="my-4" />
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">

            <div class="card-body">
             <form>
                <h4 class="heading-small text-muted mb-4">Informacion del Usuario</h4>
                <div class="pl-lg-9">
                  <div class="row">
                    <div class="col-lg-10">
                    <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nombre</label>
                                        <input class="form-control" type="text" name="username" value="{{ old('name', auth()->user()->name) }}">
                `                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Usuario</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Cargo</label>
                                        <input class="form-control" type="text" name="firstname"  value="{{ old('role', auth()->user()->role) }}">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Contraseña</label>
                                        <input class="form-control" type="text" name="lastname" value="{{ old('password', auth()->user()->password) }}">
                                    </div>
                                </div>
                            </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-c`enter justify-content-xl-between">
          <div class="col-xl-6">
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core   -->
  <script src="{{ asset('js/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="{{ asset('js/argon-dashboard.min.js?v=1.1.2') }}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>
