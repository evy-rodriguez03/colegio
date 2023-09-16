@extends('layout.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">  
          <h3 class="mb-0">Editar Perfil</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('profile')}}" class="btn btn-lg btn-success">
            <i class="fas fa-angle-left"></i>
            Regresar</a>
        </div>
      </div>
    </div>
    
    <!-- Formulario para crear -->
    <div class="card-body">

      @if ($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>¡Porfavor!</strong> {{$error}}
        </div>
          @endforeach
      @endif
      
      <form method="POST" action="{{ url('profile/'.Auth::user()->id) }}">
 
        @csrf
        @method('PUT')
        <div class="card-body">
               
                <div class="pl-lg-9">
                  <div class="row">
                    <div class="col-lg-10">
                      <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nombre</label>
                                        <input class="form-control" type="text" name="name" value="{{ old('name', Auth::user()->name) }}">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Usuario</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email', Auth::user()->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Cargo</label>
                                        <select class="form-control" name="role" value="{{ old('role', Auth::user()->role) }}">
                                        <option value="">Elegir</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Secretaria">Secretaria</option>
                                        <option value="Orientacion">Orientacion</option>
                                        <option value="Consejeria">Consejeria</option>
                                        <option value="Tesoreria">Tesoreria</option>
                                        </select>
                                    </div>
                            
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Contraseña</label>
            <input class="form-control" type="password" name="password" value="{{ old('password', auth()->user()->password) }}">
        </div>
          </div>
             </div> 
        <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
    </form>
</div>
@endsection