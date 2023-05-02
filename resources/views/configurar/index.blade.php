@extends('layout.panel')

@section('content')

<div>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/curso.png') }}" class="card-img-top" alt="..." style="width:150px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{Route('usuarios.index')}}" class="btn btn-lg btn-info">Grado</a></center>
          
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/horario.png') }}" class="card-img-top" alt="..." style="width:160px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{Route('horario.index')}}" class="btn btn-lg btn-info">Horario</a></center>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/jornada.png') }}" class="card-img-top" alt="..." style="width:150px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{route ('periodo')}}" class="btn btn-lg btn-info">Jornada</a></center>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/modalidad.jpg') }}" class="card-img-top" alt="..." style="width:150px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{url('/usuarios/crear')}}" class="btn btn-lg btn-info">Modalidad</a></center>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/seccion.jpg') }}" class="card-img-top" alt="..." style="width:150px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{url('/usuarios/crear')}}" class="btn btn-lg btn-info">Sección</a></center>
        </div>
      </div>
    </div>

@endSection
