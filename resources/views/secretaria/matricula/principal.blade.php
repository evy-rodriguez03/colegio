@extends('layout.panel')

@section('content')


<div class="d-flex justify-content-center">
  <div>
    <div class="card mx-3" style="width: 18rem;">
      <img src="{{asset('img/brand/cosmeexistente.jpg') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Alumno Nuevo</h5>
        <p class="card-text">¡Bienvenido al colegio!</p>
        <a href="{{Route('creatematricula')}}" class="btn btn-primary">Inscribir</a>
      </div>
    </div>
  </div>
  <div>
    <div class="card mx-3" style="width: 18rem;">
      <img src="{{asset('img/brand/cosmealumnoexistente.jpg') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Alumno Matriculado</h5>
        <p class="card-text">¡Bienvenido de vuelta!</p>
        <a href="#" class="btn btn-primary">Inscribir</a>
      </div>
    </div>
  </div>
</div>



    @endsection