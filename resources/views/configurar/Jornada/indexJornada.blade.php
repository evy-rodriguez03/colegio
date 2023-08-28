@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Lista de Jornadas</h1>
            </div>
            <div class="col text-right">
                <a href="{{ route('jornada.create') }}" class="btn btn-lg btn-primary">
                    Agregar Jornada
                </a>
                <a href="{{ route('configuracion.index') }}" class="btn btn-lg btn-success"> <i class="fas fa-angle-left"></i> Regresar</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush">
                <thead class="thead-light"> <!-- Agregar esta clase -->
                    <tr>
                        <th>Jornada</th>
                        <th>Descripción</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jornadas as $jornada)
                        <tr>
                            <td>{{ $jornada->jornada }}</td>
                            <td>{{ $jornada->descripcion }}</td>
                            <td>
                                <div class="btn-group">
                                    <!-- Botón para editar -->
                                    <form action="{{ route('jornada.destroy', $jornada->id) }}" method="POST" class="form-eliminarjornada">
                                        <a href="{{ route('jornada.edit', $jornada->id) }}" class="btn btn-sm btn-primary">Editar</a>

                                        <!-- Botón para eliminar -->
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
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
