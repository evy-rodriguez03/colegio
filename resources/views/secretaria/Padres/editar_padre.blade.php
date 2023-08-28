@extends('layout.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Actualizar Padre</h1>
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

        <form class="row g-3 mt-3" action="{{url('/padres/'.$padres->id)}}" method="POST">
          @csrf
          @method('PUT')
        <div class="form-group col-2 mt-3">
            <label for="tipo">Tipo:</label>
        </div>
        <div class="col-10 mt-3">
            <select type="text" id="tipo" name="tipo" class="form-control" required value="{{old('tipo', $padres->tipo)}}">
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
            <input type="text" id="primernombre" name="primernombre" class="form-control" required value="{{old('primernombre', $padres->primernombre)}}"
            placeholder="Ingrese el primer nombre"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="segundonombre">Segundo Nombre:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="segundonombre" name="segundonombre" class="form-control" required value="{{old('segundonombre', $padres->segundonombre)}}"
            placeholder="Ingrese el segundo nombre"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="primerapellido">Primer Apellido:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="primerapellido" name="primerapellido" class="form-control" required value="{{old('primerapellido', $padres->primerapellido)}}"
            placeholder="Ingrese el primer apellido"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="segundoapellido">Segundo Apellido:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="segundoapellido" name="segundoapellido" class="form-control" required value="{{old('segundoapellido', $padres->segundoapellido)}}"
            placeholder="Ingrese el segundo apellido"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="numerodeidentidad">Número de Identidad:</label>
        </div>
        <div class="col-10 mt-3">
            <input type="text" id="identidad" name="numerodeidentidad" class="form-control" required value="{{old('numerodeidentidad', $padres->numerodeidentidad)}}"
            placeholder="Ingrese el número de identidad"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="telefonopersonal">Teléfono Personal:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="telefonopersonal" name="telefonopersonal" class="form-control" required value="{{old('telefonopersonal', $padres->telefonopersonal)}}"
            placeholder="Ingrese el télefono personal"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="lugardetrabajo">Lugar de Trabajo:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="lugardetrabajo" name="lugardetrabajo" class="form-control" required value="{{old('lugardetrabajo', $padres->lugardetrabajo)}}"
            placeholder="Ingrese el lugar de trabajo"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="oficio">Oficio:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="oficio" name="oficio" class="form-control" required value="{{old('oficio', $padres->oficio)}}"
            placeholder="Ingrese el oficio"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="telefonooficina">Teléfono de Oficina:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="telefonooficina" name="telefonooficina" class="form-control" required value="{{old('telefonooficina', $padres->telefonooficina)}}"
            placeholder="Ingrese el télefono de oficina"></input>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="ingresos">Ingresos:</label>
        </div>
        <div class="col-10 mt-3">
            <input type="text" id="ingresos" name="ingresos" class="form-control" required value="{{old('ingresos', $padres->ingresos)}}"
            placeholder="Ingrese los ingresos"></input>
        </div>

        <div class="col text-left">
        <button type="submit" class="btn btn-primary mt-3"> Guardar </button>
    </form>
    </div>
</div>

@endSection
