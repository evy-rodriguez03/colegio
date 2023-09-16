@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Agregar Clase Retrasadas</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('retrasadas.index')}}" class="btn btn-lg btn-success">
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

        <form class="row g-3 mt-3" action="{{route('retrasadas.index')}}" method="POST">
            @csrf

            <h2 class="col-12 mt-3">Datos del alumno: {{$alumno->primernombre}} {{$alumno->segundonombre}} {{$alumno->primerapellido}} {{$alumno->segundoapellido}}</h2>

            <input type="hidden" name='id_alumno' value='{{$alumno->id}}'>
            @php
            $retrasada = $retrasadas->get($alumno->id);
            $gradoinput = $retrasada && $retrasada->grado;
            $anioinput = $retrasada && $retrasada->anio;
            $materiaretrasadainput = $retrasada && $retrasada->materiaretrasada ;
            $totalinput = $retrasada && $retrasada->total;
            @endphp

            <div class="form-group col-2 mt-3">
                <label for="grado">Grado:</label>
            </div>
            <div class="col-4 mt-3">
                <input type="text" id="grado" name="grado" class="form-control"  value="{{$retrasada && $retrasada->grado ? $retrasada->grado : ''}}" placeholder="Ingrese el grado"></input>
            </div>

            <div class="form-group col-2 mt-3">
                <label for="anio">Año:</label>
            </div>
            <div class="col-4 mt-3">
                <input type="text" id="anio" name="anio" class="form-control"  value="{{$retrasada && $retrasada->anio ? $retrasada->anio : ''}}" placeholder="Ingrese el año" maxlength="4"></input>
            </div>

            <div class="form-group col-2 mt-3">
                <label for="grado">Materia Retrasada:</label>
            </div>
            <div class="col-4 mt-3">
                <input type="text" id="materiaretrasada" name="materiaretrasada" class="form-control"  value="{{$retrasada && $retrasada->materiaretrasada ? $retrasada->materiaretrasada : ''}}" placeholder="Ingrese la materia retrasada"></input>
            </div>

            <div class="form-group col-2 mt-3">
                <label for="total">Total a Pagar:</label>
            </div>
            <div class="col-4 mt-3">
                <input type="text" id="total" name="total" class="form-control" value="{{$retrasada && $retrasada->total ? $retrasada->total : '' }}" placeholder="L."></input>
            </div>

            <div class="col text-left">
                <button class="btn btn-primary btn-lg" type="submit">Aceptar</button>
            </div>
        </form>
    </div>
    @endSection