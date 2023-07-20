@extends('layout.panel')

@section('content')

<div>
<div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/matricula.jpg') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
        <div class="card-body">
        <center><a href="{{Route('principal.create')}}"class="btn btn-lg btn-info">Ficha Matricula</a></center>
        </div>
      </div>
      <br>
  <div class="row row-cols-1 row-cols-md-2 g-4">

  <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/gradoseccion.png') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{route('cursos.index')}}" class="btn btn-lg btn-info">Grado/Sección</a></center>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/requisitos.jpg') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
        <div class="card-body">
        <center><a href="{{Route('requisito.index')}}" class="btn btn-lg btn-info">Requisitos Recibidos</a></center>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/compromisos.png') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{route('indexcompromiso.create')}}" class="btn btn-lg btn-info">Compromiso</a></center>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/ficha.png') }}" class="card-img-top" alt="..." style="width:120px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{route('reportes.index')}}" class="btn btn-lg btn-info">Reporte Matricula</a></center> 
        </div>
      </div>
    </div>
  </div>
</div>
@endsection