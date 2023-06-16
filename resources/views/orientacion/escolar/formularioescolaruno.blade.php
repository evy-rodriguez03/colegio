@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('escolar.index')}}" class="btn btn-lg btn-success">
                    <i class="fas fa-angle-left"></i>
                    Regresar</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <!-- inicio formulario -->

        <form class="row g-3 mt-3" action="{{route('escolar.index')}}" method="POST">
            @csrf
            <h2 class="col-12 mt-3">I. Datos Personales:</h2>

            <div class="col-6 mt-3">
                <label for="primerapellido">Primer Apellido:</label>
                <input type="text" id="primerapellido" name="primerapellido" class="form-control " required value="{{old('primerapellido')}}" placeholder="Ingrese el primer apellido"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="segundoapellido">Segundo Apellido:</label>
                <input type="text" id="segundoapellido" name="segundoapellido" class="form-control" required value="{{old('segundoapellido')}}" placeholder="Ingrese el segundo apellido"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="primernombre">Primer Nombre:</label>
                <input type="text" id="primernombre" name="primernombre" class="form-control" required value="{{old('primernombre')}}" placeholder="Ingrese el primer nombre"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="segundonombre">Segundo Nombre:</label>
                <input type="text" id="segundonombre" name="segundonombre" class="form-control" required value="{{old('segundonombre')}}" placeholder="Ingrese el segundo nombre"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="numerodeidentidad">Número de Identidad:</label>
                <input type="text" id="identidad" name="numerodeidentidad" class="form-control" required value="{{old('numerodeidentidad')}}" placeholder="Ingrese el número de identidad"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="grado">Grado:</label>
                <input type="text" id="grado" name="grado" class="form-control" required value="{{old('grado')}}" placeholder="Ingrese el grado"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="numerodecelular">Numero de Celular:</label>
                <input type="text" id="numerodecelular" name="numerodecelular" class="form-control" required value="{{old('numerodecelular')}}" placeholder="Ingrese el lugar de trabajo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="lugardenacimiento">Lugar de Nacimiento:</label>
                <input type="text" id="lugardenacimiento" name="lugardenacimiento" class="form-control" required value="{{old('lugardenacimiento')}}" placeholder="Ingrese el lugar de nacimiento"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="fechadenacimiento">Fecha de Nacimiento:</label>
                <input type="text" id="fechadenacimiento" name="fechadenacimiento" class="form-control" required value="{{old('fechadenacimiento')}}" placeholder="Ingrese el télefono de oficina"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="edad">Edad:</label>
                <input type="text" id="edad" name="edad" class="form-control" required value="{{old('edad')}}" placeholder="Ingrese la edad"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="procedencia">Escuela o Colegio de Procedencia:</label>
                <input type="text" id="procedencia" name="procedencia" class="form-control" required value="{{old('procedencia')}}" placeholder="Ingrese el nombre del colegio o escuela"></input>
                <div class="valid-feedback"></div>
            </div>

            <!-- direccion de domicilio -->

            <h2 class="col-12 mt-3">II. Direccion del Domicilio:</h2>
            <div class="col-6 mt-3">
                <label for="tiempolectivo">En Tiempo Lectivo:</label>
                <input type="text" id="tiempolectivo" name="tiempolectivo" class="form-control" required value="{{old('tiempolectivo')}}" placeholder="Ingrese el primer apellido"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="telelectivo">Telefono Fijo:</label>
                <input type="text" id="telelectivo" name="telelectivo" class="form-control" required value="{{old('telelectivo')}}" placeholder="Ingrese el segundo apellido"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="noelectivo">En Tiempo No Electivo:</label>
                <input type="text" id="noelectivo" name="noelectivo" class="form-control" required value="{{old('noelectivo')}}" placeholder="Ingrese el primer nombre"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="telnoelectivo">Telefono Fijo:</label>
                <input type="text" id="telnoelectivo" name="telnoelectivo" class="form-control" required value="{{old('telnoelectivo')}}" placeholder="Ingrese el segundo nombre"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="observaciones">Observaciones:</label>
                <input type="text" id="observaciones" name="observaciones" class="form-control" required value="{{old('observaciones')}}" placeholder="Ingrese la edad"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-12 mt-3">
            </div>

            <div class="col-3 mt-3">
                <a class="btn btn-success" href="{{ route('escolardos.create') }}">siguiente</a>
            </div>
        </form>
    </div>
</div>
@endSection