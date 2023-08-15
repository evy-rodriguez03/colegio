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
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>¡Por favor!</strong> {{$error}}
        </div>
        @endforeach
        @endif
        <!-- inicio formulario -->
        @foreach ($alumnos as $alumno)
        <form class="row g-3 mt-3" action="{{ route('escolar.update', $alumnos->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h1 class="col-12 mt-3">Datos del Alumno: {{$alumnos->primernombre}} {{$alumnos->segundonombre}} {{$alumnos->primerapellido}} {{$alumnos->segundoapellido}}</h1>
            <h2 class="col-12 mt-3">I. Datos Personales:</h2>

            <div class="col-6 mt-3">
                <label><b>Numero de Identidad:</b> {{$alumnos->numerodeidentidad}}</label>
            </div>

            <div class="col-6 mt-3">
                <label><b>Lugar de Nacimiento:</b> {{$alumnos->ciudad}}</label>
            </div>

            <div class="col-6 mt-3">
                <label><b>Curso:</b> {{$alumnos->cursos->niveleducativo}}</label>
            </div>
            <div class="col-6 mt-3">
                <label><b>Fecha de nacimiento:</b> {{$alumnos->fechadenacimiento}}</label>
            </div>

            <div class="col-6 mt-3">
                <label for="enumerodecelular">Numero de Celular:</label>
                <input type="text" id="enumerodecelular" name="enumerodecelular" class="form-control" value="{{old('enumerodecelular', $escolar->enumerodecelular)}}" placeholder="Ingrese el lugar de trabajo" required maxlength="9"> </input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="eedad">Edad:</label>
                <input type="text" id="eedad" name="eedad" class="form-control" value="{{old('eedad', $escolar->eedad)}}" placeholder="Ingrese la edad" maxlength="2"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="procedencia">Escuela o Colegio de Procedencia:</label>
                <input type="text" id="procedencia" name="procedencia" class="form-control" value="{{old('procedencia', $escolar->procedencia)}}" placeholder="Ingrese el nombre del colegio o escuela"></input>
                <div class="valid-feedback"></div>
            </div>

            <!-- direccion de domicilio -->

            <h2 class="col-12 mt-3">II. Direccion del Domicilio:</h2>


            <div class="col-6 mt-3">
                <label for="tiempolectivo">En Tiempo Lectivo:</label>
                <input type="text" id="tiempolectivo" name="tiempolectivo" class="form-control" value="{{old('tiempolectivo', $escolar->tiempolectivo)}}" placeholder="Ingrese el tiempo lectivo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="telelectivo">Telefono Fijo:</label>
                <input type="text" id="telelectivo" name="telelectivo" class="form-control" value="{{old('telelectivo', $escolar->telelectivo)}}" placeholder="Ingrese el telefono fijo" maxlength="8"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="noelectivo">En Tiempo No Electivo:</label>
                <input type="text" id="noelectivo" name="noelectivo" class="form-control" value="{{old('noelectivo', $escolar->noelectivo)}}" placeholder="Ingrese el tiempo no lectivo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="telnoelectivo">Telefono Fijo:</label>
                <input type="text" id="telnoelectivo" name="telnoelectivo" class="form-control" value="{{old('telnoelectivo', $escolar->telnoelectivo)}}" placeholder="Ingrese el telefono fijo" maxlength="8"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="observaciones">Observaciones:</label>
                <input type="text" id="observaciones" name="observaciones" class="form-control" value="{{old('observaciones', $escolar->observaciones)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-12 mt-3">
            </div>

            <div class="col-3 mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-success" href="{{ route('escolar.editdos', ['escolar' => $escolar->id]) }}">siguiente</a>

            </div>
        </form>
        @endforeach
    </div>
</div>
@endSection