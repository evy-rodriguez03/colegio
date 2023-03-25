@extends('layout.panel')

@section('content')


  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/requisitos.jpg') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
        <div class="card-body">
        <center><a href="{{route('ingresar.index')}}"  class="btn btn-lg btn-info">Ingresar Alumnos</a></center>
          
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/compromisos.png') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{route('existente.index')}}" class="btn btn-lg btn-info">Alumno Existente</a></center>
        </div>
      </div>
    </div>

    @endsection