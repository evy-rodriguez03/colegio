@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar Paso-5</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('escolarcuatro.create')}}" class="btn btn-lg btn-success">
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
            <!-- Rendimiento  -->
            <h2 class="col-12 mt-3">VIII. Rendimiento Escolar:</h2>

            <div class="col-6 mt-3"> 
                <label for="estudios">En cuantas escuelas primarias realizo sus estudios?</label>
                <input type="text" id="estudios" name="estudios" class="form-control" required value="{{old('estudios')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="repetido">Grados que ha repetido:</label>
                <input type="text" id="repetido" name="repetido" class="form-control" required value="{{old('repetido')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="claseestudiante">Que clase de estudiante fue en la escuela?</label>
                <select type="text" id="claseestudiante" name="claseestudiante" class="form-control" required value="{{old('claseestudiante')}}">
                    <option value="">Elegir</option>
                    <option value="cexelente">Exelente</option>
                    <option value="cmuybueno">Muy bueno</option>
                    <option value="cbueno">Bueno</option>
                    <option value="cregular">Regular</option>
                    <option value="cdeficiente">Deficiente</option>
                </select>
            </div>

            <div class="col-6 mt-3">
                <label for="agrado">Que materia le agrado mas?</label>
                <input type="text" id="agrado" name="agrado" class="form-control" required value="{{old('agrado')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="agradomenos">Que materia le agrado menos?</label>
                <input type="text" id="agradomenos" name="agradomenos" class="form-control" required value="{{old('agradomenos')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="considera">Como estudiante se considera:</label>
                <select type="text" id="considera" name="considera" class="form-control" required value="{{old('considera')}}">
                    <option value="">Elegir</option>
                    <option value="eexelente">Exelente</option>
                    <option value="emuybueno">Muy bueno</option>
                    <option value="ebueno">Bueno</option>
                    <option value="eregular">Regular</option>
                    <option value="edeficiente">Deficiente</option>
                    <option value="emalo">Malo</option>
                </select>
            </div>

            <div class="col-6 mt-3">
                <label for="horasextra">Cuantas horas extras escolares le dedica al estudio?</label>
                <input type="text" id="horasextra" name="horasextra" class="form-control" required value="{{old('horasextra')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="tiempolibre">En que emplea su tiempo libre?</label>
                <input type="text" id="tiempolibre" name="tiempolibre" class="form-control" required value="{{old('tiempolibre')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="rendimiento">Que hace usted para mejorar su rendimiento academico?</label>
                <input type="text" id="rendimiento" name="rendimiento" class="form-control" required value="{{old('rendimiento')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="ayudarsele">En que forma podria ayudarsele?</label>
                <input type="text" id="ayudarsele" name="ayudarsele" class="form-control" required value="{{old('ayudarsele')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <h2 class="col-12 mt-3">*Uso solamente para alumnos provenientes de otro instituto*</h2>

            <div class="form-group col-6 mt-3">
                <label for="cursosrepetidos">Cursos que ha repetido:</label>
                <input type="text" id="cursosrepetidos" name="cursosrepetidos" class="form-control" required value="{{old('cursosrepetidos')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div div class="form-group col-6 mt-3">
                <label for="materiasreprobadas">Materias que ha reprobado:</label>
                <input type="text" id="materiasreprobadas" name="materiasreprobadas" class="form-control" required value="{{old('materiasreprobadas')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="materiasagradan">Que materia le agrada mas?</label>
                <input type="text" id="materiasagradan" name="materiasagradan" class="form-control" required value="{{old('materiasagradan')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="atribuyeagrado">A que atribuye usted ese agrado?</label>
                <input type="text" id="atribuyeagrado" name="atribuyeagrado" class="form-control" required value="{{old('atribuyeagrado')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="agradanmenos">Que materias le agradan menos?</label>
                <input type="text" id="agradanmenos" name="agradanmenos" class="form-control" required value="{{old('agradanmenos')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="materiasdificultad">En que materias tiene mas dificultades?</label>
                <input type="text" id="materiasdificultad" name="materiasdificultad" class="form-control" required value="{{old('materiasdificultad')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="culturageneral">Que carreras desea seguir despues del Ciclo comun de Cultura General?</label>
                <input type="text" id="culturageneral" name="culturageneral" class="form-control" required value="{{old('culturageneral')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="diversificado">Que carreras desea seguir despues del Ciclo Diversificado?</label>
                <input type="text" id="diversificado" name="diversificado" class="form-control" required value="{{old('diversificado')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-3 mt-3">
            <a class="btn btn-success" href="{{ route('escolarseis.create') }}">Siguiente</a>
            </div>
        </form>
    </div>
</div>
@endSection