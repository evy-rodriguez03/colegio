@extends('layout.app')

@section('content')

    <div class="container pt-8 ">
    <h1 class="text">Requisitos</h1>
    <h2 class="text">Datos Recibidos</h2>

    <form class="row g-3 mt-3">
        <div class="col-6 mt-3">
            <label for="name"> </label>
        </div>
        <div class="col-3 mt-3">
            <label for="name">Recibido</label>
        </div>
        <div class="col-3 mt-3">
            <label for="name">Pendiente</label>
        </div>
        <div class="col-6 mt-3">
            <label for="name">Partida de Nacimiento</label>
        </div>
        <div class="col-3 mt-3">
            <input type="text" id="nacimientoR" name="nacimientoR"></input>
        </div>
        <div class="col-3 mt-3">
            <input type="text" id="nacimientoP" name="nacimientoP"></input>
        </div>

        <div class="col-6 mt-3">
            <label for="name">Fotografia</label>
        </div>
        <div class="col-3 mt-3">
            <input type="text" id="fotografiaR" name="fotografiaR"></input>
        </div>
        <div class="col-3 mt-3">
            <input type="text" id="fotografiaP" name="fotografiaP"></input>
        </div>

        <div class="col-6 mt-3">
            <label for="name">Fotografia Padre</label>
        </div>
        <div class="col-3 mt-3">
            <input type="text" id="fotografiaPadreR" name="fotografiaPadreR"></input>
        </div>
        <div class="col-3 mt-3">
            <input type="text" id="FotografiaPadreP" name="FotografiaPadreP"></input>
        </div>

        <div class="col-6 mt-3">
            <label for="name">Fotografia Carnet Vacuna</label>
        </div>
        <div class="col-3 mt-3">
            <input type="text" id="carnetR" name="carnetR"></input>
        </div>
        <div class="col-3 mt-3">
            <input type="text" id="carnetP" name="carnetP"></input>
        </div>

        <div class="col-6 mt-3">
            <label for="name">Certificado de Conducta</label>
        </div>
        <div class="col-3 mt-3">
            <input type="text" id="conductaR" name="conductaR"></input>
        </div>
        <div class="col-3 mt-3">
            <input type="text" id="conductaP" name="conductaP"></input>
        </div>

        <div class="col-6 mt-3">
            <label for="name">Total Matricula</label>
        </div>
        <div class="col-6 mt-3">
            <input type="text" id="total" name="total"></input>
        </div>

        <button type="button" class="btn btn-primary mt-3">
            Siguiente
        </button>

    </form>
</div>
@endSection
