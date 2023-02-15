@extends('layout.panel')

@section('content')
<div>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <div class="card">
        <img src="{{asset('img/brand/profesores.jpg') }}" class="card-img-top" alt="..." width="50" height="170">
        <div class="card-body">
          <center><a href="{{Route('usuarios.index')}}" class="btn btn-sm btn-primary">Requisitos Recibidos</a></center>
          
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="{{asset('img/brand/cursos.jpg') }}" class="card-img-top" alt="..." width="50" height="170">
        <div class="card-body">
          <center><a href="{{url('/usuarios/crear')}}" class="btn btn-sm btn-primary">Compromiso</a></center>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="{{asset('img/brand/periodo.jpg') }}" class="card-img-top" alt="..." width="50" height="170">
        <div class="card-body">
          <center><a href="{{url('/usuarios/crear')}}" class="btn btn-sm btn-primary">Ficha Matricula</a></center>
           
        </div>
      </div>
    </div>
    
  </div>
  
</div>



@endsection