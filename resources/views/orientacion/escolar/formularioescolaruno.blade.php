@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar Paso-1</h1>
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

        <form class="row g-3 mt-3" action="{{ route('escolar.index') }}" method="POST">
            @csrf
            <h2 class="col-12 mt-3">I. Datos Personales:</h2>

            <div class="col-6 mt-3">
                <label for="egrado">Grado:</label>
                <input type="text" id="egrado" name="egrado" class="form-control" required value="{{old('egrado')}}" placeholder="Ingrese el grado"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="enumerodecelular">Numero de Celular:</label>
                <input type="text" id="enumerodecelular" name="enumerodecelular" class="form-control" required value="{{old('enumerodecelular')}}" placeholder="Ingrese el lugar de trabajo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="eedad">Edad:</label>
                <input type="text" id="eedad" name="eedad" class="form-control" required value="{{old('eedad')}}" placeholder="Ingrese la edad"></input>
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
                <input type="text" id="tiempolectivo" name="tiempolectivo" class="form-control" required value="{{old('tiempolectivo')}}" placeholder="Ingrese el tiempo lectivo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="telelectivo">Telefono Fijo:</label>
                <input type="text" id="telelectivo" name="telelectivo" class="form-control" required value="{{old('telelectivo')}}" placeholder="Ingrese el telefono fijo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="noelectivo">En Tiempo No Electivo:</label>
                <input type="text" id="noelectivo" name="noelectivo" class="form-control" required value="{{old('noelectivo')}}" placeholder="Ingrese el tiempo no lectivo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="telnoelectivo">Telefono Fijo:</label>
                <input type="text" id="telnoelectivo" name="telnoelectivo" class="form-control" required value="{{old('telnoelectivo')}}" placeholder="Ingrese el telefono fijo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="observaciones">Observaciones:</label>
                <input type="text" id="observaciones" name="observaciones" class="form-control" required value="{{old('observaciones')}}" placeholder="Especifique"></input>
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