@extends('layout.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <h1 class="mb-0">Editar Jornada</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('jornada.update', $jornada->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="jornada">Jornada</label>
                    <input type="text" class="form-control" id="jornada" name="jornada" value="{{ $jornada->jornada }}" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required>{{ $jornada->descripcion }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
    </div>
@endsection
