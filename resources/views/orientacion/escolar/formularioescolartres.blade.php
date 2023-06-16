@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('escolardos.create')}}" class="btn btn-lg btn-success">
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
            <h2 class="col-12 mt-3">VII. Actividades en que le Gustaria Participar:</h2>
            <label class="col-2 mt-3">
                <input type="checkbox" name="abanda" value="1"> Banda de Gerra
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="afutbol" value="1"> Futbol
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="apingpong" value="1"> Ping Pong
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="anumeros" value="1"> Trabajo con Numeros
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="alectura" value="1"> Lectura
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="acoro" value="1"> Coro
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="abasket" value="1"> Basketball
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="atennis" value="1"> Tennis
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="amanuales" value="1"> Trabajos Manuales
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="aoratoria" value="1"> Oratoria
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="avolley" value="1"> Volleyball
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="aatletismo" value="1"> Atletismo
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="adomestico" value="1"> Trabajo Domestico
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="aanimales" value="1"> Cuidar Animales
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="adibujo" value="1"> Dibujo y Pintura
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="afiestas" value="1"> Fiestas y Reuniones Sociales
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="acientificos" value="1"> Estudios Cientificos
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="aenfermos" value="1"> Cuidar Enfermos
            </label>
            <label class="col-2 mt-3">
                <input type="checkbox" name="aotros" value="1"> Otros
            </label>

            <div class="valid-feedback"></div>

            <div class="col-12 mt-3">
            </div>
            <div class="col-6 mt-3">
                <label for="trabajar">Le gustaria trabajar:</label>
                <select type="text" id="trabajar" name="trabajar" class="form-control" required value="{{old('trabajar')}}">
                    <option value="">Elegir</option>
                    <option value="solo">Solo</option>
                    <option value="grupos">En Grupos</option>
                </select>
            </div>

            <div class="col-6 mt-3">
                <label for="namigos">Sus amigos son:</label>
                <select type="text" id="namigos" name="namigos" class="form-control" required value="{{old('namigos')}}">
                    <option value="">Elegir</option>
                    <option value="pocos">Pocos</option>
                    <option value="muchos">Muchos</option>
                </select>
            </div>

            <div class="col-6 mt-3">
                <label for="edadamigos">Son sus amigos:</label>
                <select type="text" id="edadamigos" name="edadamigos" class="form-control" required value="{{old('edadamigos')}}">
                    <option value="">Elegir</option>
                    <option value="mayores">Mayores que usted</option>
                    <option value="jovenes">Mas jovenes</option>
                    <option value="misma">De la misma edad</option>
                </select>
            </div>

            <div class="col-6 mt-3">
                <label for="pasatiempos">Cuales son sus diversiones o pasatiempos favoritos?</label>
                <input type="text" id="pasatiempos1" name="pasatiempos1" class="form-control" required value="{{old('pasatiempos1')}}" placeholder="Primero"></input>
                <div class="valid-feedback"></div>
                <input type="text" id="pasatiempos2" name="pasatiempos2" class="form-control" required value="{{old('pasatiempos2')}}" placeholder="Segundo"></input>
                <div class="valid-feedback"></div>
                <input type="text" id="pasatiempos3" name="pasatiempos3" class="form-control" required value="{{old('pasatiempos3')}}" placeholder="Tercero"></input>
                <div class="valid-feedback"></div>
            </div>

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

            <div class="col-3 mt-3">
            <a class="btn btn-success" href="{{ route('escolarcuatro.create') }}">siguiente</a>
            </div>
        </form>
    </div>
</div>
@endSection