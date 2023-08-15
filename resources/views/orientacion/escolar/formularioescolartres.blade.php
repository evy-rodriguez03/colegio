@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar Paso-3</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('escolar.editdos', ['escolar' => $escolar->id]) }}" class="btn btn-lg btn-success">
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

        <form class="row g-3 mt-3" action="{{route('escolar.updatetres', $alumnos->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h2 class="col-12 mt-3">IV. Situacion Economica:</h2>

            <div class="col-6 mt-3">
                <label for="situacioneconomica">Su situacion economica la considera:</label>
                <select type="text" id="situacioneconomica" name="situacioneconomica" class="form-control">
                    <option value="">Elegir</option>
                    <option @if(old('situacioneconomica')=='Muy Buena' || (isset($escolar->situacioneconomica)?$escolar->situacioneconomica:'') == 'Muy Buena')
                        selected
                        @else

                        @endif
                        value="Muy buena">Muy Buena</option>
                    <option @if(old('situacioneconomica')=='Buena' || (isset($escolar->situacioneconomica)?$escolar->situacioneconomica:'') == 'Buena')
                            selected
                            @else

                            @endif value="Buena">Buena</option>
                    <option @if(old('situacioneconomica')=='Regular' || (isset($escolar->situacioneconomica)?$escolar->situacioneconomica:'') == 'Regular')
                            selected
                            @else

                            @endif value="Regular">Regular</option>
                    <option @if(old('situacioneconomica')=='Mala' || (isset($escolar->situacioneconomica)?$escolar->situacioneconomica:'') == 'Mala')
                            selected
                            @else

                            @endif value="Mala">Mala</option>
                </select>
                <div class="valid-feedback"></div>
            </div>

            <!-- Vivienda -->
            <h2 class="col-12 mt-3">V. Vivienda:</h2>

            <div class="col-6 mt-3">
                <label for="casavives">La casa en la que vives es:</label>
                <select type="text" id="casavives" name="casavives" class="form-control">
                <option value="">Elegir</option>
                    <option @if(old('casavives')=='Propia' || (isset($escolar->casavives)?$escolar->casavives:'') == 'Propia')
                            selected
                            @else

                            @endif value="Propia">Propia</option>
                    <option @if(old('casavives')=='Alquilada' || (isset($escolar->casavives)?$escolar->casavives:'') == 'Alquilada')
                            selected
                            @else

                            @endif value="Alquilada">Alquilada</option>
                    <option @if(old('casavives')=='Amortizada' || (isset($escolar->casavives)?$escolar->casavives:'') == 'Amortizada')
                            selected
                            @else

                            @endif value="Amortizada">Amortizada</option>
                    <option @if(old('casavives')=='Prestada' || (isset($escolar->casavives)?$escolar->casavives:'') == 'Prestada')
                            selected
                            @else

                            @endif value="Prestada">Prestada</option>
                </select>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-12 mt-3">
            </div>

            <div class="col-6 mt-3">
                <label style="font-weight: bold" for="casahay">En su casa hay:</label>
                <input type="checkbox" name="computadora" value="1" @if(old('computadora')=='1' || (isset($escolar->computadora) ? $escolar->computadora : '') == '1')
                checked
                @endif
                > Computadora
                </label>
                <label>
                    <input type="checkbox" name="tablet" value="1" @if(old('tablet')=='1' || (isset($escolar->tablet) ? $escolar->tablet : '') == '1')
                    checked
                    @endif> Tablet
                </label>
                <label>
                    <input type="checkbox" name="celular" value="1" @if(old('celular')=='1' || (isset($escolar->celular) ? $escolar->celular : '') == '1')
                    checked
                    @endif> Celular
                </label>
                <label>
                    <input type="checkbox" name="internet" value="1" @if(old('internet')=='1' || (isset($escolar->internet) ? $escolar->internet : '') == '1')
                    checked
                    @endif> Internet
                </label>
                <label>
                    <input type="checkbox" name="otroscasa" value="1" @if(old('otroscasa')=='1' || (isset($escolar->otroscasa) ? $escolar->otroscasa : '') == '1')
                    checked
                    @endif> otros
                </label>
                <div class="valid-feedback"></div>
            </div>
            <!-- Estado de salud -->
            <h2 class="col-12 mt-3">VI. Estado de Salud:</h2>

            <div class="col-6 mt-3">
                <label for="talla">Talla:</label>
                <input type="text" id="talla" name="talla" class="form-control" value="{{old('talla', $escolar->talla)}}" placeholder="Ingrese la talla en cm"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="peso">Peso:</label>
                <input type="text" id="peso" name="peso" class="form-control" value="{{old('peso', $escolar->peso)}}" placeholder="Ingrese el peso en libras"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="hatenido">Ha tenido algun problema de salud?:</label>
                <input type="text" id="hatenido" name="hatenido" class="form-control" value="{{old('hatenido', $escolar->hatenido)}}" placeholder="Dolores,molestias, alergias, enfermedades, etc..."></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="tiene">Tiene algun problema de salud:</label>
                <input type="text" id="tiene" name="tiene" class="form-control" value="{{old('tiene', $escolar->tiene, $escolar->tiene)}}" placeholder="Especifique cuales"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="ver"><b>Tiene dificultades para ver?:</b></label>
                <select type="text" id="ver" name="ver" class="form-control">
                    <option value="">Elegir</option>
                    <option @if(old('ver')=='Si' || (isset($escolar->ver)?$escolar->ver:'') == 'Si')
                        selected
                        @else

                        @endif
                        value="Si">Si</option>
                    <option @if(old('ver')=='No' || (isset($escolar->ver)?$escolar->ver:'') == 'No')
                        selected
                        @else

                        @endif
                        value="No">No</option>
                </select>
            </div>
            <div class="col-6 mt-3">
                <label for="verespecifique">Especifique:</label>
                <input type="text" id="verespecifique" name="verespecifique" class="form-control" value="{{old('verespecifique', $escolar->verespecifique)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>
            <div class="col-6 mt-3">
                <label for="vercorregida">Corregida:</label>
                <select type="text" id="vercorregida" name="vercorregida" class="form-control">
                    <option value="">Elegir</option>
                    <option @if(old('vercorregida')=='Si' || (isset($escolar->vercorregida)?$escolar->vercorregida:'') == 'Si')
                            selected
                            @else

                            @endif value="Si">Si</option>
                    <option @if(old('vercorregida')=='No' || (isset($escolar->vercorregida)?$escolar->vercorregida:'') == 'No')
                            selected
                            @else

                            @endif value="No">No</option>
                </select>
            </div>
            <div class="col-12 mt-3">
            </div>

            <div class="col-6 mt-3">
                <label for="escuchar"><b>Tiene dificultades para escuchar?:</b></label>
                <select type="text" id="escuchar" name="escuchar" class="form-control">
                    <option value="">Elegir</option>
                    <option @if(old('escuchar')=='Si' || (isset($escolar->escuchar)?$escolar->escuchar:'') == 'Si')
                            selected
                            @else

                            @endif value="Si">Si</option>
                    <option @if(old('escuchar')=='No' || (isset($escolar->escuchar)?$escolar->escuchar:'') == 'No')
                            selected
                            @else

                            @endif value="No">No</option>
                </select>
            </div>
            <div class="col-6 mt-3">
                <label for="escucharespecifique">Especifique:</label>
                <input type="text" id="escucharespecifique" name="escucharespecifique" class="form-control" value="{{old('escucharespecifique', $escolar->escucharespecifique)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>
            <div class="col-6 mt-3">
                <label for="escucharcorregida">Corregida:</label>
                <select type="text" id="escucharcorregida" name="escucharcorregida" class="form-control">
                    <option value="">Elegir</option>
                    <option @if(old('escucharcorregida')=='Si' || (isset($escolar->escucharcorregida)?$escolar->escucharcorregida:'') == 'Si')
                            selected
                            @else

                            @endif value="Si">Si</option>
                    <option @if(old('escucharcorregida')=='No' || (isset($escolar->escucharcorregida)?$escolar->escucharcorregida:'') == 'No')
                            selected
                            @else

                            @endif value="No">No</option>
                </select>
            </div>
            <div class="col-12 mt-3">
            </div>

            <div class="col-6 mt-3">
                <label for="estadodentadura">Estado de su dentadura:</label>
                <select type="text" id="estadodentadura" name="estadodentadura" class="form-control">
                    <option value="">Elegir</option>
                    <option @if(old('estadodentadura')=='Buena' || (isset($escolar->estadodentadura)?$escolar->estadodentadura:'') == 'Buena')
                            selected
                            @else

                            @endif value="Buena">Buena</option>
                    <option @if(old('estadodentadura')=='Mala' || (isset($escolar->estadodentadura)?$escolar->estadodentadura:'') == 'Mala')
                            selected
                            @else

                            @endif value="Mala">Mala</option>
                    <option @if(old('estadodentadura')=='Regular' || (isset($escolar->estadodentadura)?$escolar->estadodentadura:'') == 'Regular')
                            selected
                            @else

                            @endif value="Regular">Regular</option>
                </select>
            </div>

            <div class="col-6 mt-3">
                <label for="recibidovacuna">Ha recibido vacuna en el tiempo que le corresponde?</label>
                <select type="text" id="recibidovacuna" name="recibidovacuna" class="form-control">
                    <option value="">Elegir</option>
                    <option @if(old('recibidovacuna')=='Si' || (isset($escolar->recibidovacuna)?$escolar->recibidovacuna:'') == 'Si')
                            selected
                            @else

                            @endif value="Si">Si</option>
                    <option @if(old('recibidovacuna')=='No' || (isset($escolar->recibidovacuna)?$escolar->recibidovacuna:'') == 'No')
                            selected
                            @else

                            @endif value="No">No</option>
                </select>
            </div>

            <div class="col-12 mt-3">
            </div>

            <div class="col-3 mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-success" href="{{route('escolar.editcuatro', ['escolar' => $escolar->id])  }}">siguiente</a>
            </div>
        </form>
    </div>
</div>
@endSection