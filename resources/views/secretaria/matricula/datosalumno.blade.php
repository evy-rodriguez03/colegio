@extends('layout.panel')


@section('content')

<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Agregar Nuevo Alumno</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('alumnos.index')}}" class="btn btn-lg btn-success">
            <i class="fas fa-angle-left"></i>
            Regresar</a>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">

      @if ($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>¡Por favor!</strong> {{$error}}
        </div>
          @endforeach
      @endif
      <form action="{{ route('submitmatricula') }}" method="POST">
        @csrf
        <div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="primernombre">Primer Nombre</label>
              <input type="text" class="form-control" name="primernombre" placeholder="Primer Nombre" required>
              <div class="valid-feedback"></div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="segundonombre">Segundo Nombre</label>
              <input type="text" class="form-control" name="segundonombre" placeholder="Segunda Nombre" required>
              <div class="valid-feedback">Looks good!</div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="primerapellido">Primer Apellido</label>
              <input type="" class="form-control" name="primerapellido" placeholder="Primer Apellido" required>
              <div class="valid-feedback">Looks good!</div>
          </div>
      </div>
      
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="segundoapellido">Segundo Apellido</label>
                <input type="text" class="form-control" name="segundoapellido" placeholder="Segundo Apellido" required>
                <div class="valid-feedback">#</div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="fechadenacimiento">Fecha de Nacimiento</label>
              <input type="date" class="form-control" name="fechadenacimiento" required>
              <div class="invalid-feedback">#</div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="genero">Género</label>
              <select type="text" name="genero" class="form-control">
            <option value="">Elegir</option>
            <option value="femenino">Femenino</option>
            <option value="masculino">Masculino</option>
         </select>
              <div class="valid-feedback">Looks good!</div>
          </div>
        </div>
        <div class="form-row">
          
          <div class="col-md-4 mb-3">
              <label for="ciudad">Lugar de nacimiento</label>
              <input type="text" class="form-control" name="ciudad" placeholder="Ciudad" required>
              <div class="valid-feedback"></div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="depto" id="departamento ">Departamento</label>
              <input type="text" class="form-control" name="depto" placeholder="Departamento" required>
              <div class="valid-feedback">Looks good!</div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="pais" id="pais">Pais</label>
              <input type="" class="form-control" name="pais" placeholder="Pais" required>
              <div class="valid-feedback">Looks good!</div>
          </div>
      </div>
        <div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="gradoingresar">Grado a ingresar</label>
              <input type="text" class="form-control" name="gradoingresar" placeholder="Grado a ingresar" required>
              <div class="invalid-feedback">#</div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="escuelaanterior">Escuela anterior</label>
              <input type="text" class="form-control" name="escuelaanterior" placeholder="Escuela Anterior" >
          </div>
          <div class="col-md-4 mb-3">
              <label for="direccion">Dirección de residencia del alumno(a)</label>
              <input type="text" class="form-control" name="direccion" placeholder="Dirección" >
          </div>
          <div class="col-md-4 mb-3">
              <label for="totalhermanos">Total de hermanos(as)</label>
              <input type="text" class="form-control" name="totalhermanos" placeholder="Total de hermanos(as)"  >
          </div>
          <div class="col-md-4 mb-3">
              <label for="numerodehermanosenicgc">No. De hermanos(as) actualmente en ICGC</label>
              <input type="text" class="form-control" name="numerodehermanosenicgc" placeholder="No de hermanos(as) actualmente en ICGC" >
          </div>
          <div class="col-md-4 mb-3">
              <label for="telefonoemergencia">En caso de emergencia llamar al telefono:</label>
              <input type="text" class="form-control" name="telefonoemergencia" placeholder="telefono emergencia" >
          </div>
          <div class="col-md-4 mb-3">
                <label for="numerodeidentidad">Número de identidad</label>
                <input type="text" class="form-control" name="numerodeidentidad" placeholder="Sin guiones" required>
                <div class="invalid-feedback">#</div>
            </div>
         <div class="col-md-4 mb-3">
      <label for="tiene_alergia">¿Tiene alguna alergia?</label>
      <br>
   <label for="tiene_alergia">No</label>
   <input  type="checkbox" name="No" value="0">
    <label for="tiene_alergia">si</label>

<input type="checkbox" name="tiene_alergia" id="tiene_alergia" value="1" onchange="javascript:showContent()" />
</div>
<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        tiene_alergia = document.getElementById("tiene_alergia");
        if (tiene_alergia.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
        </script>
         
        <div class="col-md-4 mb-3" id="content" style="display: none;">
        <input type="text" class="form-control" name="tiene_alergia" placeholder="¿Que tipo de alergia?" >
        </div>
      </div>

        <div class="col-md-4 mb-3">
          <label for="medico">Nombre del medico que la atiende</label>
              <input type="text" class="form-control" name="medico" placeholder="Nombre medico" >  
     </div>
     


                <div class="checkbox-group">
                  <hr class="mb-2">
                  <h4 class="mb-0">Si el alumno entrego estos documentos, puede marcarlos, sino dejelos en blanco.</h4>
                  <hr class="mb-2">
                  <label>
                    <input type="checkbox" name="fotografias" value="1">
                    Fotografias del alumno
                  </label>
                  <label>
                    <input type="checkbox" name="fotografiasdelpadre" value="2">
                    Fotografias del padre
                  </label>
                  <label>
                    <input type="checkbox" name="carnet" value="3">
                    Carnet de Vacunación
                  </label>
                  <label>
                    <input type="checkbox" name="certificadodeconducta" value="4">
                    Certificado de conducta
                  </label>
  
                </div>
                
                <hr class="mb-2">
                <button a href="{{Route('datospadre.create')}}" class="btn btn-primary btn-lg" type="submit">siguiente</button>
          </form>

    </div>
  </div>
  <style>
    #departamento{
      display: inline-block;
    }
  </style>
@endsection