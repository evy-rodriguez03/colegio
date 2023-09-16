@extends('layout.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Datos Madre</h1>
            </div>
            <div class="col text-right">
                <a href="#" onclick="window.history.back();" class="btn btn-lg btn-success">
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

        <form class="row g-3 mt-3" action="{{route('submitmadre')}}" method="POST">
          @csrf
          <input type="hidden" name="alumno_id" value="{{ request()->input('alumno_id') }}">

        <div class="form-group col-2 mt-3">
            <label for="primernombre">Primer Nombre:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="primernombre" name="primernombre" class="form-control" required maxlength="20" value="{{old('primernombre')}}"
            placeholder="Ingrese el primer nombre"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="segundonombre">Segundo Nombre:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="segundonombre" name="segundonombre" class="form-control" required maxlength="20" value="{{old('segundonombre')}}"
            placeholder="Ingrese el segundo nombre"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="primerapellido">Primer Apellido:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="primerapellido" name="primerapellido" class="form-control" required maxlength="14" value="{{old('primerapellido')}}"
            placeholder="Ingrese el primer apellido"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="segundoapellido">Segundo Apellido:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="segundoapellido" name="segundoapellido" class="form-control" required maxlength="14" value="{{old('segundoapellido')}}"
            placeholder="Ingrese el segundo apellido"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="numerodeidentidad">Número de Identidad:</label>
        </div>
        <div class="col-10 mt-3">
            <input type="text" id="identidad" name="numerodeidentidad" class="form-control" required maxlength="13" value="{{old('numerodeidentidad')}}"
            placeholder="Ingrese el número de identidad"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="telefonopersonal">Teléfono Personal:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="telefonopersonal" name="telefonopersonal" class="form-control" required maxlength="8" value="{{old('telefonopersonal')}}"
            placeholder="Ingrese el télefono personal"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="lugardetrabajo">Lugar de Trabajo:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="lugardetrabajo" name="lugardetrabajo" pattern="[A-Za-z\s\.,]+" class="form-control" required  maxlength="50" value="{{old('lugardetrabajo')}}"
            placeholder="Ingrese el lugar de trabajo"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="oficio">Profesion u Oficio:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="oficio" name="oficio" pattern="[A-Za-z\s\.,]+" class="form-control" required maxlength="20" value="{{old('oficio')}}"
            placeholder="Ingrese el oficio"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="telefonooficina">Teléfono de Oficina:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="telefonooficina" name="telefonooficina" class="form-control" required maxlength="8" value="{{old('telefonooficina')}}"
            placeholder="Ingrese el télefono de oficina"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="ingresos">Ingresos:</label>
        </div>
        <div class="col-10 mt-3">
            <input type="text" id="ingresos" name="ingresos" class="form-control" required maxlength="10" value="{{old('ingresos')}}"
            placeholder="Ingrese los ingresos"></input>
        </div>

        <div class="col text-left">
        <button type="submit" class="btn btn-primary btn-lg" >Guardar</button>
        <a class="btn btn-success btn-lg" href="{{ route('datosencargado.create') }}">Omitir</a>
    </form>
    </div>
    </div>
</div>
@endSection
