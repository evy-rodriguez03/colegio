@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Editar Curso</h3>
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

      <form method="POST" action="{{ route('cursos.update', ['curso' => $curso->id]) }}">
        @csrf
        @method('PUT')
              <div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="niveleducativo"> Nivel Educativo:</label>
              <select class="form-control" name="niveleducativo" value="{{$curso->niveleducativo}}">
              <option value="">Seleccione una opción</option>
          <optgroup label="Prebásica">
              <option value="prekinder">Pre-kinder</option>
              <option value="kinder">Kinder</option>
              <option value="preparatoria">Preparatoria</option>
          </optgroup>
          <optgroup label="Básica">
            <option value="primero">1º Grado</option>
            <option value="segundo">2º Grado</option>
            <option value="tercero">3º Grado</option>
            <option value="cuarto">4º Grado</option>
            <option value="quinto">5º Grado</option>
            <option value="sexto">6º Grado</option>
            <option value="septimo">7º Grado</option>
            <option value="octavo">8º Grado</option>
            <option value="noveno">9º Grado</option>
        </optgroup>
        <optgroup label="Secundaria">
            <option value="decimo">10º Medio</option>
            <option value="undecimo">11º Medio</option>
            
        </optgroup>
    </select>
    <div class="valid-feedback">Looks good!</div>
</div>

          <div class="col-md-4 mb-3">
              <label for="modalidad">Modalidad</label>
              <select type="text" id="modalidad" name="modalidad" class="form-control" value="{{$curso->modalidad}}">
              <option value="">Elegir</option>
              <option value="matutina">Bilingue</option>
              <option value="extendida">Español</option>
          </select>
              <div class="valid-feedback">Looks good!</div>
          </div>


          <div class="col-md-4 mb-3">
              <label for="jornada">Jornada</label>
              <select type="text" id="jornada" name="jornada" class="form-control" value="{{$curso->jornada}}">
              <option value="">Elegir</option>
              <option value="matutina">Jornada Matutina</option>
              <option value="extendida">Jornada Extendida</option>
         </select>
          </div>
      </div>

      <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="seccion">Sección</label>
            <input type="text" class="form-control" name="seccion" placeholder="Sección 1-B" value="{{$curso->seccion}}">
            <div class="valid-feedback"></div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="horario">horario</label>
            <input type="text" class="form-control" name="horario" placeholder="13:00 a 13:50" value="{{$curso->horario}}">
            <div class="valid-feedback">Looks good!</div>
        </div>
    </div>
                
                <hr class="mb-2">
                <button class="btn btn-primary btn-lg" type="submit">Guardar</button>
                <a href="{{route('cursos.index')}}" class="btn btn-lg btn-primary">Cancelar</a>
          </form>

    </div>
  </div>
@endsection