@extends('layout.app')

@section('content')

    <div class="container pt-8 ">
    <h1 class="text">Datos Padre</h1>

    <form class="row g-3 mt-3">
        <div class="col-6 mt-3">
            <label for="name">Tipo</label>
        </div>
        <div class="col-6 mt-3">
            <input type="text" id="tipo" name="tipo"></input>
        </div>

        <div class="col-6 mt-3">
            <label for="name">Primer nombre</label>
        </div>
        <div class="col-6 mt-3">
            <input type="text" id="primer" name="primer"></input>
        </div>

        <div class="col-6 mt-3">
            <label for="name">Segundo nombre</label>
        </div>
        <div class="col-6 mt-3">
            <input type="text" id="nacimientoR" name="nacimientoR"></input>
        </div>

        <div class="col-6 mt-3">
            <label for="name">Numero de Identidad</label>
        </div>
        <div class="col-6 mt-3">
            <input type="text" id="nacimientoR" name="nacimientoR"></input>
        </div>

        <div class="col-6 mt-3">
            <label for="name">Telefono Personal</label>
        </div>
        <div class="col-6 mt-3">
            <input type="text" id="nacimientoR" name="nacimientoR"></input>
        </div>

        <div class="col-6 mt-3">
            <label for="name">Lugar de trabajo</label>
        </div>
        <div class="col-6 mt-3">
            <input type="text" id="nacimientoR" name="nacimientoR"></input>
        </div>

        <div class="col-6 mt-3">
            <label for="name">Oficio</label>
        </div>
        <div class="col-6 mt-3">
            <input type="text" id="nacimientoR" name="nacimientoR"></input>
        </div>

        <div class="col-6 mt-3">
            <label for="name">Telefono trabajo</label>
        </div>
        <div class="col-6 mt-3">
            <input type="text" id="nacimientoR" name="nacimientoR"></input>
        </div>

        <div class="col-6 mt-3">
            <label for="name">Ingreso</label>
        </div>
        <div class="col-6 mt-3">
            <input type="text" id="nacimientoR" name="nacimientoR"></input>
        </div>

        <button type="button" class="btn btn-danger mt-3">
            Borrar
        </button>

        <button type="button" class="btn btn-primary mt-3">
            Guardar
        </button>
    </form>
</div>
@endSection
