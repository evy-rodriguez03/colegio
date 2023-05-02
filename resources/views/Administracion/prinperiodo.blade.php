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
