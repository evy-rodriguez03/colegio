@extends('layout.panel')


@section('content')
<style>
.pagination .page-link span {
    font-size: 14px;
}

.pagination .page-link svg {
    width: 12px;
    height: 12px;
}

</style>

<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Confirmacion de Pasos de Matricula</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('dashboard.index')}}" class="btn btn-lg btn-primary">Regresar</a>
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
            <th scope="col">Telefono de encargado</th>
            <th scope="col">Grado</th>
          </tr>
        </thead>
        <tbody>
         
@endsection