<ul class="navbar-nav">
    <li class="nav-item  active ">
      <a class="nav-link  active " href="./index.html">
        <i class="ni ni-tv-2 text-primary"></i> Panel
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="./examples/icons.html">
        <i class="ni ni-hat-3"></i> Alumnos
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="./examples/maps.html">
        <i class="fas fa-user-tie text-orange"></i> Padres
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{route('dashboardsec.index')}}">
        <i class="fas fa-chalkboard-teacher text-yellow"></i> Secretaria
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="./examples/tables.html">
        <i class="fas fa-book-reader text-red"></i> Orientación
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="./examples/tables.html">
          <i class="fas fa-users text-red"></i> Consejeria
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="./examples/tables.html">
          <i class="fas fa-comment-dollar text-red"></i> Tesore
        </a>
      </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{route('login.index')}}"
      onclick="event.preventDefault(); document.getElementbyId('formlogout').submit();"
      >
        <i class="fas fa-sign-in-alt"></i> Cerrar sesion
      </a>
      <form action="{{route('login.index')}}" method="POST" style="display: none;" id="formlogout">
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