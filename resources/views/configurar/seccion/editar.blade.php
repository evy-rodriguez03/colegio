@extends('layout.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <h1 class="mb-0">Editar Seccion</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('seccionconfig.update', $secciones->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Seccion</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $secciones->nombre }}" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required>{{ $secciones->descripcion }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
    </div>
@endsection