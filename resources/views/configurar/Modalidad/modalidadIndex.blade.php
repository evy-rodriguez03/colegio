@extends('layout.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="mb-0">Lista de Modalidades</h1>
                </div>
                <div class="col text-right">
                    <a href="{{ route('modalidad.create') }}" class="btn btn-lg btn-primary">Agregar Modalidad</a>
                    <a href="{{ route('configuracion.index') }}" class="btn btn-lg btn-success"> <i class="fas fa-angle-left"></i> Regresar</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light"> <!-- Agregar esta clase -->
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($modalidades as $modalidad)
                            <tr>
                                <td>{{ $modalidad->nombre }}</td>
                                <td>{{ $modalidad->descripcion }}</td>
                                <td>
                                    <div class="btn-group">
                                        <!-- Botón para editar -->
                                        <form action="{{ route('modalidad.destroy', $modalidad->id) }}" method="POST" class="form-eliminargrado">
                                            <a href="{{ route('modalidad.edit', $modalidad->id) }}" class="btn btn-sm btn-primary">Editar</a>

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
