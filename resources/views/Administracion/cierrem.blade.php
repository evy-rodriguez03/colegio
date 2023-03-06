@extends('layout.panel')

@section('content')


<form action="/cierrem" method="POST" role="form">
{{ csrf_field() }}

<div class="card shadow">
    <div class="card-header border-3">
      <div class="row align-items-center">
        <div class="col">
          <h1 class="mb-0">Cierre de Matricula</h1>
        </div>
        <div class="col text-right">
          <a href="{{route('periodo')}}" class="btn btn-lg btn-primary">
            <i class="fas fa-angle-left"></i>
            Regresar</a>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">
    <div class="col-md-4 mb-3">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" name="fecha" placeholder="Ingrese la fecha"  required>
            <div class="valid-feedback"></div>
        </div>
  </div>

    <div class="card-body">
        <div class="col-md-4 mb-3">
                <label for="usuario">Ingrese Usuario</label>
                <input type="text" name="usuario" class="form-control" >
                <div class="valid-feedback"></div>
              </div>

            <button type="submit" class="btn btn-lg btn-Primary mx-16 my-12">Aceptar</button>
            <a href="{{Route('cierre.create')}}" class="btn btn-lg btn-Primary ">Cancelar </a>
          </form>
    </div>
  </div>
</form>
@endsection

@section('js')
@if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif

@endsection