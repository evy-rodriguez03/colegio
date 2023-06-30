@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar Paso-3</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('escolardos.create')}}" class="btn btn-lg btn-success">
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
            <a class="btn btn-success" href="{{ route('escolarcuatro.create') }}">siguiente</a>
            </div>
        </form>
    </div>
</div>
@endSection