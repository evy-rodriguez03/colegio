@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Editar Curso</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('cursos.index')}}" class="btn btn-lg btn-success">
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

      <form method="POST" action="{{ route('cursos.update', ['curso' => $curso->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="">Curso:</label>
              <input type="text" class="form-control" name="curso" value="{{$curso->curso}}">
              <div class="valid-feedback"></div>
          </div>
      </div>
      
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="">Seccion:</label>
                <input type="text" class="form-control" name="seccion" placeholder="Solo se aceptan letras" value="{{$curso->seccion}}">
                <div class="valid-feedback"></div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="">Horario</label>
                <input type="text" class="form-control" name="horario" value="{{$curso->horario}}">
                <div class="valid-feedback"></div>
            </div>
        </div>
                
                <hr class="mb-2">
                <button class="btn btn-primary btn-lg" type="submit">Guardar</button>
                <a href="{{route('cursos.index')}}" class="btn btn-lg btn-primary">Cancelar</a>
          </form>

    </div>
  </div>
@endsection