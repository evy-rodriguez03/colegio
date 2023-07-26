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
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                </table>
            </div>
        </div>
    </div>
@endsection
