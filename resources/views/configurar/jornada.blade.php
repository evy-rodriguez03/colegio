@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Agregar Nueva Jornada</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('configuracion.index')}}" class="btn btn-lg btn-success">
            <i class="fas fa-angle-left"></i>
            Regresar</a>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">

      @if ($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>¡Porfavor!</strong> {{$error}}
        </div>
          @endforeach
      @endif
      <form action="{{ route('cursos.index') }}" method="POST">
        @csrf

      <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="jornada">Sección</label>
            <input type="text" class="form-control" name="jornada" placeholder="Jornada" required value="{{ old('jornada') }}">
            <div class="valid-feedback"></div>
        </div>
        <div class="col-md-4 mb-3">
    <label for="descripcion">Descripción</label>
    <input type="text" class="form-control" name="descripcion" pattern="[\d\s:-]+" placeholder="Descripción" required value="{{ old('descripcion') }}">
    <div class="valid-feedback">Looks good!</div>
</div>
    </div>
                <button class="btn btn-primary btn-lg" type="submit">Guardar</button>
                <a href="{{route('cursos.index')}}" class="btn btn-lg btn-primary">Cancelar</a>
          </form>

    </div>
  </div>
@endsection