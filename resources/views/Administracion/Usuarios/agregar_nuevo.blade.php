@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Agregar Nuevo Personal</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('usuarios.index')}}" class="btn btn-sm btn-success">
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
        <form action="{{route('usuarios.index')}}" method="POST">
          @csrf
            <div class="form-group">
                <label for="nombre">Nombre Docente</label>
                <input type="text" name="nombre" class="form-control" required value="{{old('nombre')}}">
            </div>
            <div class="form-group">
              <label for="apellido">Apellido Docente</label>
              <input type="text" name="apellido" class="form-control" required value="{{old('apellido')}}">
          </div>
            <div class="form-group">
                <label for="correo">Correo Electronico</label>
                <input type="text" name="correo" class="form-control" required value="{{old('correo')}}">
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="text" name="contrasena" class="form-control" required value="{{old('contrasena')}}">
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select class="form-control" name="rol" required>
                  <option value="">Elegir</option>
                  <option value="Administrador">Administrador</option>
                 <option value="Secretaria">Secretaria</option>
                 <option value="Orientacion">Orientacion</option>
                 <option value="Consejeria">Consejeria</option>
                 <option value="Tesoreria">Tesoreria</option>
               </select>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
        </form>
    </div>
  </div>
@endsection