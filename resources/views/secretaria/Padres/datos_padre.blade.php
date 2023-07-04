@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Agregar Nuevo Padre</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('padres.index')}}" class="btn btn-lg btn-success">
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

        <form class="row g-3 mt-3" action="{{route('padres.index')}}" method="POST">
            @csrf
            <div class="form-group col-2 mt-3">
                <label for="tipo">Tipo:</label>
            </div>
            <div class="col-10 mt-3">
                <select type="text" id="tipo" name="tipo" class="form-control" required value="{{old('tipo')}}">
                    <option value="">Elegir</option>
                    <option value="Padre">Padre</option>
                    <option value="Madre">Madre</option>
                    <option value="Encargado">Encargado</option>
                </select>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-2 mt-3">
                <label for="primernombre">Primer Nombre:</label>
            </div>
            <div class="col-4 mt-3">
                <input type="text" id="primernombre" name="primernombre" class="form-control" required value="{{old('primernombre')}}" placeholder="Ingrese el primer nombre"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-2 mt-3">
                <label for="segundonombre">Segundo Nombre:</label>
            </div>
            <div class="col-4 mt-3">
                <input type="text" id="segundonombre" name="segundonombre" class="form-control" required value="{{old('segundonombre')}}" placeholder="Ingrese el segundo nombre"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-2 mt-3">
                <label for="primerapellido">Primer Apellido:</label>
            </div>
            <div class="col-4 mt-3">
                <input type="text" id="primerapellido" name="primerapellido" class="form-control" required value="{{old('primerapellido')}}" placeholder="Ingrese el primer apellido"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-2 mt-3">
                <label for="segundoapellido">Segundo Apellido:</label>
            </div>
            <div class="col-4 mt-3">
                <input type="text" id="segundoapellido" name="segundoapellido" class="form-control" required value="{{old('segundoapellido')}}" placeholder="Ingrese el segundo apellido"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-2 mt-3">
                <label for="numerodeidentidad">Número de Identidad:</label>
            </div>
            <div class="col-10 mt-3">
                <input type="text" id="identidad" name="numerodeidentidad" class="form-control" required value="{{old('numerodeidentidad')}}" placeholder="Ingrese el número de identidad"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-2 mt-3">
                <label for="telefonopersonal">Teléfono Personal:</label>
            </div>
            <div class="col-4 mt-3">
                <input type="text" id="telefonopersonal" name="telefonopersonal" class="form-control" required value="{{old('telefonopersonal')}}" placeholder="Ingrese el télefono personal"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-2 mt-3">
                <label for="lugardetrabajo">Lugar de Trabajo:</label>
            </div>
            <div class="col-4 mt-3">
                <input type="text" id="lugardetrabajo" name="lugardetrabajo" class="form-control" required value="{{old('lugardetrabajo')}}" placeholder="Ingrese el lugar de trabajo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-2 mt-3">
                <label for="oficio">Oficio:</label>
            </div>
            <div class="col-4 mt-3">
                <input type="text" id="oficio" name="oficio" class="form-control" required value="{{old('oficio')}}" placeholder="Ingrese el oficio"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-2 mt-3">
                <label for="telefonooficina">Teléfono de Oficina:</label>
            </div>
            <div class="col-4 mt-3">
                <input type="text" id="telefonooficina" name="telefonooficina" class="form-control" required value="{{old('telefonooficina')}}" placeholder="Ingrese el télefono de oficina"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-2 mt-3">
                <label for="ingresos">Ingresos:</label>
            </div>
            <div class="col-10 mt-3">
                <input type="text" id="ingresos" name="ingresos" class="form-control" required value="{{old('ingresos')}}" placeholder="Ingrese los ingresos"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col text-left">
                <button class="btn btn-primary btn-lg" type="submit">Guardar</button>

        </form>
    </div>
</div>
</div>
@endSection