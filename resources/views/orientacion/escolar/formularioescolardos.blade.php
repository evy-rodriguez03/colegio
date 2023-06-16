@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('escolar.create')}}" class="btn btn-lg btn-success">
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
            <h2 class="col-12 mt-3">III. Datos Familiares:</h2>

            <!-- padre -->

            <div class="col-6 mt-3">
                <label style="font-weight: bold" for="nombrepadre">Nombre del Padre:</label>
                <input type="text" id="nombrepadre" name="nombrepadre" class="form-control" required value="{{old('nombrepadre')}}" placeholder="Ingrese nombre completo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="nidentidadpadre">Numero de Identidad:</label>
                <input type="text" id="nidentidadpadre" name="nidentidadpadre" class="form-control" required value="{{old('nidentidadpadre')}}" placeholder="Ingrese el numero de identidad"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="fechanacimientopadre">Fecha de Nacimiento:</label>
                <input type="text" id="fechanacimientopadre" name="fechanacimientopadre" class="form-control" required value="{{old('fechanacimientopadre')}}" placeholder="Ingrese la fecha"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="edadpadre">Edad Cumplida:</label>
                <input type="text" id="edadpadre" name="edadpadre" class="form-control" required value="{{old('edadpadre')}}" placeholder="Ingrese la edad"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="ncelularpadre">Numero de Celular:</label>
                <input type="text" id="ncelularpadre" name="ncelularpadre" class="form-control" required value="{{old('ncelularpadre')}}" placeholder="Ingrese el numero de celular"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="nestudiopadre">Nivel de estudio:</label>
                <select type="text" id="nestudiopadre" name="nestudiopadre" class="form-control" required value="{{old('nestudiopadre')}}">
                    <option value="">Elegir</option>
                    <option value="Primaria">Primaria</option>
                    <option value="Media">Media</option>
                    <option value="Superior">Superior</option>
                </select>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="profesionpadre">Profesion:</label>
                <input type="text" id="profesionpadre" name="profesionpadre" class="form-control" required value="{{old('profesionpadre')}}" placeholder="Ingrese la profesion"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="ocupacionpadre">Ocupacion Actual:</label>
                <input type="text" id="ocupacionpadre" name="ocupacionpadre" class="form-control" required value="{{old('ocupacionpadre')}}" placeholder="Ingrese la ocupacion"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="telefonnotrabajopadre">Telefono del Trabajo:</label>
                <input type="text" id="telefonnotrabajopadre" name="telefonnotrabajopadre" class="form-control" required value="{{old('telefonnotrabajopadre')}}" placeholder="Ingrese el telefono de trabajo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-12 mt-3">
            </div>

            <!-- madre -->

            <div class="col-6 mt-3">
                <label style="font-weight: bold" for="nombremadre">Nombre de la Madre:</label>
                <input type="text" id="nombremadre" name="nombremadre" class="form-control" required value="{{old('nombremadre')}}" placeholder="Ingrese nombre completo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="nidentidadmadre">Numero de Identidad:</label>
                <input type="text" id="nidentidadmadre" name="nidentidadmadre" class="form-control" required value="{{old('nidentidadmadre')}}" placeholder="Ingrese el numero de identidad"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="fechanacimientomadre">Fecha de Nacimiento:</label>
                <input type="text" id="fechanacimientomadre" name="fechanacimientomadre" class="form-control" required value="{{old('fechanacimientomadre')}}" placeholder="Ingrese la fecha"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="edadmadre">Edad Cumplida:</label>
                <input type="text" id="edadmadre" name="edadmadre" class="form-control" required value="{{old('edadmadre')}}" placeholder="Ingrese la edad"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="ncelularmadre">Numero de Celular:</label>
                <input type="text" id="ncelularmadre" name="ncelularmadre" class="form-control" required value="{{old('ncelularmadre')}}" placeholder="Ingrese el numero de celular"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="nestudiomadre">Nivel de estudio:</label>
                <select type="text" id="nestudiomadre" name="nestudiomadre" class="form-control" required value="{{old('nestudiomadre')}}">
                    <option value="">Elegir</option>
                    <option value="Primaria">Primaria</option>
                    <option value="Media">Media</option>
                    <option value="Superior">Superior</option>
                </select>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="profesionmadre">Profesion:</label>
                <input type="text" id="profesionmadre" name="profesionmadre" class="form-control" required value="{{old('profesionmadre')}}" placeholder="Ingrese la profesion"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="ocupacionmadre">Ocupacion Actual:</label>
                <input type="text" id="ocupacionmadre" name="ocupacionmadre" class="form-control" required value="{{old('ocupacionmadre')}}" placeholder="Ingrese la ocupacion"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="telefonnotrabajomadre">Telefono del Trabajo:</label>
                <input type="text" id="telefonnotrabajomadre" name="telefonnotrabajomadre" class="form-control" required value="{{old('telefonnotrabajomadre')}}" placeholder="Ingrese el telefono de trabajo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-12 mt-3">
            </div>

            <!-- encargado -->
            <div class="col-12 mt-3">
                <label style="font-weight: bold" for="vivescon">Llenar solo en caso de vivir con un encargado:</label>
            </div>

            <div class="col-6 mt-3">
                <label style="font-weight: bold" for="nombreencargado">Nombre del Encargado(a):</label>
                <input type="text" id="nombreencargado" name="nombreencargado" class="form-control" required value="{{old('nombreencargado')}}" placeholder="Ingrese nombre completo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="nidentidadencargado">Numero de Identidad:</label>
                <input type="text" id="nidentidadencargado" name="nidentidadencargado" class="form-control" required value="{{old('nidentidadencargado')}}" placeholder="Ingrese el numero de identidad"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="fechanacimientoencargado">Fecha de Nacimiento:</label>
                <input type="text" id="fechanacimientoencargado" name="fechanacimientoencargado" class="form-control" required value="{{old('fechanacimientoencargado')}}" placeholder="Ingrese la fecha"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="edadencargado">Edad Cumplida:</label>
                <input type="text" id="edadencargado" name="edadencargado" class="form-control" required value="{{old('edadencargado')}}" placeholder="Ingrese la edad"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="ncelularencargado">Numero de Celular:</label>
                <input type="text" id="ncelularencargado" name="ncelularencargado" class="form-control" required value="{{old('ncelularencargado')}}" placeholder="Ingrese el numero de celular"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="nestudioencargado">Nivel de estudio:</label>
                <select type="text" id="nestudioencargado" name="nestudioencargado" class="form-control" required value="{{old('nestudioencargado')}}">
                    <option value="">Elegir</option>
                    <option value="Primaria">Primaria</option>
                    <option value="Media">Media</option>
                    <option value="Superior">Superior</option>
                </select>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="profesionencargado">Profesion:</label>
                <input type="text" id="profesionencargado" name="profesionencargado" class="form-control" required value="{{old('profesionencargado')}}" placeholder="Ingrese la profesion"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="ocupacionencargado">Ocupacion Actual:</label>
                <input type="text" id="ocupacionencargado" name="ocupacionencargado" class="form-control" required value="{{old('ocupacionencargado')}}" placeholder="Ingrese la ocupacion"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="telefonnotrabajoencargado">Telefono del Trabajo:</label>
                <input type="text" id="telefonnotrabajoencargado" name="telefonnotrabajoencargado" class="form-control" required value="{{old('telefonnotrabajoencargado')}}" placeholder="Ingrese el telefono de trabajo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-12 mt-3">
            </div>

            <!-- otros datos -->

            <div class="col-6 mt-3">
                <label style="font-weight: bold" for="vivescon">Vives con:</label>
                <select type="text" id="vivescon" name="vivescon" class="form-control" required value="{{old('vivescon')}}">
                    <option value="">Elegir</option>
                    <option value="ambospadres">Ambos Padres</option>
                    <option value="solomadre">Solo con la Madre</option>
                    <option value="solopadre">Solo con el padre</option>
                    <option value="otros">Otros</option>
                </select>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="especifique">Especifique con quien vive:</label>
                <input type="text" id="especifique" name="especifique" class="form-control" required value="{{old('especifique')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="motivo">Motivo:</label>
                <input type="text" id="motivo" name="motivo" class="form-control" required value="{{old('motivo')}}" placeholder="Ingrese el motivo"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-12 mt-3">
                <label style="font-weight: bold" for="vivescon">Numero de Hermanos:</label>
            </div>

            <div class="col-6 mt-3">
                <label for="nmujeres">Mujeres:</label>
                <input type="text" id="nmujeres" name="nmujeres" class="form-control" required value="{{old('nmujeres')}}" placeholder="#"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="nhombres">Hombres:</label>
                <input type="text" id="nhombres" name="nhombres" class="form-control" required value="{{old('nhombres')}}" placeholder="#"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="lugarocupado">Lugar que ocupa entre ellos:</label>
                <input type="text" id="lugarocupado" name="lugarocupado" class="form-control" required value="{{old('lugarocupado')}}" placeholder="Ingrese el lugar que ocupa"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-12 mt-3">
            </div>

            <label class="col-6 mt-3">
                <input type="checkbox" name="checkpadrastro" value="1"> Tiene Padrastro?
            </label>
            <label class="col-6 mt-3">
                <input type="checkbox" name="checkmadrastra" value="1"> Tiene Madrastra?
            </label>

            <div class="col-12 mt-3">
            </div>

            <div class="col-6 mt-3">
                <label for="otrapersona">Otra Persona que Vive en el Hogar:</label>
                <input type="text" id="otrapersona" name="otrapersona" class="form-control" required value="{{old('otrapersona')}}" placeholder="Ingrese quien es"></input>
                <div class="valid-feedback"></div>
            </div>

            <!-- Situacion economica -->
            <h2 class="col-12 mt-3">IV. Situacion Economica:</h2>

            <div class="col-6 mt-3">
                <label for="situacioneconomica">Su situacion economica la considera:</label>
                <select type="text" id="situacioneconomica" name="situacioneconomica" class="form-control" required value="{{old('situacioneconomica')}}">
                    <option value="">Elegir</option>
                    <option value="muybuena">Muy Buena</option>
                    <option value="buena">Buena</option>
                    <option value="regular">Regular</option>
                    <option value="mala">Mala</option>
                </select>
                <div class="valid-feedback"></div>
            </div>

            <!-- Vivienda -->
            <h2 class="col-12 mt-3">V. Vivienda:</h2>

            <div class="col-6 mt-3">
                <label for="casavives">La casa en la que vives es:</label>
                <select type="text" id="casavives" name="casavives" class="form-control" required value="{{old('casavives')}}">
                    <option value="">Elegir</option>
                    <option value="propia">Propia</option>
                    <option value="alquilada">Alquilada</option>
                    <option value="amortizada">Amortizada</option>
                    <option value="prestada">Prestada</option>
                </select>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-12 mt-3">
            </div>

            <div class="col-6 mt-3">
                <label style="font-weight: bold" for="casavives">En su casa hay:</label>
                <input type="checkbox" name="computadora" value="1"> Computadora
                </label>
                <label>
                    <input type="checkbox" name="tablet" value="1"> Tablet
                </label>
                <label>
                    <input type="checkbox" name="celular" value="1"> Celular
                </label>
                <label>
                    <input type="checkbox" name="internet" value="1"> Internet
                </label>
                <label>
                    <input type="checkbox" name="otroscasa" value="1"> otros
                </label>
                <div class="valid-feedback"></div>
            </div>
            <!-- Estado de salud -->
            <h2 class="col-12 mt-3">VI. Estado de Salud:</h2>

            <div class="col-6 mt-3">
                <label for="talla">Talla:</label>
                <input type="text" id="talla" name="talla" class="form-control" required value="{{old('talla')}}" placeholder="Ingrese la talla"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="peso">Peso:</label>
                <input type="text" id="peso" name="peso" class="form-control" required value="{{old('peso')}}" placeholder="Ingrese el peso"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="hatenido">Ha tenido algun problema de salud?:</label>
                <input type="text" id="hatenido" name="hatenido" class="form-control" required value="{{old('hatenido')}}" placeholder="Dolores,molestias, alergias, enfermedades, etc..."></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="tiene">Tiene algun problema de salud:</label>
                <input type="text" id="tiene" name="tiene" class="form-control" required value="{{old('tiene')}}" placeholder="Especifique cuales"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="ver">Tiene dificultades para ver?:</label>
                <select type="text" id="ver" name="ver" class="form-control" required value="{{old('ver')}}">
                    <option value="">Elegir</option>
                    <option value="versi">Si</option>
                    <option value="verno">No</option>
                </select>
            </div>
            <div class="col-6 mt-3"> 
                <label for="verespecifique">Especifique:</label>
                <input type="text" id="verespecifique" name="verespecifique" class="form-control" required value="{{old('verespecifique')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>
            <div class="col-6 mt-3">
                <label for="verespecifique">Corregida:</label>
                <select type="text" id="verespecifique" name="verespecifique" class="form-control" required value="{{old('verespecifique')}}">
                    <option value="">Elegir</option>
                    <option value="sivercorregida">Si</option>
                    <option value="novercorregida">No</option>
                </select>
            </div>

            <div class="col-6 mt-3">
                <label for="escuchar">Tiene dificultades para escuchar?:</label>
                <select type="text" id="escuchar" name="escuchar" class="form-control" required value="{{old('escuchar')}}">
                    <option value="">Elegir</option>
                    <option value="escucharsi">Si</option>
                    <option value="escucharno">No</option>
                </select>
            </div>
            <div class="col-6 mt-3">
                <label for="escucharespecifique">Especifique:</label>
                <input type="text" id="escucharespecifique" name="escucharespecifique" class="form-control" required value="{{old('escucharespecifique')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>
            <div class="col-6 mt-3">
                <label for="escucharcorregida">Corregida:</label>
                <select type="text" id="escucharcorregida" name="escucharcorregida" class="form-control" required value="{{old('escucharcorregida')}}">
                    <option value="">Elegir</option>
                    <option value="sivercorregida">Si</option>
                    <option value="novercorregida">No</option>
                </select>
            </div>

            <div class="col-6 mt-3">
                <label for="estadodentadura">Estado de su dentadura:</label>
                <select type="text" id="estadodentadura" name="estadodentadura" class="form-control" required value="{{old('estadodentadura')}}">
                    <option value="">Elegir</option>
                    <option value="dentadurabuena">Buena</option>
                    <option value="dentaduramala">Mala</option>
                    <option value="dentaduraregular">Regular</option>
                </select>
            </div>

            <div class="col-6 mt-3">
                <label for="recibidovacuna">Ha recibido vacuna en el tiempo que le corresponde?</label>
                <select type="text" id="recibidovacuna" name="recibidovacuna" class="form-control" required value="{{old('recibidovacuna')}}">
                    <option value="">Elegir</option>
                    <option value="vacunasi">Si</option>
                    <option value="vacunano">No</option>
                </select>
            </div>

            <div class="col-12 mt-3">
            </div>

            <div class="col-3 mt-3">
                <a class="btn btn-success" href="{{ route('escolartres.create') }}">siguiente</a>
            </div>
        </form>
    </div>
</div>
@endSection