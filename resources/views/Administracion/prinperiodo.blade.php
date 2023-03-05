@extends('layout.panel')

@section('content')

<div>
  <div class="row row-cols-1 row-cols-md-4 py-8 g-12">
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/inicio.png') }}" class="card-img-top" alt="..." style="width:210px;height:200px;"></center>
        <div class="card-body">
          <center><a href="{{Route('inicio.create')}}" class="btn btn-lg btn-info">Inicio de Matricula </a></center>
          
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/cierree.png') }}" class="card-img-top" alt="..." style="width:190px;height:200px;"></center>
 <div class="card-body">
          <center><a href="{{Route('cierre.create')}}" class="btn btn-lg btn-info">Cierre de Matricula</a></center>
        </div>
      </div>
    </div>

  


@endSection
