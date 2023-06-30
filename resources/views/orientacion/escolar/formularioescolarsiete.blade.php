@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar Paso-7</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('escolarseis.create')}}" class="btn btn-lg btn-success">
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
            <div class="col-12 mt-3">
                <label>A continuacion se indican algunas manifestaciones y sentimientos que frecuentemente existen en las personas:</label>
            </div>
            <div class="col-12 mt-3">
                <table class="table align-items-center table-flush">
                    <tr class="thead-light">
                        <th></th>
                        <th>Frecuentemente</th>
                        <th>De vez en cuando</th>
                        <th>Casi nunca</th>
                    </tr>
                    <tr>
                        <td>Se siente triste</td>
                        <td><input type="checkbox" name="ftriste" value="1"></td>
                        <td><input type="checkbox" name="dtriste" value="1"></td>
                        <td><input type="checkbox" name="ctriste" value="1"></td>
                    </tr>
                    <tr>
                        <td>Llora con facilidad</td>
                        <td><input type="checkbox" name="fllora" value="1"></td>
                        <td><input type="checkbox" name="dllora" value="1"></td>
                        <td><input type="checkbox" name="cllora" value="1"></td>
                    </tr>
                    <tr>
                        <td>Se siente preocupado</td>
                        <td><input type="checkbox" name="fpreocupado" value="1"></td>
                        <td><input type="checkbox" name="dpreocupado" value="1"></td>
                        <td><input type="checkbox" name="cpreocupado" value="1"></td>
                    </tr>
                    <tr>
                        <td>Se considera nervioso</td>
                        <td><input type="checkbox" name="fnervioso" value="1"></td>
                        <td><input type="checkbox" name="dnervioso" value="1"></td>
                        <td><input type="checkbox" name="cnervioso" value="1"></td>
                    </tr>
                    <tr>
                        <td>Se siente solo</td>
                        <td><input type="checkbox" name="fsolo" value="1"></td>
                        <td><input type="checkbox" name="dsolo" value="1"></td>
                        <td><input type="checkbox" name="csolo" value="1"></td>
                    </tr>
                    <tr>
                        <td>Se considera debil fisicamente</td>
                        <td><input type="checkbox" name="fdebil" value="1"></td>
                        <td><input type="checkbox" name="ddebil" value="1"></td>
                        <td><input type="checkbox" name="cdebil" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es amistoso</td>
                        <td><input type="checkbox" name="famistoso" value="1"></td>
                        <td><input type="checkbox" name="damistoso" value="1"></td>
                        <td><input type="checkbox" name="camistoso" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es carinioso</td>
                        <td><input type="checkbox" name="fcarinioso" value="1"></td>
                        <td><input type="checkbox" name="dcarinioso" value="1"></td>
                        <td><input type="checkbox" name="ccarinioso" value="1"></td>
                    </tr>
                    <tr>
                        <td>Se considera timido</td>
                        <td><input type="checkbox" name="ftimido" value="1"></td>
                        <td><input type="checkbox" name="dtimido" value="1"></td>
                        <td><input type="checkbox" name="ctimido" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es testarudo</td>
                        <td><input type="checkbox" name="ftestarudo" value="1"></td>
                        <td><input type="checkbox" name="dtestarudo" value="1"></td>
                        <td><input type="checkbox" name="ctestarudo" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es tranquilo pasivo</td>
                        <td><input type="checkbox" name="ftranquilo" value="1"></td>
                        <td><input type="checkbox" name="dtranquilo" value="1"></td>
                        <td><input type="checkbox" name="ctranquilo" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es puntual</td>
                        <td><input type="checkbox" name="fpuntual" value="1"></td>
                        <td><input type="checkbox" name="dpuntual" value="1"></td>
                        <td><input type="checkbox" name="cpuntual" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es egoista</td>
                        <td><input type="checkbox" name="fegoista" value="1"></td>
                        <td><input type="checkbox" name="degoista" value="1"></td>
                        <td><input type="checkbox" name="cegoista" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es celoso</td>
                        <td><input type="checkbox" name="fceloso" value="1"></td>
                        <td><input type="checkbox" name="dceloso" value="1"></td>
                        <td><input type="checkbox" name="cceloso" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es violento</td>
                        <td><input type="checkbox" name="fviolento" value="1"></td>
                        <td><input type="checkbox" name="dviolento" value="1"></td>
                        <td><input type="checkbox" name="cviolento" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es agresivo</td>
                        <td><input type="checkbox" name="fagresivo" value="1"></td>
                        <td><input type="checkbox" name="dagresivo" value="1"></td>
                        <td><input type="checkbox" name="cagresivo" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es comprensivo</td>
                        <td><input type="checkbox" name="fcomprensivo" value="1"></td>
                        <td><input type="checkbox" name="dcomprensivo" value="1"></td>
                        <td><input type="checkbox" name="ccomprensivo" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es ordenado</td>
                        <td><input type="checkbox" name="fordenado" value="1"></td>
                        <td><input type="checkbox" name="dordenado" value="1"></td>
                        <td><input type="checkbox" name="cordenado" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es comunicativo</td>
                        <td><input type="checkbox" name="fcomunicativo" value="1"></td>
                        <td><input type="checkbox" name="dcomunicativo" value="1"></td>
                        <td><input type="checkbox" name="ccomunicativo" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es muy religioso</td>
                        <td><input type="checkbox" name="freligioso" value="1"></td>
                        <td><input type="checkbox" name="dreligioso" value="1"></td>
                        <td><input type="checkbox" name="creligioso" value="1"></td>
                    </tr>
                    <tr>
                        <td>Le preocupa el futuro</td>
                        <td><input type="checkbox" name="ffuturo" value="1"></td>
                        <td><input type="checkbox" name="dfuturo" value="1"></td>
                        <td><input type="checkbox" name="cfuturo" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es retraido</td>
                        <td><input type="checkbox" name="fretraido" value="1"></td>
                        <td><input type="checkbox" name="dretraido" value="1"></td>
                        <td><input type="checkbox" name="cretraido" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es cooperador</td>
                        <td><input type="checkbox" name="fcooperador" value="1"></td>
                        <td><input type="checkbox" name="dcooperador" value="1"></td>
                        <td><input type="checkbox" name="ccooperador" value="1"></td>
                    </tr>
                </table>
            </div>

            <div class="col-3 mt-3">
                <a class="btn btn-success" href="{{ route('escolar.index') }}">Guardar</a>
            </div>
        </form>
    </div>
</div>
@endSection