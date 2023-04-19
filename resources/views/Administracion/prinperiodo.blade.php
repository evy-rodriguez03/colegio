@extends('layout.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="mb-0">Matriculados</h1>
                </div>
                <div class="col text-right">
                    <a href="{{ route('horario.create') }}" class="btn btn-lg btn-success">
                        Agregar
                    </a>
                </div>
            </div>
        </div>


        <div>
        <div class="row row-cols-1 row-cols-md-4 py-8 g-12">
        <div class="col">
        <div class="card">
        <div class="card-body">
        <a href="{{Route('inicio.create')}}" class="label label-info">Inicio de Matricula </a>
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



@extends('layout.panel')

@section('content')

<div>
  <div class="row row-cols-1 row-cols-md-4 py-8 g-12">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <a href="{{Route('inicio.create')}}" class="label label-info">Inicio de Matricula </a>
        </div>
      </div>
    </div>

    <div class="card-body">
     @if (session('notification'))
       <div class="alert alert-success" role="alert">
     {{session('notification')}}
    </div>
     @endif
    </div>
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Número de identidad</th>
            <th scope="col">Padre encargado</th>
            <th scope="col">Grado</th>
            <th scope="col">Sección</th>
            <th scope="col">Periodo</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  
@endSection
