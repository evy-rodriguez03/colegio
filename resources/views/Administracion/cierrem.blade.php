@extends('layout.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h1 class="mb-0">Cierre de Matricula</h1>
        </div>
        <div class="col text-right">
          <a href="{{url('periodo')}}" class="btn btn-lg btn-info">
            <i class="fas fa-angle-left"></i>
            Regresar</a>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->

    <a href="{{Route('evento.index')}}" class="btn btn-lg btn-info">Ingreso de Matricula </a>
   
        
@endsection