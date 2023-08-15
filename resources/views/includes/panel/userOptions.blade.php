<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
      <h6 class="text-overflow m-0">¡Bienvenido!</h6>
    </div>
    <a href="{{ route ('profile') }}" class="dropdown-item">
      <i class="ni ni-single-02"></i>
      <span>Mi Perfil</span>
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
