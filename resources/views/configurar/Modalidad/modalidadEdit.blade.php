@extends('layout.panel')

@section('content')

<div class="card-body">
    <form action="{{ route('modalidad.update', $modalidad->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <!-- Aquí debes usar $modalidad->nombre en lugar de $grado->nombre -->
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $modalidad->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required>{{ $modalidad->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>
@endsection
