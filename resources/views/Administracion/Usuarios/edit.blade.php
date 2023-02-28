@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Editar Personal</h3>
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
        <form action="{{url('/usuarios/'.$usuarios->id)}}" method="POST">
          @csrf
          @method('PUT')
            <div class="form-group">
                <label for="name">Nombre del Usuario</label>
                <input type="text" name="name" class="form-control" required value="{{old('name', $usuarios->name)}}">
            </div>
            <div class="form-group">
                <label for="email">Correo Electronico</label>
                <input type="text" name="email" class="form-control" required value="{{old('email', $usuarios->email)}}">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" required >
            </div>
            <div class="form-group">
                <label for="role">Rol</label>
                <select class="form-control" name="role" required value="{{old('role', $usuarios->role)}}">
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