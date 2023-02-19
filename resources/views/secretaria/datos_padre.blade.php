@extends('layout.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Datos Padre</h1>
            </div>
            <div class="col text-right">
            <a href="{{url('#')}}" class="btn btn-sm btn-success">
                <i class="fas fa-angle-left"></i>
                Regresar</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <!-- inicio formulario -->
    <form class="row g-3 mt-3">
        <div class="form-group col-2 mt-3">
            <label for="name">Tipo:</label>
        </div>
        <div class="col-10 mt-3">
            <input type="text" id="tipo" name="tipo" class="form-control" 
            placeholder="Ingrese el tipo"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="name">Primer Nombre:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="pNombre" name="pNombre" class="form-control" 
            placeholder="Ingrese el primer nombre"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="name">Segundo Nombre:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="sNombre" name="sNombre" class="form-control" 
            placeholder="Ingrese el segundo nombre"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="name">Numero de Identidad:</label>
        </div>
        <div class="col-10 mt-3">
            <input type="text" id="identidad" name="identidad" class="form-control" 
            placeholder="Ingrese el numero de identidad"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="name">Telefono Personal:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="personal" name="personal" class="form-control" 
            placeholder="Ingrese el telefono personal"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="name">Lugar de Trabajo:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="lugar" name="lugar" class="form-control" 
            placeholder="Ingrese el lugar de trabajo"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="name">Oficio:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="oficio" name="oficio" class="form-control" 
            placeholder="Ingrese el oficio"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="name">Telefono de Oficina:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="oficina" name="oficina" class="form-control" 
            placeholder="Ingrese el telefono de oficina"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="name">Ingresos:</label>
        </div>
        <div class="col-10 mt-3">
            <input type="text" id="ingresos" name="ingresos" class="form-control" 
            placeholder="Ingrese los ingresos"></input>
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
