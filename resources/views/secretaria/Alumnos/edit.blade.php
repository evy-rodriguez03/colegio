@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Actualizar Alumno</h3>
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
      <form action="{{url('/alumnos/'.$alumnos->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="primernombre">Primer Nombre</label>
              <input type="text" class="form-control" name="primernombre" placeholder="Primer nombre" required value="{{old('primernombre', $alumnos->primernombre)}}">
              <div class="valid-feedback"></div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="segundonombre">Segundo Nombre</label>
              <input type="text" class="form-control" name="segundonombre" placeholder="Segunda nombre"  value="{{old('segundonombre', $alumnos->segundonombre)}}">
              <div class="valid-feedback">Looks good!</div>
          </div>
          
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="primerapellido">Primer Apellido</label>
                <input type="text" class="form-control" name="primerapellido" placeholder="Primer Apellido" required value="{{old('primerapellido', $alumnos->primerapellido)}}">
                <div class="valid-feedback">#</div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="segundoapellido">Segundo Apellido</label>
                <input type="text" class="form-control" name="segundoapellido" placeholder="Segundo Apellido" value="{{old('segundoapellido', $alumnos->segundoapellido)}}">
                <div class="valid-feedback">#</div>
            </div>
          <div class="col-md-4 mb-3">
              <label for="fechadenacimiento">Fecha de Nacimiento</label>
              <input type="date" class="form-control" name="fechadenacimiento" required value="{{old('fechadenacimiento', $alumnos->fechadenacimiento)}}">
              <div class="invalid-feedback">#</div>
          </div>

          <div class="col-md-4 mb-3">
              <label for="genero">Género</label>
              <input type="text" class="form-control" name="genero" placeholder="Género" required value="{{old('genero', $alumnos->genero)}}">
              <div class="valid-feedback">Looks good!</div>
          </div>

          <div class="col-md-4 mb-3">
               <label for="ciudad">Lugar de nacimiento</label>
               <input type="text" class="form-control" pattern="[A-Za-z\s\.]+" name="ciudad" value="{{ old('ciudad', $alumnos->ciudad)}}">
               <div class="valid-feedback"></div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="depto" id="departamento ">Departamento</label>
              <input type="text" class="form-control" name="depto" value="{{ old('depto', $alumnos->depto)}}">
              <div class="valid-feedback">Looks good!</div>
          </div>
                <div class="col-md-4 mb-3">
                    <label for="pais" id="pais">Pais</label>
                    <input type="" class="form-control" name="pais" value="{{ old('pais', $alumnos->pais)}}">
                    <div class="valid-feedback">Looks good!</div>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="escuelaanterior">Escuela anterior</label>
                    <input type="text" class="form-control" name="escuelaanterior" value="{{ old('escuelaanterior', $alumnos->escuelaanterior)}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="direccion">Dirección de residencia del alumno(a)</label>
                    <input type="text" class="form-control" name="direccion" value="{{ old('direccion', $alumnos->direccion)}}">
                </div>

                <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="totalhermanos">Total de hermanos(as)</label>
                    <input type="text" class="form-control" name="totalhermanos" placeholder="Total de hermanos(as)" value="{{ old('totalhermanos', $alumnos->totalhermanos)}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="numerodehermanosenicgc">No. De hermanos(as) actualmente en ICGC</label>
                    <input type="text" class="form-control" name="numerodehermanosenicgc" value="{{ old('numerodehermanosenicgc', $alumnos->numerodehermanosenicgc)}}">

                </div>
                <div class="col-md-4 mb-3">
                    <label for="telefonoemergencia">En caso de emergencia llamar al telefono:</label>
                    <input type="text" class="form-control" name="telefonoemergencia" value="{{ old('telefonoemergencia', $alumnos->telefonoemergencia)}}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="medico">Nombre del medico que la atiende</label>
                    <input type="text" class="form-control" name="medico" value="{{ old('medico', $alumnos->medico)}}">
                </div>
                <div class="col-md-4 mb-3">
    <label for="tiene_alergia">¿Tiene alguna alergia?</label>
    <br>
    <label for="tiene_alergia_no">No</label>
    <input type="radio" name="tiene_alergia" id="tiene_alergia_no" value="0" onchange="hideContent()" @if(old('tiene_alergia', $alumnos->tiene_alergia) == '0') checked @endif>
    <label for="tiene_alergia_si">Sí</label>
    <input type="radio" name="tiene_alergia" id="tiene_alergia_si" value="1" onchange="showContent()" @if(old('tiene_alergia', $alumnos->tiene_alergia) == '1') checked @endif>
</div>

<div class="col-md-4 mb-3" id="content" @if(old('tiene_alergia', $alumnos->tiene_alergia) == '1') style="display: block;" @else style="display: none;" @endif>
    <label for="alergia">Tipo de alergia</label>
    <input type="text" class="form-control" name="alergia" placeholder="Especificar alergia" value="{{ old('alergia', $alumnos->alergia) }}">
    <div class="invalid-feedback">#</div>
</div>

<script type="text/javascript">
    function showContent() {
        const element = document.getElementById("content");
        const tiene_alergia = document.getElementById("tiene_alergia_si");
        if (tiene_alergia.checked) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }

    function hideContent() {
        const element = document.getElementById("content");
        const tiene_alergia_no = document.getElementById("tiene_alergia_no");
        if (tiene_alergia_no.checked) {
            element.style.display = 'none';
        }
    }
</script>

            </div>                
                <hr class="mb-2">
                <button class="btn btn-primary btn-lg" type="submit">Guardar</button>
          </form>

    </div>
  </div>
@endsection