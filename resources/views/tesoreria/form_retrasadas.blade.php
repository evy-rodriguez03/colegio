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

        <form class="row g-3 mt-3" action="{{route('retrasadas.index')}}"  method="POST">
          @csrf
        <div class="form-group col-2 mt-3">
            <label for="primernombre">Primer Nombre:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="primernombre" name="primernombre" class="form-control" required value="{{old('primernombre')}}"
            placeholder="Ingrese el primer nombre"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="segundonombre">Segundo Nombre:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="segundonombre" name="segundonombre" class="form-control" required value="{{old('segundonombre')}}"
            placeholder="Ingrese el segundo nombre"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="primerapellido">Primer Apellido:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="primerapellido" name="primerapellido" class="form-control" required value="{{old('primerapellido')}}"
            placeholder="Ingrese el primer apellido"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="segundoapellido">Segundo Apellido:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="segundoapellido" name="segundoapellido" class="form-control" required value="{{old('segundoapellido')}}"
            placeholder="Ingrese el segundo apellido"></input>
        </div>
        
        <div class="form-group col-2 mt-3">
            <label for="grado">Grado:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="grado" name="grado" class="form-control" required value="{{old('grado')}}"
            placeholder="Ingrese el grado"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="anio">Año:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="anio" name="anio" class="form-control" required value="{{old('anio')}}"
            placeholder="Ingrese el año"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="grado">Materia Retrasada:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="materiaretrasada" name="materiaretrasada" class="form-control" required value="{{old('materiaretrasada')}}"
            placeholder="Ingrese la materia retrasada"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="total">Total a Pagar:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="total" name="total" class="form-control" required value="{{old('total')}}"
            placeholder="Ingrese el total a pagar"></input>
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Guardar
        </button>
    </form>
</div>
@endSection
