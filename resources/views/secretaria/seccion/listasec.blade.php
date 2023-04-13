@extends('layout.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="mb-0">Lista de Sección</h1>
                </div>
                <div class="col text-right">
                    <a href="{{ route('secciones.create') }}" class="btn btn-lg btn-success">
                        Agregar
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body"> 
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>Jornada</th>
                            <th>Modalidad</th>
                            <th>Malla Curricular</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seccions as $seccion)
                            <tr>
                                <td>{{$seccion->descripcion}}</td>
                                <td>{{$seccion->jornada}}</td>
                                <td>{{$seccion->modalidad}}</td>
                                <td>{{$seccion->malla_curricular}}</td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

