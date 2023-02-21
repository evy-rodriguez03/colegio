@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Agregar Nuevo Personal</h3>
        </div>
        <div class="col text-right">
          <a href="{{url('#')}}" class="btn btn-sm btn-success">
            <i class="fas fa-angle-left"></i>
            Regresar</a>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">
        <form action="">
            <div class="form-group">
                <label for="name">Nombre Docente</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="name2">Correo Electronico</label>
                <input type="text" name="name2" class="form-control">
            </div>

            <div class="form-group">
                <label for="name2">Contraseña</label>
                <input type="password" name="name3" class="form-control">
            </div>
            <div class="form-group">
                <label for="name2">Cargo</label>
                <select class="form-control" name="cargo_personal">
                <option value="">Elegir</option>
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