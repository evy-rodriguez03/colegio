@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Agregar Nuevo Curso</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('cursos.index')}}" class="btn btn-lg btn-success">
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
      <form action="{{ route('cursos.index') }}" method="POST">
        @csrf
        <div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="curso">Curso:</label>
              <input type="text" class="form-control" name="curso" required>
              <div class="valid-feedback"></div>
          </div>
      </div>
      
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="seccion">Seccion:</label>
                <input type="text" class="form-control" name="seccion" placeholder="Solo se aceptan letras" required>
                <div class="valid-feedback"></div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="horario">Horario</label>
                <input type="text" class="form-control" name="horario" required>
                <div class="valid-feedback"></div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="horario">Periodo:</label>
                <input type="text" class="form-control" name="periodo" required>
                <div class="valid-feedback"></div>
            </div>
        </div>

        
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="jornada" >Jornada:</label>
                <select class="form-control" name="jornada" >
                <option >Jornada Matutina I</option>
                <option >Jornada Matutina II</option>
                </select>
                <div class="valid-feedback"></div>
         </div>
              </div>
                
                <hr class="mb-2">
                <button class="btn btn-primary btn-lg" type="submit">Guardar</button>
                <a href="{{route('cursos.index')}}" class="btn btn-lg btn-primary">Cancelar</a>
          </form>

    </div>
  </div>
@endsection