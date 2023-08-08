@extends('layout.panel')


@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Agregar Nuevo Alumno</h3>
            </div>
            <div class="col text-right">
                <a href="{{route('principal.create')}}" class="btn btn-lg btn-success">
                    <i class="fas fa-angle-left"></i>
                    Regresar</a>
            </div>
        </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>¡Por favor!</strong> {{$error}}
        </div>
        @endforeach
        @endif
        <form action="{{ route('submitmatricula') }}" method="POST" id="fomulario_Alumno" >


            @csrf
            <input type="hidden" name="opcion" id="opcion">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="numerodeidentidad">Número de identidad</label>
                    <input type="text" class="form-control" name="numerodeidentidad" id="numerodeidentidad" value="{{ old('numerodeidentidad')?old('numerodeidentidad'):(session('identidad')?session('identidad'):(isset($alumno->numerodeidentidad)?$alumno->numerodeidentidad:'' )) }}" placeholder="Sin guiones" required maxlength="14">
                    <div class="invalid-feedback">#</div>
                </div>
                <div class="col-md-1">
                    <label for="numerodeidentidad">Comprobar</label>
                   <xbutton type="button" class="btn btn-danger" type="button"  onclick="compribar()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                      </svg>
                   </button>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="primernombre">Primer Nombre</label>
                    <input type="text" class="form-control" name="primernombre" value="{{ old('primernombre')?old('primernombre'):(isset($alumno->primernombre)?$alumno->primernombre:'') }}" placeholder="Primer Nombre" required maxlength="12">
                    <div class="valid-feedback"></div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="segundonombre">Segundo Nombre</label>
                    <input type="text" class="form-control" name="segundonombre" value="{{ old('segundonombre')?old('segundonombre'):(isset($alumno->segundonombre)?$alumno->segundonombre:'') }}" placeholder="Segundo Nombre" maxlength="12">
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="primerapellido">Primer Apellido</label>
                    <input type="text" class="form-control" name="primerapellido" value="{{ old('primerapellido')?old('primerapellido'):(isset($alumno->primerapellido)?$alumno->primerapellido:'') }}" placeholder="Primer Apellido" required maxlength="14">
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="segundoapellido">Segundo Apellido</label>
                    <input type="text" class="form-control" name="segundoapellido" value="{{ old('segundoapellido')?old('segundoapellido'):(isset($alumno->segundoapellido)?$alumno->segundoapellido:'') }}" placeholder="Segundo Apellido"  maxlength="14">
                    <div class="valid-feedback">#</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="fechadenacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="fechadenacimiento" value="{{ old('fechadenacimiento')?old('fechadenacimiento'):(isset($alumno->fechadenacimiento)?$alumno->fechadenacimiento:'') }}" required>
                    <div class="invalid-feedback">#</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="genero">Género</label>
                    <select type="text" name="genero" class="form-control">
                        <option value="">Elegir</option>
                        <option @if(old('genero')=='femenino' || (isset($alumno->genero)?$alumno->genero:'') == 'femenino')
                            selected
                            @else

                            @endif value="femenino">Femenino</option>
                        <option @if(old('genero')=='masculino' || (isset($alumno->genero)?$alumno->genero:'') == 'masculino')
                            selected
                            @else

                            @endif
                            value="masculino">Masculino</option>
                    </select>
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>
            <div class="form-row">

                <div class="col-md-4 mb-3">
                    <label for="ciudad">Lugar de nacimiento</label>
                    <input type="text" class="form-control" pattern="[A-Za-z\s\.]+" name="ciudad" value="{{ old('ciudad')?old('ciudad'):(isset($alumno->ciudad)?$alumno->ciudad:'') }}" placeholder="Ciudad"  maxlength="12">
                    <div class="valid-feedback"></div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="depto" id="departamento ">Departamento</label>
                    <input type="text" class="form-control" name="depto" value="{{ old('depto')?old('depto'):(isset($alumno->depto)?$alumno->depto:'') }}" placeholder="Departamento"  maxlength="12">
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="pais" id="pais">Pais</label>
                    <input type="" class="form-control" name="pais" value="{{ old('pais')?old('pais'):(isset($alumno->pais)?$alumno->pais:'') }}" placeholder="Pais"  maxlength="14">
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="curso_id">Grado</label>
                    <select class="form-control" id="curso_id" name="curso_id">
                        <option value="">Seleccionar un curso</option>
                        @foreach ($cursos as $id => $curso)
                        <option @if(old('curso_id')==$id || (isset($alumno->curso_id)?$alumno->curso_id:'') == $id)
                            selected
                            @else

                            @endif value="{{ $id }}">{{ $curso }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="escuelaanterior">Escuela anterior</label>
                    <input type="text" class="form-control" name="escuelaanterior" value="{{ old('escuelaanterior')?old('escuelaanterior'):(isset($alumno->escuelaanterior)?$alumno->escuelaanterior:'') }}" placeholder="Escuela Anterior" maxlength="30">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="direccion">Dirección de residencia del alumno(a)</label>
                    <input type="text" class="form-control" name="direccion" value="{{ old('direccion')?old('direccion'):(isset($alumno->direccion)?$alumno->direccion:'') }}" placeholder="Dirección" maxlength="50">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="totalhermanos">Total de hermanos(as)</label>
                    <input type="text" class="form-control" name="totalhermanos" placeholder="Total de hermanos(as)" value="{{ old('totalhermanos')?old('totalhermanos'):(isset($alumno->totalhermanos)?$alumno->totalhermanos:'') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="numerodehermanosenicgc">No. De hermanos(as) actualmente en ICGC</label>
                    <input type="text" class="form-control" name="numerodehermanosenicgc" value="{{ old('numerodehermanosenicgc')?old('numerodehermanosenicgc'):(isset($alumno->numerodehermanosenicgc)?$alumno->numerodehermanosenicgc:'') }}" placeholder="No. de hermanos(as) actualmente en ICGC">

                </div>
                <div class="col-md-4 mb-3">
                    <label for="telefonoemergencia">En caso de emergencia llamar al telefono:</label>
                    <input type="text" class="form-control" name="telefonoemergencia" value="{{ old('telefonoemergencia')?old('telefonoemergencia'):(isset($alumno->telefonoemergencia)?$alumno->telefonoemergencia:'') }}" placeholder="telefono emergencia" maxlength="8">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="medico">Nombre del medico que la atiende</label>
                    <input type="text" class="form-control" name="medico" value="{{ old('medico')?old('medico'):(isset($alumno->medico)?$alumno->medico:'') }}" placeholder="Nombre medico" maxlength="20">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tiene_alergia">¿Tiene alguna alergia?</label>
                    <br>
                    <label for="tiene_alergia_no">No</label>
                    <input type="radio" name="tiene_alergia" id="tiene_alergia_no" value="0" onchange="hideContent()" @if(old('tiene_alergia')=='0' || (isset($alumno->tiene_alergia)?$alumno->tiene_alergia:'') == '0')
                        checked
                    @else

                    @endif>
                    <label for="tiene_alergia_si">Sí</label>
                    <input type="radio" name="tiene_alergia" id="tiene_alergia_si" value="1" onchange="showContent()" @if(old('tiene_alergia')=='1' || (isset($alumno->tiene_alergia)?$alumno->tiene_alergia:'') == '1')
                    checked
                    @else

                    @endif>
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

                <div class="col-md-4 mb-3" id="content"  @if(old('tiene_alergia')=='1' || (isset($alumno->tiene_alergia)?$alumno->tiene_alergia:'') == '1')
                    style="display: block;"
                    @else
                    style="display: none;"
                    @endif >
                    <input type="text" class="form-control" name="alergia" placeholder="¿Que tipo de alergia?" @if(old('tiene_alergia')=='1' || (isset($alumno->tiene_alergia)?$alumno->tiene_alergia:'') == '1')
                    value="{{ old('alergia')?old('alergia'):(isset($alumno->alergia)?$alumno->alergia:'') }}"
                    @else

                    @endif >
                </div>
            </div>


            <div>
                <hr class="mb-2">
                <h4 class="mb-0">Si el alumno entregó estos documentos, puede marcarlos, sino déjelos en blanco.</h4>
                <hr class="mb-2">
            </div>

            <div class="checkbox-group">
           
            
                <label class="checkbox-item">
                    <input type="checkbox" name="fotografias" value="1"
                        @if(old('fotografias') == '1' || (isset($alumno->fotografias) ? $alumno->fotografias : '') == '1')
                            checked
                        @endif
                    >
                    Fotografías del alumno
                </label>
            
                <label class="checkbox-item">
                    <input type="checkbox" name="fotografiasdelpadre" value="1"
                        @if(old('fotografiasdelpadre') == '1' || (isset($alumno->fotografiasdelpadre) ? $alumno->fotografiasdelpadre : '') == '1')
                            checked
                        @endif
                    >
                    Fotografías del padre
                </label>
            
                <label class="checkbox-item">
                    <input type="checkbox" name="carnet" value="1"
                        @if(old('carnet') == '1' || (isset($alumno->carnet) ? $alumno->carnet : '') == '1')
                            checked
                        @endif
                    >
                    Carnet de vacunación
                </label>
            
                <label class="checkbox-item">
                    <input type="checkbox" name="certificadodeconducta" value="1"
                        @if(old('certificadodeconducta') == '1' || (isset($alumno->certificadodeconducta) ? $alumno->certificadodeconducta : '') == '1')
                            checked
                        @endif
                    >
                    Certificado de conducta
                </label>
                </div>

            <div>
                <hr class="mb-2">
                <h4 class="mb-0">Como viaja su hijo</h4>
                <hr class="mb-2">
            </div>


            <div class="checkbox-group"> 
                <label class="checkbox-item">
                    <input type="checkbox" name="bus" value="1"
                        @if(old('bus') == '1' || (isset($alumno->bus) ? $alumno->bus : '') == '1')
                            checked
                        @endif
                    >
                    Bus
                </label>
                <label class="checkbox-item">
                    <input type="checkbox" name="taxi" value="1"
                        @if(old('taxi') == '1' || (isset($alumno->taxi) ? $alumno->taxi : '') == '1')
                            checked
                        @endif
                    >
                    Taxi
                </label>
                <label class="checkbox-item">
                    <input type="checkbox" name="conpadre" value="1"
                        @if(old('conpadre') == '1' || (isset($alumno->conpadre) ? $alumno->conpadre : '') == '1')
                            checked
                        @endif
                    >
                    Con padre
                </label>
                <label class="checkbox-item">
                    <input type="checkbox" name="solo" value="1"
                        @if(old('solo') == '1' || (isset($alumno->solo) ? $alumno->solo : '') == '1')
                            checked
                        @endif
                    >
                    Solo
                </label>
                </div>

            

            <hr class="mb-2">
            <button type="submit" class="btn btn-primary btn-lg">
                @if(isset($alumno->id))
                Actualizar
                @else
                Guardar
                @endif </button>


        </form>



    </div>

    <form action="{{ route('comprobar.alumno') }}" method="POST" id="formulario_comprobar">
        @csrf
        <input type="hidden" name="identidad" id="identidad">
    </form>
</div>
<style>
    #departamento {
        display: inline-block;
    }

</style>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    function compribar() {
       document.getElementById("identidad").value = document.getElementById("numerodeidentidad").value;

       document.getElementById("formulario_comprobar").submit();
    }

</script>


@endsection

