@extends('layout.panel')

@section('content')
<div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Grado</h1>
            </div>
            <div class="col text-right">
            <a href="{{route('dashboard.index')}}" class="btn btn-lg btn-success">
                <i class="fas fa-angle-left"></i>
                Regresar</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <!-- inicio formulario -->

<form action="{{ route('grados.store') }}" method="POST">
    @csrf
    <div>
        <label for="nombre">Nombre del grado:</label>
        <input type="text" name="nombre" id="nombre">
    </div>
    <div>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion">
    </div>
    <div>
        <button type="submit">Crear Grado</button>
    </div>
</form>

</div>
@endSection
