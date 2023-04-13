@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Agregar Sección Nueva</h3>
        </div>
        <div class="col text-right">
            <a href="{{route('dashboard.index')}}" class="btn btn-lg btn-success">
                <i class="fas fa-angle-left"></i>
                Regresar</a>
            </div>
      </div>
    </div>
    <!-- Formulario para crear -->
   
   
    <div class="card-body">

<form action="{{ route('secciones.store') }}" method="POST">
    @csrf

    <div class="form-group col-2 mt-3">
        <label for="descripcion">Descripción de la Sección</label>
        </div>

        <div class="col-4 mt-3">
            <input type="text" id="descripcion" name="descripcion" class="form-control"
            placeholder="Ingrese una descripcion">
            <div class="valid-feedback"></div>
        </div>

    <div class="form-group col-2 mt-3">
            <label for="jornada">Jornada:</label>
        </div>

        <div class="col-4 mt-3">
            <select type="text" id="jornada" name="jornada" class="form-control" required>
            <option value="">Elegir</option>
            <option value="matutina">Jornada Matutina</option>
            <option value="extendida">Jornada Extendida</option>
         </select>
         <div class="valid-feedback"></div>
        </div>

        <div class="form-group col-2 mt-3">
        <label for="modalidad">Modalidad</label>
        </div>

        <div class="col-4 mt-3">
            <select type="text" id="modalidad" name="modalidad" class="form-control" required>
            <option value="">Elegir</option>
            <option value="0">No aplica</option>
         </select>
         <div class="valid-feedback"></div>
        </div>


        <div class="form-group col-2 mt-3">
        <label for="malla_curricular">Malla Curricular</label>
        </div>
 
        <div class="col-4 mt-3">
        
        <select type="text" name="malla_curricular" id="malla_curricular" class="form-control" required>
        
        <option value="PRE-KINDER ">PRE-KINDER </option>
        <option value="KINDER ">KINDER </option>
        <option value="PREPARATORIA ">PREPARATORIA </option>

        <option value="PRIMER GRADO ">PRIMER GRADO </option>
        <option value="SEGUNDO GRADO ">SEGUNDO GRADO </option>
        <option value="TERCER GRADO ">TERCER GRADO </option>
        <option value="CUARTO GRADO ">CUARTO GRADO </option>
        <option value="QUINTO GRADO ">QUINTO GRADO </option>
        <option value="SEXTO GRADO ">SEXTO GRADO </option>

        <option value="SEPTIMO GRADO ">SEPTIMO GRADO </option>
        <option value="OCTAVO GRADO ">OCTAVO GRADO </option>
        <option value="NOVENO GRADO ">NOVENO GRADO </option>

      
        <option value="DECIMO GRADO ">DECIMO GRADO </option>
        <option value="UNDECIMO GRADO ">UNDECIMO GRADO </option>
    </select>
         <div class="valid-feedback"></div>
        </div>

        <div class="col-4 mt-3">
        <button type="submit" class="btn btn-lg btn-primary">Guardar</button>
         <div class="valid-feedback"></div>
        </div>
</form>
</div>
@endsection