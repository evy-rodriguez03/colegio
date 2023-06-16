@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar</h1>
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
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Llora con facilidad</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Se siente preocupado</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Se considera nervioso</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Se siente solo</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Se considera debil fisicamente</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es amistoso</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es carinioso</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Se considera timido</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es testarudo</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es tranquilo pasivo</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es puntual</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es egoista</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es celoso</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es violento</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es agresivo</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es comprensivo</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es ordenado</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es comunicativo</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es muy religioso</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Le preocupa el futuro</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es retraido</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Es cooperador</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
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