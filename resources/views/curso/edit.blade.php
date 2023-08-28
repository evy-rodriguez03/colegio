@extends('layout.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Editar Grado/Curso</h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('cursos.index') }}" class="btn btn-lg btn-success">
                    <i class="fas fa-angle-left"></i>
                    Regresar</a>
            </div>
        </div>
    </div>
    <!-- Formulario para editar -->
    <div class="card-body">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>¡Por favor!</strong> {{ $error }}
        </div>
        @endforeach
        @endif
        <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="niveleducativo">Grado:</label>
                    <select class="form-control" name="niveleducativo" required>
                        <option value="">Seleccione un grado</option>
                        @foreach ($grados as $grado)
                        <option value="{{ $grado->nombre }}" {{ $curso->niveleducativo == $grado->nombre ? 'selected' : '' }}>{{ $grado->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="modalidad">Modalidad:</label>
                    <select class="form-control" name="modalidad" required>
                        <option value="">Seleccione una modalidad</option>
                        @foreach ($modalidades as $modalidad)
                        <option value="{{ $modalidad->nombre }}" {{ $curso->modalidad == $modalidad->nombre ? 'selected' : '' }}>{{ $modalidad->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="jornada">Jornada:</label>
                    <select class="form-control" name="jornada" required>
                        <option value="">Seleccione una jornada</option>
                        @foreach ($jornadas as $jornada)
                        <option value="{{ $jornada->jornada }}" {{ $curso->jornada == $jornada->jornada ? 'selected' : '' }}>{{ $jornada->jornada }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="seccion">Sección:</label>
                    <select class="form-control" name="seccion" required>
                        <option value="">Seleccione una sección</option>
                        @foreach ($secciones as $seccion)
                        <option value="{{ $seccion->nombre }}" {{ $curso->seccion == $seccion->nombre ? 'selected' : '' }}>{{ $seccion->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="horario">Horario:</label>
                    <select class="form-control" name="horario" required>
                        <option value="">Seleccione un horario</option>
                        @foreach ($horarios as $horario)
                        <option value="{{ $horario->hora_inicio }}" {{ $curso->horario == $horario->hora_inicio ? 'selected' : '' }}>{{ $horario->hora_inicio }}-{{ $horario->hora_final }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-primary btn-lg" type="submit">Actualizar</button>
            <a href="{{ route('cursos.index') }}" class="btn btn-lg btn-primary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
