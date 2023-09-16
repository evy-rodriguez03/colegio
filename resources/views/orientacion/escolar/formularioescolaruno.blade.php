@extends('layout.panel')

@section('content')



<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="mb-0">Paso-1</h2>
            </div>
            <div class="col text-right">
                <a href="{{route('escolar.index')}}" class="btn btn-lg btn-success">
                    <i class="fas fa-angle-left"></i>
                    Regresar</a>
            </div>
        </div>
    </div>

    <div class="card-body">

        <!-- inicio formulario -->
        <form class="row g-3 mt-3" action="{{ route('escolar.update', $alumnos->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h2 class="col-12 mt-3">Datos del alumno: {{$alumnos->primernombre}} {{$alumnos->segundonombre}} {{$alumnos->primerapellido}} {{$alumnos->segundoapellido}}</h2>
            <h2 class="col-12 mt-3">I. Datos personales:</h2>

            <div class="col-6 mt-3">
                <label><b>Número de identidad:</b></label> <input type="text" class="form-control" value="{{$alumnos->numerodeidentidad}}" readonly> </input>
            </div>

            <div class="col-6 mt-3">
                <label><b>Lugar de nacimiento:</b> </label> <input type="text" class="form-control" value="{{$alumnos->ciudad}}" readonly> </input>
            </div>

            <div class="col-6 mt-3">
                <label><b>Curso:</b> </label> </label> <input type="text" class="form-control" value="{{$cursos->niveleducativo}}" readonly> </input>
            </div>
            <div class="col-6 mt-3">
                <label><b>Fecha de nacimiento:</b></label></label> <input type="text" class="form-control" value="{{$alumnos->fechadenacimiento}}" readonly> </input>
            </div>

            <div class="col-6 mt-3">
                <label for="enumerodecelular">Número de celular:</label>
                <input type="text" id="enumerodecelular" name="enumerodecelular" class="form-control" value="{{old('enumerodecelular', $escolar->enumerodecelular)}}" placeholder="Ingrese número de celular" maxlength="8"> </input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="eedad">Edad:</label>
                <input type="text" id="eedad" name="eedad" class="form-control" value="{{old('eedad', $escolar->eedad)}}" placeholder="Ingrese la edad" maxlength="2"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="procedencia">Escuela o colegio de procedencia:</label>
                <input type="text" id="procedencia" name="procedencia" class="form-control" value="{{old('procedencia', $escolar->procedencia)}}" placeholder="Ingrese el nombre del colegio o escuela"></input>
                <div class="valid-feedback"></div>
            </div>

            <!-- direccion de domicilio -->

            <h2 class="col-12 mt-3">II. Dirección del domicilio:</h2>


            <div class="col-6 mt-3">
                <label for="tiempolectivo">En tiempo lectivo:</label>
                <input type="text" id="tiempolectivo" name="tiempolectivo" class="form-control" value="{{old('tiempolectivo', $escolar->tiempolectivo)}}" placeholder="Ingrese el tiempo lectivo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="telelectivo">Teléfono fijo:</label>
                <input type="text" id="telelectivo" name="telelectivo" class="form-control" value="{{old('telelectivo', $escolar->telelectivo)}}" placeholder="Ingrese el teléfono fijo" maxlength="8"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="noelectivo">En tiempo no lectivo:</label>
                <input type="text" id="noelectivo" name="noelectivo" class="form-control" value="{{old('noelectivo', $escolar->noelectivo)}}" placeholder="Ingrese el tiempo no lectivo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="telnoelectivo">Teléfono fijo:</label>
                <input type="text" id="telnoelectivo" name="telnoelectivo" class="form-control" value="{{old('telnoelectivo', $escolar->telnoelectivo)}}" placeholder="Ingrese el teléfono fijo" maxlength="8"></input>
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
                <button type="submit" class="btn btn-primary" id="guardarButton">Guardar y seguir</button>
                <!-- <a class="btn btn-success" href="{{ route('escolar.editdos', ['escolar' => $escolar->id]) }}">siguiente</a> -->

                <script>
                    document.getElementById("guardarButton").addEventListener("click", function() {
                        window.location.href = "{{ route('escolar.editdos', ['escolar' => $escolar->id]) }}";
                    });
                </script>
            </div>
        </form>
    </div>
</div>

@endSection