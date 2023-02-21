<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
      <h6 class="text-overflow m-0">¡Bienvenido!</h6>
    </div>
    <a href="#" class="dropdown-item">
      <i class="ni ni-single-02"></i>
      <span>Mi Perfil</span>
    </a>
    <a href="#" class="dropdown-item">
      <i class="ni ni-settings-gear-65"></i>
      <span>Configuración</span>
    </a>
    <div class="dropdown-divider"></div>
    <a href="{{route('login.index')}}"
    onclick="event.preventDefault(); document.getElementbyId('formlogout').submit();"class="dropdown-item">
      <i class="ni ni-user-run"></i>
      <span>Cerrar sesión</span>
      <form action="{{route('login.index')}}" method="POST" style="display: none;" id="formlogout">
        @csrf
    </form>
    </a>
  </div>