@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar Paso-2</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('escolar.edit', ['escolar' => $escolar->id])}}" class="btn btn-lg btn-success">
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

        <form class="row g-3 mt-3" action="{{route('escolar.updatedos', $alumnos->id) }}" method="POST">
            @csrf
            @method('PUT')

            <h2 class="col-12 mt-3">III. Datos Familiares:</h2>


            <!-- padre -->
            <h2 class="col-12 mt-3">Nombre del Padre: <?php
                                                        if (!empty($padres->primernombre) || !empty($padres->segundonombre) || !empty($padres->primerapellido) || !empty($padres->segundoapellido)) {
                                                            echo $padres->primernombre . " " . $padres->segundonombre . " " . $padres->primerapellido . " " . $padres->segundoapellido;
                                                        } else {
                                                            echo "No se encontraron datos del padre.";
                                                        }

                                                        ?></h2>

            <div class="col-6 mt-3">
                <label><b>Numero de Identidad:</b> {{$padres->numerodeidentidad}}</label>
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
                <label><b>Numero de Telefono:</b> {{$padres->telefonopersonal}}</label>
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
                <label><b>Telefono del Trabajo:</b> {{$padres->telefonooficina}}</label>
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

            <div class="col-12 mt-3">
            </div>


            <div class="col-3 mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-success" href="{{ route('escolar.edittres', ['escolar' => $escolar->id])  }}">siguiente</a>
            </div>
        </form>
    </div>
</div>
@endSection