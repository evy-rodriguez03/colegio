@extends('layout.panel')

@section('content')
<div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Grado</h1>
            </div>
            <div class="col text-right">
            <a href="{{route('grados.index')}}" class="btn btn-lg btn-success">
                <i class="fas fa-angle-left"></i>
                Regresar</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <!-- inicio formulario -->

<form action="{{ route('grados.store') }}" method="POST">
    @csrf
    <div class="col-md-5 mb-3">
                <label for="nombre"> Nombre del Grado: </label>
                <input type="text" name="nombre" class="form-control">
                <div class="valid-feedback"></div>
              </div>

    <div class="col-md-5 mb-3">
                <label for="descripcion"> Descripción: </label>
                <input type="text" name="descripcion" class="form-control" >
                <div class="valid-feedback"></div>
              </div>
              
              <div class="col text-left">
        <button type="submit" class="btn btn-primary">Crear Grado</button>
    </div>
    </div>
</form>

</div>
@endSection
