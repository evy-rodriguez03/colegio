@extends('layout.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <h1 class="mb-0">Editar modalidad</h1>
            <div class="col text-right">
                <a href="{{route('jornada.index')}}" class="btn btn-lg btn-success">
                  <i class="fas fa-angle-left"></i>
                  Regresar</a>
              </div>
        </div>
        <div class="card-body">
    <form action="{{ route('modalidad.update', $modalidades->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <!-- Aquí debes usar $modalidad->nombre en lugar de $grado->nombre -->
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $modalidades->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required>{{ $modalidades->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>
@endsection
