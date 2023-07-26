@extends('layout.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="mb-0">Editar Horario</h1>
                </div>
                <div class="col text-right">
                    <a href="{{ route('horario.index') }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('horario.update', $horario->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="jornada">Jornada</label>
                    <input type="text" class="form-control" id="jornada" name="jornada" value="{{ $horario->jornada }}">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $horario->descripcion }}">
                </div>

                <div class="form-group">
                    <label for="hora_inicio">Hora Inicial</label>
                    <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="{{ $horario->hora_inicio }}">
                </div>

                <div class="form-group">
                    <label for="hora_final">Hora Final</label>
                    <input type="time" class="form-control" id="hora_final" name="hora_final" value="{{ $horario->hora_final }}">
                </div>

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
@endsection