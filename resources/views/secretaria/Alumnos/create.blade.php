@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Agregar Nuevo Alumno</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('alumnos.index')}}" class="btn btn-lg btn-success">
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
            <strong>¡Por favor!</strong> {{$error}}
        </div>
          @endforeach
      @endif
      <form action="{{ route('alumnos.index') }}" method="POST">
        @csrf
        <div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="primernombre">Primer Nombre</label>
              <input type="text" class="form-control" name="primernombre" placeholder="Primer nombre" required>
              <div class="valid-feedback"></div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="segundonombre">Segundo Nombre</label>
              <input type="text" class="form-control" name="segundonombre" placeholder="Segunda nombre" >
              <div class="valid-feedback">Looks good!</div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="telefonodeencargado">Número de Encargado</label>
              <input type="number" class="form-control" name="telefonodeencargado" placeholder="99999999" required>
              <div class="valid-feedback">Looks good!</div>
          </div>
      </div>
      
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="primerapellido">Primer Apellido</label>
                <input type="text" class="form-control" name="primerapellido" placeholder="Primer Apellido" required>
                <div class="valid-feedback">#</div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="segundoapellido">Segundo Apellido</label>
                <input type="text" class="form-control" name="segundoapellido" placeholder="Segundo Apellido">
                <div class="valid-feedback">#</div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="numerodeidentidad">Número de identidad</label>
                <input type="text" class="form-control" name="numerodeidentidad" placeholder="Sin guiones" required>
                <div class="invalid-feedback">#</div>
            </div>
        </div>
        <div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="fechadenacimiento">Fecha de Nacimiento</label>
              <input type="date" class="form-control" name="fechadenacimiento" required>
              <div class="invalid-feedback">#</div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="alergia">Alergia</label>
              <input type="text" class="form-control" name="alergia" placeholder="Si, al polvo/No" required>
              <div class="invalid-feedback">#</div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="lugardenacimiento">Lugar de nacimiento</label>
              <input type="text" class="form-control" name="lugardenacimiento" placeholder="Lugar de nacimiento" required>
              <div class="valid-feedback"></div>
          </div>
      </div>
      
        <div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="genero">Género</label>
              <input type="text" class="form-control" name="genero" placeholder="Género" required>
              <div class="valid-feedback">Looks good!</div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" name="direccion" placeholder="Dirección" required>
          </div>
          <div class="col-md-4 mb-3">
              <label for="numerodehermanosenicgc">Número de hermanos en ICGC</label>
              <input type="number" class="form-control" name="numerodehermanosenicgc" placeholder="Número de hermanos en ICGC" >
          </div>
      </div>
                <div class="checkbox-group">
                  <hr class="mb-2">
                  <h4 class="mb-0">Si el alumno entrego estos documentos, puede marcarlos, sino dejelos en blanco.</h4>
                  <hr class="mb-2">
                  <label>
                    <input type="checkbox" name="fotografias" value="1">
                    Fotografias del alumno
                  </label>
                  <label>
                    <input type="checkbox" name="fotografiasdelpadre" value="2">
                    Fotografias del padre
                  </label>
                  <label>
                    <input type="checkbox" name="carnet" value="3">
                    Carnet de Vacunación
                  </label>
                  <label>
                    <input type="checkbox" name="certificadodeconducta" value="4">
                    Certificado de conducta
                  </label>
  
                </div>
                
                <button class="btn btn-primary btn-lg" type="submit">Guardar</button>
          </form>

    </div>
  </div>
@endsection