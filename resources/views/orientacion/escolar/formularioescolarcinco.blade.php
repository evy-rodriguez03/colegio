@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar Paso-5</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('escolar.editcuatro', ['escolar' => $escolar->id])}}" class="btn btn-lg btn-success">
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

        <form class="row g-3 mt-3" action="{{route('escolar.updatecinco', $alumnos->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Rendimiento  -->
            <h2 class="col-12 mt-3">VIII. Rendimiento Escolar:</h2>

            <div class="col-6 mt-3"> 
                <label for="estudios">En cuantas escuelas primarias realizo sus estudios?</label>
                <input type="text" id="estudios" name="estudios" class="form-control" value="{{old('estudios', $escolar->estudios)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="repetido">Grados que ha repetido:</label>
                <input type="text" id="repetido" name="repetido" class="form-control" value="{{old('repetido', $escolar->repetido)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="claseestudiante">Que clase de estudiante fue en la escuela?</label>
                <select type="text" id="claseestudiante" name="claseestudiante" class="form-control">
                    <option value="">Elegir</option>
                    <option @if(old('claseestudiante')=='Exelente' || (isset($escolar->claseestudiante)?$escolar->claseestudiante:'') == 'Exelente')
                            selected
                            @else

                            @endif value="Exelente">Exelente</option>
                    <option @if(old('claseestudiante')=='Muy bueno' || (isset($escolar->claseestudiante)?$escolar->claseestudiante:'') == 'Muy bueno')
                            selected
                            @else

                            @endif value="Muy bueno">Muy bueno</option>
                    <option @if(old('claseestudiante')=='Bueno' || (isset($escolar->claseestudiante)?$escolar->claseestudiante:'') == 'Bueno')
                            selected
                            @else

                            @endif value="Bueno">Bueno</option>
                    <option @if(old('claseestudiante')=='Regular' || (isset($escolar->claseestudiante)?$escolar->claseestudiante:'') == 'Regular')
                            selected
                            @else

                            @endif value="Regular">Regular</option>
                    <option @if(old('claseestudiante')=='Deficiente' || (isset($escolar->claseestudiante)?$escolar->claseestudiante:'') == 'Deficiente')
                            selected
                            @else

                            @endif value="Deficiente">Deficiente</option>
                </select>
            </div>

            <div class="col-6 mt-3">
                <label for="agrado">Que materia le agrado mas?</label>
                <input type="text" id="agrado" name="agrado" class="form-control" value="{{old('agrado', $escolar->agrado)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="agradomenos">Que materia le agrado menos?</label>
                <input type="text" id="agradomenos" name="agradomenos" class="form-control" value="{{old('agradomenos', $escolar->agradomenos)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="considera">Como estudiante se considera:</label>
                <select type="text" id="considera" name="considera" class="form-control">
                    <option value="">Elegir</option>
                    <option @if(old('considera')=='Exelente' || (isset($escolar->considera)?$escolar->considera:'') == 'Exelente')
                            selected
                            @else

                            @endif value="Exelente">Exelente</option>
                    <option @if(old('considera')=='Muy bueno' || (isset($escolar->considera)?$escolar->considera:'') == 'Muy bueno')
                            selected
                            @else

                            @endif value="Muy bueno">Muy bueno</option>
                    <option @if(old('considera')=='Bueno' || (isset($escolar->considera)?$escolar->considera:'') == 'Bueno')
                            selected
                            @else

                            @endif value="Bueno">Bueno</option>
                    <option @if(old('considera')=='Regular' || (isset($escolar->considera)?$escolar->considera:'') == 'Regular')
                            selected
                            @else

                            @endif value="Regular">Regular</option>
                    <option @if(old('considera')=='Deficiente' || (isset($escolar->considera)?$escolar->considera:'') == 'Deficiente')
                            selected
                            @else

                            @endif value="Deficiente">Deficiente</option>
                    <option @if(old('considera')=='Malo' || (isset($escolar->considera)?$escolar->considera:'') == 'Malo')
                            selectesd
                            @else

                            @endif value="Malo">Malo</option>
                </select>
            </div>

            <div class="col-6 mt-3">
                <label for="horasextra">Cuantas horas extras escolares le dedica al estudio?</label>
                <input type="text" id="horasextra" name="horasextra" class="form-control" value="{{old('horasextra', $escolar->horasextra)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="tiempolibre">En que emplea su tiempo libre?</label>
                <input type="text" id="tiempolibre" name="tiempolibre" class="form-control" value="{{old('tiempolibre', $escolar->tiempolibre)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="rendimiento">Que hace usted para mejorar su rendimiento academico?</label>
                <input type="text" id="rendimiento" name="rendimiento" class="form-control" value="{{old('rendimiento', $escolar->rendimiento)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="ayudarsele">En que forma podria ayudarsele?</label>
                <input type="text" id="ayudarsele" name="ayudarsele" class="form-control" value="{{old('ayudarsele', $escolar->ayudarsele)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <h2 class="col-12 mt-3">*Uso solamente para alumnos provenientes de otro instituto*</h2>

            <div class="form-group col-6 mt-3">
                <label for="cursosrepetidos">Cursos que ha repetido:</label>
                <input type="text" id="cursosrepetidos" name="cursosrepetidos" class="form-control" value="{{old('cursosrepetidos', $escolar->cursosrepetidos)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div div class="form-group col-6 mt-3">
                <label for="materiasreprobadas">Materias que ha reprobado:</label>
                <input type="text" id="materiasreprobadas" name="materiasreprobadas" class="form-control" value="{{old('materiasreprobadas', $escolar->materiasreprobadas)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="materiasagradan">Que materia le agrada mas?</label>
                <input type="text" id="materiasagradan" name="materiasagradan" class="form-control" value="{{old('materiasagradan', $escolar->materiasagradan)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="atribuyeagrado">A que atribuye usted ese agrado?</label>
                <input type="text" id="atribuyeagrado" name="atribuyeagrado" class="form-control" value="{{old('atribuyeagrado', $escolar->atribuyeagrado)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="agradanmenos">Que materias le agradan menos?</label>
                <input type="text" id="agradanmenos" name="agradanmenos" class="form-control" value="{{old('agradanmenos', $escolar->agradanmenos)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="materiasdificultad">En que materias tiene mas dificultades?</label>
                <input type="text" id="materiasdificultad" name="materiasdificultad" class="form-control" value="{{old('materiasdificultad', $escolar->materiasdificultad)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="culturageneral">Que carreras desea seguir despues del Ciclo comun de Cultura General?</label>
                <input type="text" id="culturageneral" name="culturageneral" class="form-control" value="{{old('culturageneral', $escolar->culturageneral)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="diversificado">Que carreras desea seguir despues del Ciclo Diversificado?</label>
                <input type="text" id="diversificado" name="diversificado" class="form-control" value="{{old('diversificado', $escolar->diversificado)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-3 mt-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-success" href="{{route('escolar.editseis', ['escolar' => $escolar->id]) }}">Siguiente</a>
            </div>
        </form>
    </div>
</div>
@endSection