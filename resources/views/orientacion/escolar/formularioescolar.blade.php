@extends('layout.panel')

@section('content')


    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar</h1>
            </div>
            <div class="col text-right">
            <a href="{{route('escolar.index')}}" class="btn btn-lg btn-success">
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
        <!-- Datos personales -->
    <form class="group-form row g-3 mt-3" action="{{route('escolar.index')}}" method="POST">
        @csrf
        <h2 class="col-12 mt-3">I. Datos Personales:</h2>

        <div class="form-section col-2 mt-3">
            <label for="primerapellido">Primer Apellido:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="primerapellido" name="primerapellido" class="form-control" required value="{{old('primerapellido')}}"
            placeholder="Ingrese el primer apellido"></input>
            <div class="valid-feedback"></div>
        </div>
        
        <div class="form-section col-2 mt-3">
            <label for="segundoapellido">Segundo Apellido:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="segundoapellido" name="segundoapellido" class="form-control" required value="{{old('segundoapellido')}}"
            placeholder="Ingrese el segundo apellido"></input>
            <div class="valid-feedback"></div>
        </div>
        <div class="form-section col-2 mt-3">
            <label for="primernombre">Primer Nombre:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="primernombre" name="primernombre" class="form-control" required value="{{old('primernombre')}}"
            placeholder="Ingrese el primer nombre"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="segundonombre">Segundo Nombre:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="segundonombre" name="segundonombre" class="form-control" required value="{{old('segundonombre')}}"
            placeholder="Ingrese el segundo nombre"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="numerodeidentidad">Número de Identidad:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="identidad" name="numerodeidentidad" class="form-control" required value="{{old('numerodeidentidad')}}"
            placeholder="Ingrese el número de identidad"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="grado">Grado:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="grado" name="grado" class="form-control" required value="{{old('grado')}}"
            placeholder="Ingrese el grado"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="numerodecelular">Numero de Celular:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="numerodecelular" name="numerodecelular" class="form-control" required value="{{old('numerodecelular')}}"
            placeholder="Ingrese el lugar de trabajo"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="lugardenacimiento">Lugar de Nacimiento:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="lugardenacimiento" name="lugardenacimiento" class="form-control" required value="{{old('lugardenacimiento')}}"
            placeholder="Ingrese el lugar de nacimiento"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="fechadenacimiento">Fecha de Nacimiento:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="fechadenacimiento" name="fechadenacimiento" class="form-control" required value="{{old('fechadenacimiento')}}"
            placeholder="Ingrese el télefono de oficina"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="edad">Edad:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="edad" name="edad" class="form-control" required value="{{old('edad')}}"
            placeholder="Ingrese la edad"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="procedencia">Escuela o Colegio de Procedencia:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="procedencia" name="procedencia" class="form-control" required value="{{old('procedencia')}}"
            placeholder="Ingrese el nombre del colegio o escuela"></input>
            <div class="valid-feedback"></div>
        </div>

        <!-- direccion de domicilio -->
        <h2 class="col-12 mt-3">II. Direccion del Domicilio:</h2>
        <div class="form-section col-2 mt-3">
            <label for="tiempolectivo">En Tiempo Lectivo:</label>
        </div>
        <div class="col-6 mt-3">
            <input type="text" id="tiempolectivo" name="tiempolectivo" class="form-control" required value="{{old('tiempolectivo')}}"
            placeholder="Ingrese el primer apellido"></input>
            <div class="valid-feedback"></div>
        </div>
        
        <div class="form-section col-1 mt-3">
            <label for="telelectivo">Telefono Fijo:</label>
        </div>
        <div class="col-3 mt-3">
            <input type="text" id="telelectivo" name="telelectivo" class="form-control" required value="{{old('telelectivo')}}"
            placeholder="Ingrese el segundo apellido"></input>
            <div class="valid-feedback"></div>
        </div>
        <div class="form-section col-2 mt-3">
            <label for="noelectivo">En Tiempo No Electivo:</label>
        </div>
        <div class="col-6 mt-3">
            <input type="text" id="noelectivo" name="noelectivo" class="form-control" required value="{{old('noelectivo')}}"
            placeholder="Ingrese el primer nombre"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-1 mt-3">
            <label for="telnoelectivo">Telefono Fijo:</label>
        </div>
        <div class="col-3 mt-3">
            <input type="text" id="telnoelectivo" name="telnoelectivo" class="form-control" required value="{{old('telnoelectivo')}}"
            placeholder="Ingrese el segundo nombre"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="observaciones">Observaciones:</label>
        </div>
        <div class="col-10 mt-3">
            <input type="text" id="observaciones" name="observaciones" class="form-control" required value="{{old('observaciones')}}"
            placeholder="Ingrese la edad"></input>
            <div class="valid-feedback"></div>
        </div>

        <!-- datos familiares -->
        <h2 class="col-12 mt-3">III. Datos Familiares:</h2>

        <!-- padre -->
        <div class="form-section col-2 mt-3">
            <label style="font-weight: bold" for="nombrepadre">Nombre del Padre:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="nombrepadre" name="nombrepadre" class="form-control" required value="{{old('nombrepadre')}}"
            placeholder="Ingrese nombre completo"></input>
            <div class="valid-feedback"></div>
        </div>
        
        <div class="form-section col-2 mt-3">
            <label for="nidentidadpadre">Numero de Identidad:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="nidentidadpadre" name="nidentidadpadre" class="form-control" required value="{{old('nidentidadpadre')}}"
            placeholder="Ingrese el numero de identidad"></input>
            <div class="valid-feedback"></div>
        </div>
        <div class="form-section col-2 mt-3">
            <label for="fechanacimientopadre">Fecha de Nacimiento:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="fechanacimientopadre" name="fechanacimientopadre" class="form-control" required value="{{old('fechanacimientopadre')}}"
            placeholder="Ingrese la fecha"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="edadpadre">Edad Cumplida:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="edadpadre" name="edadpadre" class="form-control" required value="{{old('edadpadre')}}"
            placeholder="Ingrese la edad"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="ncelularpadre">Numero de Celular:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="ncelularpadre" name="ncelularpadre" class="form-control" required value="{{old('ncelularpadre')}}"
            placeholder="Ingrese el numero de celular"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="nestudiopadre">Nivel de estudio:</label>
        </div>
        <div class="col-4 mt-3">
            <select type="text" id="nestudiopadre" name="nestudiopadre" class="form-control" required value="{{old('nestudiopadre')}}">
            <option value="">Elegir</option>
            <option value="Primaria">Primaria</option>
            <option value="Media">Media</option>
            <option value="Superior">Superior</option>
         </select>
         <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="profesionpadre">Profesion:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="profesionpadre" name="profesionpadre" class="form-control" required value="{{old('profesionpadre')}}"
            placeholder="Ingrese la profesion"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="ocupacionpadre">Ocupacion Actual:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="ocupacionpadre" name="ocupacionpadre" class="form-control" required value="{{old('ocupacionpadre')}}"
            placeholder="Ingrese la ocupacion"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="telefonnotrabajopadre">Telefono del Trabajo:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="telefonnotrabajopadre" name="telefonnotrabajopadre" class="form-control" required value="{{old('telefonnotrabajopadre')}}"
            placeholder="Ingrese el telefono de trabajo"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-12 mt-3">
        </div>

        <!-- madre -->
        <div class="form-section col-2 mt-3">
            <label style="font-weight: bold" for="nombremadre">Nombre de la Madre:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="nombremadre" name="nombremadre" class="form-control" required value="{{old('nombremadre')}}"
            placeholder="Ingrese nombre completo"></input>
            <div class="valid-feedback"></div>
        </div>
        
        <div class="form-section col-2 mt-3">
            <label for="nidentidadmadre">Numero de Identidad:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="nidentidadmadre" name="nidentidadmadre" class="form-control" required value="{{old('nidentidadmadre')}}"
            placeholder="Ingrese el numero de identidad"></input>
            <div class="valid-feedback"></div>
        </div>
        <div class="form-section col-2 mt-3">
            <label for="fechanacimientomadre">Fecha de Nacimiento:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="fechanacimientomadre" name="fechanacimientomadre" class="form-control" required value="{{old('fechanacimientomadre')}}"
            placeholder="Ingrese la fecha"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="edadmadre">Edad Cumplida:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="edadmadre" name="edadmadre" class="form-control" required value="{{old('edadmadre')}}"
            placeholder="Ingrese la edad"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="ncelularmadre">Numero de Celular:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="ncelularmadre" name="ncelularmadre" class="form-control" required value="{{old('ncelularmadre')}}"
            placeholder="Ingrese el numero de celular"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="nestudiomadre">Nivel de estudio:</label>
        </div>
        <div class="col-4 mt-3">
            <select type="text" id="nestudiomadre" name="nestudiomadre" class="form-control" required value="{{old('nestudiomadre')}}">
            <option value="">Elegir</option>
            <option value="Primaria">Primaria</option>
            <option value="Media">Media</option>
            <option value="Superior">Superior</option>
         </select>
         <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="profesionmadre">Profesion:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="profesionmadre" name="profesionmadre" class="form-control" required value="{{old('profesionmadre')}}"
            placeholder="Ingrese la profesion"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="ocupacionmadre">Ocupacion Actual:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="ocupacionmadre" name="ocupacionmadre" class="form-control" required value="{{old('ocupacionmadre')}}"
            placeholder="Ingrese la ocupacion"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="telefonnotrabajomadre">Telefono del Trabajo:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="telefonnotrabajomadre" name="telefonnotrabajomadre" class="form-control" required value="{{old('telefonnotrabajomadre')}}"
            placeholder="Ingrese el telefono de trabajo"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-12 mt-3">
        </div>

        <!-- encargado -->
        <div class="form-section col-12 mt-3">
        <label style="font-weight: bold" for="vivescon">Llenar solo en caso de vivir con un encargado:</label>
        </div>

        <div class="form-section col-2 mt-3">
            <label style="font-weight: bold" for="nombreencargado">Nombre del Encargado(a):</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="nombreencargado" name="nombreencargado" class="form-control" required value="{{old('nombreencargado')}}"
            placeholder="Ingrese nombre completo"></input>
            <div class="valid-feedback"></div>
        </div>
        
        <div class="form-section col-2 mt-3">
            <label for="nidentidadencargado">Numero de Identidad:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="nidentidadencargado" name="nidentidadencargado" class="form-control" required value="{{old('nidentidadencargado')}}"
            placeholder="Ingrese el numero de identidad"></input>
            <div class="valid-feedback"></div>
        </div>
        <div class="form-section col-2 mt-3">
            <label for="fechanacimientoencargado">Fecha de Nacimiento:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="fechanacimientoencargado" name="fechanacimientoencargado" class="form-control" required value="{{old('fechanacimientoencargado')}}"
            placeholder="Ingrese la fecha"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="edadencargado">Edad Cumplida:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="edadencargado" name="edadencargado" class="form-control" required value="{{old('edadencargado')}}"
            placeholder="Ingrese la edad"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="ncelularencargado">Numero de Celular:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="ncelularencargado" name="ncelularencargado" class="form-control" required value="{{old('ncelularencargado')}}"
            placeholder="Ingrese el numero de celular"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="nestudioencargado">Nivel de estudio:</label>
        </div>
        <div class="col-4 mt-3">
            <select type="text" id="nestudioencargado" name="nestudioencargado" class="form-control" required value="{{old('nestudioencargado')}}">
            <option value="">Elegir</option>
            <option value="Primaria">Primaria</option>
            <option value="Media">Media</option>
            <option value="Superior">Superior</option>
         </select>
         <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="profesionencargado">Profesion:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="profesionencargado" name="profesionencargado" class="form-control" required value="{{old('profesionencargado')}}"
            placeholder="Ingrese la profesion"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="ocupacionencargado">Ocupacion Actual:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="ocupacionencargado" name="ocupacionencargado" class="form-control" required value="{{old('ocupacionencargado')}}"
            placeholder="Ingrese la ocupacion"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="telefonnotrabajoencargado">Telefono del Trabajo:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="telefonnotrabajoencargado" name="telefonnotrabajoencargado" class="form-control" required value="{{old('telefonnotrabajoencargado')}}"
            placeholder="Ingrese el telefono de trabajo"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-12 mt-3">
        </div>

        <!-- otros datos -->

        <div class="form-section col-2 mt-3">
            <label style="font-weight: bold" for="vivescon">Vives con:</label>
        </div>
        <div class="col-4 mt-3">
            <select type="text" id="vivescon" name="vivescon" class="form-control" required value="{{old('vivescon')}}">
            <option value="">Elegir</option>
            <option value="ambospadres">Ambos Padres</option>
            <option value="solomadre">Solo con la Madre</option>
            <option value="solopadre">Solo con el padre</option>
            <option value="otros">Otros</option>
         </select>
         <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="especifique">Especifique con quien vive:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="especifique" name="especifique" class="form-control" required value="{{old('especifique')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="motivo">Motivo:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="motivo" name="motivo" class="form-control" required value="{{old('motivo')}}"
            placeholder="Ingrese el motivo"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-12 mt-3">
        </div>

        <div class="form-section col-2 mt-3">
        <label style="font-weight: bold" for="vivescon">Numero de Hermanos:</label>
        </div>

        <div class="form-section col-1 mt-3">
            <label for="nmujeres">Mujeres:</label>
        </div>
        <div class="col-1 mt-3">
            <input type="text" id="nmujeres" name="nmujeres" class="form-control" required value="{{old('nmujeres')}}"
            placeholder="#"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-1 mt-3">
            <label for="nhombres">Hombres:</label>
        </div>
        <div class="col-1 mt-3">
            <input type="text" id="nhombres" name="nhombres" class="form-control" required value="{{old('nhombres')}}"
            placeholder="#"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="lugarocupado">Lugar que ocupa entre ellos:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="lugarocupado" name="lugarocupado" class="form-control" required value="{{old('lugarocupado')}}"
            placeholder="Ingrese el lugar que ocupa"></input>
            <div class="valid-feedback"></div>
        </div>

        <label class="col-6 mt-3">
            <input type="checkbox" name="checkpadrastro" value="1"> Tiene Padrastro?
        </label>
        <label class="col-6 mt-3">
            <input type="checkbox" name="checkmadrastra" value="1"> Tiene Madrastra?
        </label>

        <div class="form-section col-2 mt-3">
            <label for="otrapersona">Otra Persona que Vive en el Hogar:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="otrapersona" name="otrapersona" class="form-control" required value="{{old('otrapersona')}}"
            placeholder="Ingrese quien es"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-12 mt-3">
        </div>

        <!-- Situacion economica -->
        <h2 class="col-12 mt-3">IV. Situacion Economica:</h2>

        <div class="form-section col-4 mt-3">
            <label for="situacioneconomica">Su situacion economica la considera:</label>
        </div>
        <div class="col-3 mt-3">
            <select type="text" id="situacioneconomica" name="situacioneconomica" class="form-control" required value="{{old('situacioneconomica')}}">
            <option value="">Elegir</option>
            <option value="muybuena">Muy Buena</option>
            <option value="buena">Buena</option>
            <option value="regular">Regular</option>
            <option value="mala">Mala</option>
         </select>
         <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-12 mt-3">
        </div>

        <!-- Vivienda -->
        <h2 class="col-12 mt-3">V. Vivienda:</h2>

        <div class="form-section col-3 mt-3">
            <label for="casavives">La casa en la que vives es:</label>
        </div>
        <div class="col-3 mt-3">
            <select type="text" id="casavives" name="casavives" class="form-control" required value="{{old('casavives')}}">
            <option value="">Elegir</option>
            <option value="propia">Propia</option>
            <option value="alquilada">Alquilada</option>
            <option value="amortizada">Amortizada</option>
            <option value="prestada">Prestada</option>
         </select>
         <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-12 mt-3">
        </div>

        <div class="form-section col-2 mt-3">
            <label style="font-weight: bold" for="casavives">En su casa hay:</label>
        </div>
        <label class="col-2 mt-3">
            <input type="checkbox" name="computadora" value="1"> Computadora
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="tablet" value="1"> Tablet
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="celular" value="1"> Celular
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="internet" value="1"> Internet
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="otroscasa" value="1"> otros
        </label>
         <div class="valid-feedback"></div>
        
         <div class="form-section col-12 mt-3">
        </div>

        <!-- Estado de salud -->
        <h2 class="col-12 mt-3">VI. Estado de Salud:</h2>

        <div class="form-section col-2 mt-3">
            <label for="talla">Talla:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="talla" name="talla" class="form-control" required value="{{old('talla')}}"
            placeholder="Ingrese la talla"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="peso">Peso:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="peso" name="peso" class="form-control" required value="{{old('peso')}}"
            placeholder="Ingrese el peso"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="hatenido">Ha tenido algun problema de salud?:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="hatenido" name="hatenido" class="form-control" required value="{{old('hatenido')}}"
            placeholder="Dolores,molestias, alergias, enfermedades, etc..."></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="tiene">Tiene algun problema de salud:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="tiene" name="tiene" class="form-control" required value="{{old('tiene')}}"
            placeholder="Especifique cuales"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-2 mt-3">
            <label for="ver">Tiene dificultades para ver?:</label>
        </div>
        <div class="col-2 mt-3">
            <select type="text" id="ver" name="ver" class="form-control" required value="{{old('ver')}}">
            <option value="">Elegir</option>
            <option value="versi">Si</option>
            <option value="verno">No</option>
         </select>
        </div>
        <div class="form-section col-2 mt-3">
            <label for="verespecifique">Especifique:</label>
        </div>
        <div class="col-3 mt-3">
            <input type="text" id="verespecifique" name="verespecifique" class="form-control" required value="{{old('verespecifique')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>
        <div class="form-section col-1 mt-3">
            <label for="verespecifique">Corregida:</label>
        </div>
        <div class="col-2 mt-3">
            <select type="text" id="verespecifique" name="verespecifique" class="form-control" required value="{{old('verespecifique')}}">
            <option value="">Elegir</option>
            <option value="sivercorregida">Si</option>
            <option value="novercorregida">No</option>
         </select>
        </div>


        <div class="form-section col-2 mt-3">
            <label for="escuchar">Tiene dificultades para escuchar?:</label>
        </div>
        <div class="col-2 mt-3">
            <select type="text" id="escuchar" name="escuchar" class="form-control" required value="{{old('escuchar')}}">
            <option value="">Elegir</option>
            <option value="escucharsi">Si</option>
            <option value="escucharno">No</option>
         </select>
        </div>
        <div class="form-section col-2 mt-3">
            <label for="escucharespecifique">Especifique:</label>
        </div>
        <div class="col-3 mt-3">
            <input type="text" id="escucharespecifique" name="escucharespecifique" class="form-control" required value="{{old('escucharespecifique')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>
        <div class="form-section col-1 mt-3">
            <label for="escucharcorregida">Corregida:</label>
        </div>
        <div class="col-2 mt-3">
            <select type="text" id="escucharcorregida" name="escucharcorregida" class="form-control" required value="{{old('escucharcorregida')}}">
            <option value="">Elegir</option>
            <option value="sivercorregida">Si</option>
            <option value="novercorregida">No</option>
         </select>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="estadodentadura">Estado de su dentadura:</label>
        </div>
        <div class="col-2 mt-3">
            <select type="text" id="estadodentadura" name="estadodentadura" class="form-control" required value="{{old('estadodentadura')}}">
            <option value="">Elegir</option>
            <option value="dentadurabuena">Buena</option>
            <option value="dentaduramala">Mala</option>
            <option value="dentaduraregular">Regular</option>
         </select>
        </div>

        <div class="form-section col-5 mt-3">
            <label for="recibidovacuna">Ha recibido vacuna en el tiempo que le corresponde?</label>
        </div>
        <div class="col-2 mt-3">
            <select type="text" id="recibidovacuna" name="recibidovacuna" class="form-control" required value="{{old('recibidovacuna')}}">
            <option value="">Elegir</option>
            <option value="vacunasi">Si</option>
            <option value="vacunano">No</option>
         </select>
        </div>

        <div class="form-section col-12 mt-3">
        </div>

        <!-- Actividades  -->
        <h2 class="col-12 mt-3">VII. Actividades en que le Gustaria Participar:</h2>
        <label class="col-2 mt-3">
            <input type="checkbox" name="abanda" value="1"> Banda de Gerra
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="afutbol" value="1"> Futbol
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="apingpong" value="1"> Ping Pong
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="anumeros" value="1"> Trabajo con Numeros
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="alectura" value="1"> Lectura
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="acoro" value="1"> Coro
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="abasket" value="1"> Basketball
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="atennis" value="1"> Tennis
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="amanuales" value="1"> Trabajos Manuales
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="aoratoria" value="1"> Oratoria
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="avolley" value="1"> Volleyball
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="aatletismo" value="1"> Atletismo
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="adomestico" value="1"> Trabajo Domestico
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="aanimales" value="1"> Cuidar Animales
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="adibujo" value="1"> Dibujo y Pintura
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="afiestas" value="1"> Fiestas y Reuniones Sociales
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="acientificos" value="1"> Estudios Cientificos
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="aenfermos" value="1"> Cuidar Enfermos
        </label>
        <label class="col-2 mt-3">
            <input type="checkbox" name="aotros" value="1"> Otros
        </label>

         <div class="valid-feedback"></div>
        
         <div class="form-section col-12 mt-3">
        </div>

        <div class="form-section col-3 mt-3">
            <label for="trabajar">Le gustaria trabajar:</label>
        </div>
        <div class="col-3 mt-3">
            <select type="text" id="trabajar" name="trabajar" class="form-control" required value="{{old('trabajar')}}">
            <option value="">Elegir</option>
            <option value="solo">Solo</option>
            <option value="grupos">En Grupos</option>
         </select>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="namigos">Sus amigos son:</label>
        </div>
        <div class="col-3 mt-3">
            <select type="text" id="namigos" name="namigos" class="form-control" required value="{{old('namigos')}}">
            <option value="">Elegir</option>
            <option value="pocos">Pocos</option>
            <option value="muchos">Muchos</option>
         </select>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="edadamigos">Son sus amigos:</label>
        </div>
        <div class="col-3 mt-3">
            <select type="text" id="edadamigos" name="edadamigos" class="form-control" required value="{{old('edadamigos')}}">
            <option value="">Elegir</option>
            <option value="mayores">Mayores que usted</option>
            <option value="jovenes">Mas jovenes</option>
            <option value="misma">De la misma edad</option>
         </select>
        </div>

        <div class="form-section col-12 mt-3">
            <label for="pasatiempos">Cuales son sus diversiones o pasatiempos favoritos?</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="pasatiempos1" name="pasatiempos1" class="form-control" required value="{{old('pasatiempos1')}}"
            placeholder="Primero"></input>
            <div class="valid-feedback"></div>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="pasatiempos2" name="pasatiempos2" class="form-control" required value="{{old('pasatiempos2')}}"
            placeholder="Segundo"></input>
            <div class="valid-feedback"></div>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="pasatiempos3" name="pasatiempos3" class="form-control" required value="{{old('pasatiempos3')}}"
            placeholder="Tercero"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-12 mt-3">
        </div>

        <!-- Rendimiento  -->
        <h2 class="col-12 mt-3">VIII. Rendimiento Escolar:</h2>

        <div class="form-section col-12 mt-3">
            <label for="estudios">En cuantas escuelas primarias realizo sus estudios?</label>
        </div>
        <div class="col-12 mt-3">
            <input type="text" id="estudios" name="estudios" class="form-control" required value="{{old('estudios')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="repetido">Grados que ha repetido:</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="repetido" name="repetido" class="form-control" required value="{{old('repetido')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="claseestudiante">Que clase de estudiante fue en la escuela?</label>
        </div>
        <div class="col-3 mt-3">
            <select type="text" id="claseestudiante" name="claseestudiante" class="form-control" required value="{{old('claseestudiante')}}">
            <option value="">Elegir</option>
            <option value="cexelente">Exelente</option>
            <option value="cmuybueno">Muy bueno</option>
            <option value="cbueno">Bueno</option>
            <option value="cregular">Regular</option>
            <option value="cdeficiente">Deficiente</option>
         </select>
        </div>

        <div class="form-section col-12 mt-3">
        </div>
        
        <div class="form-section col-3 mt-3">
            <label for="agrado">Que materia le agrado mas?</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="agrado" name="agrado" class="form-control" required value="{{old('agrado')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="agradomenos">Que materia le agrado menos?</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="agradomenos" name="agradomenos" class="form-control" required value="{{old('agradomenos')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="considera">Como estudiante se considera:</label>
        </div>
        <div class="col-3 mt-3">
            <select type="text" id="considera" name="considera" class="form-control" required value="{{old('considera')}}">
            <option value="">Elegir</option>
            <option value="eexelente">Exelente</option>
            <option value="emuybueno">Muy bueno</option>
            <option value="ebueno">Bueno</option>
            <option value="eregular">Regular</option>
            <option value="edeficiente">Deficiente</option>
            <option value="eMalo">Malo</option>
         </select>
        </div>

        <div class="form-section col-12 mt-3">
        </div>

        <div class="form-section col-3 mt-3">
            <label for="horasextra">Cuantas horas extras escolares le dedica al estudio?</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="horasextra" name="horasextra" class="form-control" required value="{{old('horasextra')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="tiempolibre">En que emplea su tiempo libre?</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="tiempolibre" name="tiempolibre" class="form-control" required value="{{old('tiempolibre')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="rendimiento">Que hace usted para mejorar su rendimiento academico?</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="rendimiento" name="rendimiento" class="form-control" required value="{{old('rendimiento')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="ayudarsele">En que forma podria ayudarsele?</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="ayudarsele" name="ayudarsele" class="form-control" required value="{{old('ayudarsele')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <!-- Rendimiento extra  -->
        <h2 class="col-12 mt-3">Uso solamente para alumnos provenientes de otro instituto</h2>

        <div class="form-section col-3 mt-3">
            <label for="cursosrepetidos">Cursos que ha repetido:</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="cursosrepetidos" name="cursosrepetidos" class="form-control" required value="{{old('cursosrepetidos')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="materiasreprobadas">Materias que ha reprobado:</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="materiasreprobadas" name="materiasreprobadas" class="form-control" required value="{{old('materiasreprobadas')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="materiasagradan">Que materia le agrada mas?</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="materiasagradan" name="materiasagradan" class="form-control" required value="{{old('materiasagradan')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="atribuyeagrado">A que atribuye usted ese agrado?</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="atribuyeagrado" name="atribuyeagrado" class="form-control" required value="{{old('atribuyeagrado')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="agradanmenos">Que materias le agradan menos?</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="agradanmenos" name="agradanmenos" class="form-control" required value="{{old('agradanmenos')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="materiasdificultad">En que materias tiene mas dificultades?</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="materiasdificultad" name="materiasdificultad" class="form-control" required value="{{old('materiasdificultad')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="culturageneral">Que carreras desea seguir despues del Ciclo comun de Cultura General?</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="culturageneral" name="culturageneral" class="form-control" required value="{{old('culturageneral')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

        <div class="form-section col-3 mt-3">
            <label for="diversificado">Que carreras desea seguir despues del Ciclo Diversificado?</label>
        </div>
        <div class="col-9 mt-3">
            <input type="text" id="diversificado" name="diversificado" class="form-control" required value="{{old('diversificado')}}"
            placeholder="Especifique"></input>
            <div class="valid-feedback"></div>
        </div>

         <!-- Relaciones Interpersonales  -->
         <h2 class="col-12 mt-3">IX. Relaciones Interpersonales en la Familia</h2>
         
         <div class="form-section col-12 mt-3">
            <label >Respecto a su padre madre o persona que desempenie el papel de estos:</label>
        </div>


        <div class="form-section col-12 mt-3">
        </div>

        <div class="col text-left">
            <button type="button" class="previous btn btn-success float-left mt-3">Antes</button>
            <button type="button" class="next btn btn-success float-rigth mt-3">Despues</button>
            <button type="submit" class="btn btn-primary float-rigth mt-3">Guardar</button>
        </div>
     </form>
     <script>
        $(function(){
            var $section =$('.form-section');

            function navigateTo(index){
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index>0);
                var atTheEnd = index >= $section.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);
            }

            function curIndex()
            {
                return $section.index($section.filter('.current'));
            }

            $('.form-navigation .previous').click(function(){
                navigateTo(curIndex()-1);
            });

            $('.form-navigation .next').click(function(){
                $('.group-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function(){
                    navigateTo(curIndex()+1);
                });
            });

            $section.each(function(index,section){
                $(section).find(':input').attr('data-paresey-group','block'+index);
            });
            navigateTo(0);
        });

    </script>
    </div>

    
</div>
@endSection
