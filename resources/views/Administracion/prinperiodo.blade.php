@extends('layout.panel')

@section('content')

<!-- Tu formulario para crear un nuevo registro -->

<div class="card shadow">
    <div class="card-header border-3">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Periodo Matricula</h1>
            </div>
            <div class="col text-right">
                <a href="{{ route('dashboard.index') }}" class="btn btn-lg btn-primary">
                    <i class="fas fa-angle-left"></i>
                    Regresar
                </a>
            </div>
        </div>
    </div>
    <!-- Tabla para mostrar los registros existentes -->
    <div class="card-body">
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
                    <!-- Definir las columnas de la tabla -->
                    <th>Fecha de Inicio</th>
                    <th>Periodo de Matricula</th>
                    <th>Fecha de Cierre</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Recorrer los registros existentes -->
                @foreach ($periodo as $periodo)
                <tr>
                    <!-- Mostrar los valores de cada registro -->
                    <td>{{ $periodo->fechaInicio }}</td>
                    <td>{{ $periodo->periodoMatricula }}</td>
                    <td>{{ $periodo->fechaCierre }}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
