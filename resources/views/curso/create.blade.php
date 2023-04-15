@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Agregar Nuevo Grado/Curso</h3>
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
              <label for="curso">Nombre del Grado/Curso:</label>
              <input type="text" class="form-control" name="curso" placeholder="Primer Grado" required value="{{ old('curso') }}">
              <div class="valid-feedback"></div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="descripcion">Descripción</label>
              <input type="text" class="form-control" name="descripcion" placeholder="Primer año donde se ubican los niños de 6 a 8 años." required value="{{ old('descripcion') }}">
              <div class="valid-feedback">Looks good!</div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="niveleducativo">Nivel Educativo</label>
              <input type="text" class="form-control" name="niveleducativo" placeholder="Primaria" required value="{{ old('niveleducativo') }}">
              <div class="valid-feedback">Looks good!</div>
          </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="seccion">Sección</label>
            <input type="text" class="form-control" name="seccion" placeholder="Sección 1-B" required value="{{ old('seccion') }}">
            <div class="valid-feedback"></div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="horario">horario</label>
            <input type="text" class="form-control" name="horario" placeholder="13:00 a 13:50" required value="{{ old('descripcion') }}">
            <div class="valid-feedback">Looks good!</div>
        </div>
    </div>
      
      
        
                <button class="btn btn-primary btn-lg" type="submit">Guardar</button>
                <a href="{{route('cursos.index')}}" class="btn btn-lg btn-primary">Cancelar</a>
          </form>

    </div>
  </div>
@endsection