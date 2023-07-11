@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar Paso-4</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('escolartres.create')}}" class="btn btn-lg btn-success">
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

            <table class="table align-items-center table-flush">
                <tr class="thead-light">
                    <td><input type="checkbox" name="abanda" value="1"> Banda de Gerra</td>
                    <td><input type="checkbox" name="afutbol" value="1"> Futbol</td>
                    <td><input type="checkbox" name="apingpong" value="1"> Ping Pong</td>
                    <td><input type="checkbox" name="anumeros" value="1"> Trabajo con Numeros</td>
                    <td><input type="checkbox" name="alectura" value="1"> Lectura</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="acoro" value="1"> Coro</td>
                    <td><input type="checkbox" name="abasket" value="1"> Basketball</td>
                    <td><input type="checkbox" name="atennis" value="1"> Tennis</td>
                    <td><input type="checkbox" name="amanuales" value="1"> Trabajos Manuales</td>
                    <td><input type="checkbox" name="aoratoria" value="1"> Oratoria</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="avolley" value="1"> Volleyball</td>
                    <td><input type="checkbox" name="aatletismo" value="1"> Atletismo</td>
                    <td><input type="checkbox" name="adomestico" value="1"> Trabajo Domestico</td>
                    <td><input type="checkbox" name="aanimales" value="1"> Cuidar Animales</td>
                    <td><input type="checkbox" name="adibujo" value="1"> Dibujo y Pintura</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="afiestas" value="1"> Fiestas y Reuniones Sociales</td>
                    <td><input type="checkbox" name="acientificos" value="1"> Estudios Cientificos</td>
                    <td><input type="checkbox" name="aenfermos" value="1"> Cuidar Enfermos</td>
                    <td><input type="checkbox" name="aotros" value="1"> Otros</td>
                    <td></td>
                </tr>
                
            </table>

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
                <label for="pasatiempos">Cuales son sus diversiones o pasatiempos favoritos?</label>
                <input type="text" id="pasatiempos1" name="pasatiempos1" class="form-control mt-3" required value="{{old('pasatiempos1')}}" placeholder="Primero"></input>
                <div class="valid-feedback"></div>

                <input type="text" id="pasatiempos2" name="pasatiempos2" class="form-control mt-3" required value="{{old('pasatiempos2')}}" placeholder="Segundo"></input>
                <div class="valid-feedback"></div>

                <input type="text" id="pasatiempos3" name="pasatiempos3" class="form-control mt-3" required value="{{old('pasatiempos3')}}" placeholder="Tercero"></input>
                <div class="valid-feedback"></div>
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


            <div class="col-3 mt-3">
                <a class="btn btn-success" href="{{ route('escolarcinco.create') }}">siguiente</a>
            </div>
        </form>
    </div>
</div>
@endSection