
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <style>
.submenu {
      display: none;
      background-color: #f8f9fa;
      border-radius: 0.25rem;
      padding: 10px;
      box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
      position: absolute;
      right: 0;
      top: 100%;
      z-index: 1000;
    }

    .show-submenu {
      display: block;
    }

    .nav-item {
      margin-right: 15px;
    }

    .nav-link i {
      font-size: 20px;
      margin-right: 5px;
    }

    .nav-link.logout-link {
      color: #dc3545;
    }
  </style>

  <ul class="navbar-nav">
    <li class="nav-item  active ">
      <a href="{{Route('dashboard.index')}}" class="nav-link  active " href="./index.html">
        <i class="ni ni-tv-2 text-primary"></i> Panel
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{route('alumnos.index')}}">
        <i class="ni ni-hat-3"></i> Alumnos
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{route('padres.index')}}">
        <i class="fas fa-user-tie text-orange"></i> Padres
      </a>
    </li>
    
    <li class="nav-item dropdown"> <!-- Cambiado a un elemento dropdown -->
      <a class="nav-link dropdown-toggle" href="#" id="secretariaDropdown" role="button" data-bs-toggle="dropdown">
        <i class="fas fa-chalkboard-teacher text-yellow"></i> Secretaria
      </a>
      <ul class="dropdown-menu submenu" aria-labelledby="secretariaDropdown"> <!-- Cambiado a un dropdown-menu -->
        <li><a class="dropdown-item" href="{{Route('principal.create')}}">Matricula</a></li>
        <li><a class="dropdown-item" href="{{route('cursos.index')}}">Grado/Seccion</a></li>
        <li><a class="dropdown-item" href="{{route('indexcompromiso.create')}}">Compromiso</a></li>
        <li><a class="dropdown-item" href="{{route('cursostotales.index')}}">Curso Totales</a></li>
        <li><a class="dropdown-item" href="{{route('periodo')}}">Periodos Matricula</a></li>
      </ul>
    </li>

    
    <li class="nav-item dropdown"> <!-- Cambiado a un elemento dropdown -->
      <a class="nav-link dropdown-toggle" href="#" id="orientacionDropdown" role="button" data-bs-toggle="dropdown">
        <i class="fas fa-book-reader text-red"></i> Orientación
      </a>
      <ul class="dropdown-menu submenu" aria-labelledby="orientacionDropdown"> <!-- Cambiado a un dropdown-menu -->
        <li><a class="dropdown-item" href="{{Route('preescolarindex.index')}}">Formulario Pre-Escolar</a></li>
        <li><a class="dropdown-item" href="{{Route('escolar.index')}}">Formulario Escolar</a></li>
      </ul>
    </li>

    <li class="nav-item">
        <a href="{{Route('tabla.index')}}" class="nav-link " href="./examples/tables.html">
          <i class="fas fa-users text-red"></i> Consejeria
        </a>
      </li>

      <li class="nav-item dropdown"> <!-- Cambiado a un elemento dropdown -->
      <a class="nav-link dropdown-toggle" href="#" id="tesoreriaDropdown" role="button" data-bs-toggle="dropdown">
        <i class="fas fa-comment-dollar text-green"></i> Tesorería
      </a>
      <ul class="dropdown-menu submenu" aria-labelledby="tesoreriaDropdown"> <!-- Cambiado a un dropdown-menu -->
        <li><a class="dropdown-item" href="{{Route('firmacontratotesoreria.create')}}">Firma de Contrato</a></li>
        <li><a class="dropdown-item" href="{{Route('vistapago.index')}}">Pago a Realizar</a></li>
        <li><a class="dropdown-item" href="{{Route('retrasadas.index')}}">Pago Retrasado</a></li>
      </ul>
    </li>

    <li class="nav-item dropdown"> <!-- Cambiado a un elemento dropdown -->
      <a class="nav-link dropdown-toggle" href="#" id="configuracionDropdown" role="button" data-bs-toggle="dropdown">
        <i class="fas fa-cogs text-blue"></i> Configuración
      </a>
      <ul class="dropdown-menu submenu" aria-labelledby="configuracionDropdown"> <!-- Cambiado a un dropdown-menu -->
        <li><a class="dropdown-item" href="{{Route('grados.index')}}">Grado</a></li>
        <li><a class="dropdown-item" href="{{Route('horario.index')}}">Horario</a></li>
        <li><a class="dropdown-item" href="{{Route('jornada.index')}}">Jornada</a></li>
        <li><a class="dropdown-item" href="{{Route('modalidad.index')}}">Modalidad</a></li>
        <li><a class="dropdown-item" href="{{Route('seccionindex.index')}}">Sección</a></li>
      </ul>
    </li>

    <li class="nav-item">
        <a href="{{Route('usuarios.index')}}" class="nav-link " href="./examples/tables.html">
          <i class="	fas fa-users-cog text-Dark grey"></i> Personal
        </a>
      </li>

    <li class="nav-item">
      <a href="#" class="nav-link " onclick="event.preventDefault(); document.getElementById('formlogout').submit();">
        <i class="fas fa-sign-in-alt"></i> Cerrar sesion
      </a>
      <form action="{{route('logout')}}" method="POST" style="display: none;" id="formlogout">
      @csrf
      </form>
    </li>
  </ul>
  <!-- Divider -->
  <hr class="my-3">
  <!-- Heading -->

  <!-- Navigation -->
  <ul class="navbar-nav mb-md-3">
    </li>
  </ul>

  