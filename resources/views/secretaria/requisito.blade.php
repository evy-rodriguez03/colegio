@extends('layout.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Requisitos</h1>
            </div>
            <div class="col text-right">
            <a href="{{route('dashboardsec.index')}}" class="btn btn-sm btn-success">
                <i class="fas fa-angle-left"></i>
                Regresar</a>
            </div>
        </div>
    </div>

    <div class="card-body">
    <h2 class="text">Datos Recibidos</h2>

    <form class="row g-3 mt-3">
        <div class="col-4 mt-3">
            <label for="name"> </label>
        </div>
        <div class="col-1 mt-3">
            <label for="name">Recibido</label>
        </div>
        <div class="col-4 mt-3">
            <label for="name">Pendiente</label>
        </div>
        <div class="col-4 mt-3">
            <label for="name">Partida de Nacimiento:</label>
        </div>
        <div class="col-1 mt-3">
            <input type="text" id="nacimientoR" name="nacimientoR" class="form-control"></input>
        </div>
        <div class="col-1 mt-3">
            <input type="text" id="nacimientoP" name="nacimientoP" class="form-control"></input>
        </div>
        <div class="col-4 mt-3">
            <label for="name"> </label>
        </div>
        <div class="col-4 mt-3">
            <label for="name">Fotografía:</label>
        </div>
        <div class="col-1 mt-3">
            <input type="text" id="fotografiaR" name="fotografiaR" class="form-control"></input>
        </div>
        <div class="col-1 mt-3">
            <input type="text" id="fotografiaP" name="fotografiaP" class="form-control"></input>
        </div>
        <div class="col-4 mt-3">
            <label for="name"> </label>
        </div>
        <div class="col-4 mt-3">
            <label for="name">Fotografía Padre:</label>
        </div>
        <div class="col-1 mt-3">
            <input type="text" id="fotografiaPadreR" name="fotografiaPadreR" class="form-control"></input>
        </div>
        <div class="col-1 mt-3">
            <input type="text" id="FotografiaPadreP" name="FotografiaPadreP" class="form-control"></input>
        </div>
        <div class="col-4 mt-3">
            <label for="name"> </label>
        </div>
        <div class="col-4 mt-3">
            <label for="name">Fotografía Carnet Vacuna:</label>
        </div>
        <div class="col-1 mt-3">
            <input type="text" id="carnetR" name="carnetR" class="form-control"></input>
        </div>
        <div class="col-1 mt-3">
            <input type="text" id="carnetP" name="carnetP" class="form-control"></input>
        </div>
        <div class="col-4 mt-3">
            <label for="name"> </label>
        </div>
        <div class="col-4 mt-3">
            <label for="name">Certificado de Conducta:</label>
        </div>
        <div class="col-1 mt-3">
            <input type="text" id="conductaR" name="conductaR" class="form-control"></input>
        </div>
        <div class="col-1 mt-3">
            <input type="text" id="conductaP" name="conductaP" class="form-control"></input>
        </div>
        <div class="col-4 mt-3">
            <label for="name"> </label>
        </div>
        <div class="col-4 mt-3">
            <label for="name">Total Matrícula:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="total" name="total" class="form-control"></input>
        </div>

        <button type="button" class="btn btn-primary mt-3">
            Siguiente
        </button>

    </form>
</div>
@endSection
