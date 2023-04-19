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
    <li class="nav-item">
      <a class="nav-link " href="{{route('cursos.index')}}">
        <i class="fas fa-chalkboard text-purple"></i> Grado/Curso
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link " href="{{route('secciones.index')}}">
        <i class="fas fa-edit text-pink"></i> Sección
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link " href="{{route('horario.index')}}">
        <i class="fas fa-calendar-alt text-blue"></i> Horario
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link " href="{{route('dashboardsec.index')}}">
        <i class="fas fa-chalkboard-teacher text-yellow"></i> Secretaria
      </a>
    </li>
    <li class="nav-item">
      <a href="{{Route('panelorientacion.index')}}" class="nav-link " href="./examples/tables.html">
        <i class="fas fa-book-reader text-red"></i> Orientación
      </a>
    </li>
    <li class="nav-item">
        <a href="{{Route('consejeria.index')}}" class="nav-link " href="./examples/tables.html">
          <i class="fas fa-users text-red"></i> Consejeria
        </a>
      </li>
      <li class="nav-item">
        <a href="{{Route('paneltesoreria.index')}}" class="nav-link " href="./examples/tables.html">
          <i class="fas fa-comment-dollar text-green"></i> Tesoreria
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
