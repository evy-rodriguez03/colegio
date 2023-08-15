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
    <strong>¡Por favor!</strong> {{$error}}
</div>
@endforeach
@endif
<form action="{{ route('cursos.index') }}" method="POST">
    @csrf
    <div class="form-row">
    <div class="col-md-4 mb-3">
    <label for="niveleducativo">Grado:</label>
    <select class="form-control" name="niveleducativo" required>
        <option value="">Seleccione un grado</option>
        @foreach ($grados as $grado)
        <option value="{{ $grado->nombre }}">{{ $grado->nombre }}</option>
        @endforeach
    </select>
    <div class="valid-feedback">Looks good!</div>
</div>

        <div class="col-md-4 mb-3">
            <label for="modalidad">Modalidad</label>
            <select type="text" id="modalidad" name="modalidad" class="form-control" required value="{{ old('modalidad') }}">
            <option value="">Seleccione una modalidad</option>
        @foreach ($modalidades as $modalidad)
        <option value="{{ $modalidad->nombre }}">{{ $modalidad->nombre }}</option>
        @endforeach
            </select>
            <div class="valid-feedback">Looks good!</div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="jornada">Jornada</label>
            <select type="text" id="jornada" name="jornada" class="form-control" required value="{{ old('jornada') }}">
            <option value="">Seleccione una jornada</option>
        @foreach ($jornadas as $jornada)
        <option value="{{ $jornada->jornada }}">{{ $jornada->jornada }}</option>
        @endforeach
            </select>
        </div>
    


    <div class="col-md-4 mb-3">
            <label for="seccion">Sección</label>
            <select type="text" id="seccion" name="seccion" class="form-control" required value="{{ old('seccion') }}">
            <option value="">Seleccione una Seccion</option>
        @foreach ($secciones as $seccion)
        <option value="{{ $seccion->nombre }}">{{ $seccion->nombre }}</option>
        @endforeach
            </select>
        </div>
  
    <div class="col-md-4 mb-3">
            <label for="horario">Horario</label>
            <select type="text" id="horario" name="horario" class="form-control" required value="{{ old('horario') }}">
            <option value="">Seleccione Horario</option>
        @foreach ($horarios as $horario)
        <option value="{{$horario->hora_inicio}}">{{ $horario->hora_inicio }}-{{$horario->hora_final}}</option>
        @endforeach
            </select>
        </div>
        </div>

    <button class="btn btn-primary btn-lg" type="submit">Guardar</button>
    <a href="{{ route('grados.index') }}" class="btn btn-lg btn-primary">Cancelar</a>
</form>


@endsection