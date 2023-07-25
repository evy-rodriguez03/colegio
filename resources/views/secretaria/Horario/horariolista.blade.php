@extends('layout.panel')

@section('content')

        <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h1 class="mb-0">Lista de Horarios</h1>
        </div>
        <div class="col text-right">
          <a href="{{route('horario.create')}}" class="btn btn-lg btn-primary">Agregar Horario</a>
          <a href="{{route('configuracion.index')}}" class="btn btn-lg btn-success"> <i class="fas fa-angle-left"></i> Regresar</a>
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
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($horarios as $horario)
                            <tr>
                                <td>{{$horario->jornada}}</td>
                                <td>{{$horario->descripcion}}</td>
                                <td>{{$horario->hora_inicio}}</td>
                                <td>{{$horario->hora_final}}</td>
                                <td>
                                <form action="{{ route('horario.destroy', $horario->id) }}" method="POST" class="form-eliminarhorario">
                                @csrf
                                @method('DELETE')  <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection