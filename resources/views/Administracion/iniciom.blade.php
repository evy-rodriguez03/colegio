@extends('layout.panel')

@section('content')


<form action="/iniciom" method="POST" role="form">
{{ csrf_field() }}

<div class="card shadow">
    <div class="card-header border-3">
      <div class="row align-items-center">
        <div class="col">
          <h2 class="mb-0">Incio y Cierre de Matricula</h2>
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
    <div class="form-row">
        <div class="col-md-5 mb-3">
            <label for="fechaInicio">Fecha de Apertura</label>
            <input type="date" class="form-control" name="fechaInicio" placeholder="Ingrese la fecha"  required>
            <div class="valid-feedback"></div>
        </div>

        <div class="col-md-5 mb-3">
                <label for="periodoMatricula"> Periodo de Matricula</label>
                <input type="text" name="periodoMatricula" class="form-control" placeholder="Periodo 2023" >
                <div class="valid-feedback"></div>
              </div>
            

              <div class="col-md-5 mb-3">
    <label for="fechaCierre">Fecha de Cierre</label>
    <input type="date" class="form-control" name="fechaCierre" placeholder="Ingrese la fecha" min="<?php echo date('Y-m-d'); ?>" required>
    <div class="valid-feedback"></div>
</div>
  </div>
  <button type="submit" class="btn btn-lg btn-Primary mx-16 my-16">Aceptar</button>
            <a href="{{Route('inicio.create')}}" class="btn btn-lg btn-success ">Cancelar </a>
          </form>
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