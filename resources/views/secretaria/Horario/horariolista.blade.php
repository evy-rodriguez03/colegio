@extends('layout.panel')

@section('css')
<style>
    .btn-sm-custom {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.2rem;
    }
</style>
@endsection

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Lista de Horarios</h1>
            </div>
            <div class="col text-right">
                <a href="{{ route('horario.create') }}" class="btn btn-lg btn-primary">Agregar Horario</a>
                <a href="{{ route('configuracion.index') }}" class="btn btn-lg btn-success">
                    <i class="fas fa-angle-left"></i> Regresar
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light"> <!-- Agregar esta clase -->
                    <tr>
                        <th>Jornada</th>
                        <th>Descripción</th>
                        <th>Hora Inicial</th>
                        <th>Hora Final</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($horarios as $horario)
                        <tr>
                            <td>{{ $horario->jornada }}</td>
                            <td>{{ $horario->descripcion }}</td>
                            <td>{{ $horario->hora_inicio }}</td>
                            <td>{{ $horario->hora_final }}</td>
                            <td>
                                <div class="btn-group">
                                    <!-- Botón para la vista de edición -->
                                    <form action="{{ route('horario.destroy', $horario->id) }}" method="POST" class="form-eliminarhorario">
                                        <a href="{{ route('horario.edit', $horario->id) }}" class="btn btn-sm btn-primary btn-sm-custom">Editar</a>

                                        <!-- Botón para eliminar -->
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-sm-custom">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
