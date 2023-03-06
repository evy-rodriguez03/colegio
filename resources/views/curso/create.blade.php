@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Agregar Nuevo Curso</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('cursos.index')}}" class="btn btn-sm btn-success">
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
                
                <hr class="mb-2">
                <a href="{{route('cursos.index')}}" class="btn btn-sm btn-success">Cancelar</a>
                <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
          </form>

    </div>
  </div>
@endsection