@extends('layout.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Agregar Nueva Modalidad</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('modalidad.index')}}" class="btn btn-lg btn-success">
            <i class="fas fa-angle-left"></i>
            Regresar</a>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">
      
      <form action="{{ route('modalidad.store') }}" method="POST">
        @csrf

      <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="modalidad">Modalidad</label>
            <input type="text" class="form-control" name="modalidad" placeholder="Modalidad" required value="{{ old('modalidad') }}">
            <div class="valid-feedback"></div>
        </div>
        <div class="col-md-4 mb-3">
    <label for="descripcion">Descripción</label>
    <input type="text" class="form-control" name="descripcion" pattern="[\d\s:-]+" placeholder="Descripción" required value="{{ old('descripcion') }}">
    <div class="valid-feedback">Looks good!</div>
</div>
    </div>
                <button class="btn btn-primary btn-lg" type="submit">Guardar</button>
                <a href="{{route('modalidad.index')}}" class="btn btn-lg btn-primary">Cancelar</a>
          </form>

    </div>
  </div>
@endsection