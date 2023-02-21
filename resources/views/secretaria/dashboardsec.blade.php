@extends('layout.panel')

@section('content')
<div>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/listo.png') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{Route('usuarios.index')}}" class="btn btn-lg btn-info">Requisitos Recibidos</a></center>
          
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/orientacion.png') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{url('/usuarios/crear')}}" class="btn btn-lg btn-info">Compromiso</a></center>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/tesoreria.png') }}" class="card-img-top" alt="..." style="width:120px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{url('/usuarios/crear')}}" class="btn btn-lg btn-info">Ficha Matricula</a></center>
           
        </div>
      </div>
    </div>
    
  </div>
  
</div>



@endsection