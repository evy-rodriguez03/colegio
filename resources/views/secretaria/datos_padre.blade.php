@extends('layout.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Datos Padre</h1>
            </div>
            <div class="col text-right">
            <a href="{{route('padres.index')}}" class="btn btn-sm btn-success">
                <i class="fas fa-angle-left"></i>
                Regresar</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <!-- inicio formulario -->

        <form class="row g-3 mt-3" action="{{route('padres.index')}}" method="POST">
          @csrf
        <div class="form-group col-2 mt-3">
            <label for="tipo">Tipo:</label>
        </div>
        <div class="col-10 mt-3">
            <input type="text" id="tipo" name="tipo" class="form-control" required value="{{old('tipo')}}"
            placeholder="Ingrese el tipo"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="primernombre">Primer Nombre:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="primernombre" name="primernombre" class="form-control" required value="{{old('primernombre')}}"
            placeholder="Ingrese el primer nombre"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="segundonombre">Segundo Nombre:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="segundonombre" name="segundonombre" class="form-control" required value="{{old('segundonombre')}}"
            placeholder="Ingrese el segundo nombre"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="numerodeidentidad">Número de Identidad:</label>
        </div>
        <div class="col-10 mt-3">
            <input type="text" id="identidad" name="numerodeidentidad" class="form-control" required value="{{old('numerodeidentidad')}}"
            placeholder="Ingrese el número de identidad"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="name">Teléfono Personal:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="personal" name="personal" class="form-control" required value="{{old('personal')}}"
            placeholder="Ingrese el télefono personal"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="lugardetrabajo">Lugar de Trabajo:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="lugardetrabajo" name="lugardetrabajo" class="form-control" required value="{{old('lugardetrabajo')}}"
            placeholder="Ingrese el lugar de trabajo"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="oficio">Oficio:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="oficio" name="oficio" class="form-control" required value="{{old('oficio')}}"
            placeholder="Ingrese el oficio"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="telefonodeoficina">Teléfono de Oficina:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="telefonodeoficina" name="telefonodeoficina" class="form-control" required value="{{old('telefonodeoficina')}}"
            placeholder="Ingrese el télefono de oficina"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="ingresos">Ingresos:</label>
        </div>
        <div class="col-10 mt-3">
            <input type="text" id="ingresos" name="ingresos" class="form-control" required value="{{old('ingresos')}}"
            placeholder="Ingrese los ingresos"></input>
        </div>

        <button type="button" class="btn btn-danger mt-3">
            Borrar
        </button>

        <button type="submit" class="btn btn-primary mt-3">
            Guardar
        </button>
    </form>
</div>
@endSection
