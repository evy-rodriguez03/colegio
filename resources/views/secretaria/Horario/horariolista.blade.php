@extends('layout.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="mb-0">Lista de Horarios</h1>
                </div>
                <div class="col text-right">
                    <a href="{{ route('horario.create') }}" class="btn btn-lg btn-success">
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
                            <th>Jornada</th>
                            <th>Descripción</th>
                            <th>Hora Inicial</th>
                            <th>Hora Final</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($horarios as $horario)
                            <tr>
                                <td>{{$horario->jornada}}</td>
                                <td>{{$horario->descripcion}}</td>
                                <td>{{$horario->hora_inicial}}</td>
                                <td>{{$horario->hora_final}}</td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

