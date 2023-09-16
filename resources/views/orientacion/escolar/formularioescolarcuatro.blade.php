@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Paso-4</h1>
            </div>
            <div class="col text-right">
                <a  href="{{route('escolar.edittres', ['escolar' => $escolar->id])}}" class="btn btn-lg btn-success">
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

        <form class="row g-3 mt-3" action="{{route('escolar.updatecuatro', $alumnos->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h2 class="col-12 mt-3">VII. Actividades en que le gustaría participar:</h2>

            <table class="table align-items-center table-flush">
                <tr class="thead-light">
                    <td><input type="checkbox" name="abanda" id="abanda" value="1" @if(old('abanda')=='1' || (isset($escolar->abanda) ? $escolar->abanda : '') == '1')
                        checked
                        @endif><label for="abanda"> Banda de Guerra</label></td>
                    <td><input type="checkbox" name="afutbol" id="afutbol" value="1" @if(old('afutbol')=='1' || (isset($escolar->afutbol) ? $escolar->afutbol : '') == '1')
                        checked
                        @endif><label for="afutbol"> Fútbol</label></td>
                    <td><input type="checkbox" name="apingpong" id="apingpong" value="1" @if(old('apingpong')=='1' || (isset($escolar->apingpong) ? $escolar->apingpong : '') == '1')
                        checked
                        @endif> <label for="apingpong">Ping Pong</label></td>
                    <td><input type="checkbox" name="anumeros" id="anumeros" value="1" @if(old('anumeros')=='1' || (isset($escolar->anumeros) ? $escolar->anumeros : '') == '1')
                        checked
                        @endif> <label for="anumeros"> Trabajo con Números</label></td>
                    <td><input type="checkbox" name="alectura" id="alectura" value="1" @if(old('alectura')=='1' || (isset($escolar->alectura) ? $escolar->alectura : '') == '1')
                        checked
                        @endif> <label for="alectura"> Lectura</label></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="acoro" id="acoro" value="1" @if(old('acoro')=='1' || (isset($escolar->acoro) ? $escolar->acoro : '') == '1')
                        checked
                        @endif><label for="acoro"> Coro</label></td>
                    <td><input type="checkbox" name="abasket" id="abasket" value="1" @if(old('abasket')=='1' || (isset($escolar->abasket) ? $escolar->abasket : '') == '1')
                        checked
                        @endif> <label for="abasket"> Basketball</label></td>
                    <td><input type="checkbox" name="atennis" id="atennis" value="1" @if(old('atennis')=='1' || (isset($escolar->atennis) ? $escolar->atennis : '') == '1')
                        checked
                        @endif> <label for="atennis"> Tennis</label></td>
                    <td><input type="checkbox" name="amanuales" id="amanuales" value="1" @if(old('amanuales')=='1' || (isset($escolar->amanuales) ? $escolar->amanuales : '') == '1')
                        checked
                        @endif> <label for="amanuales"> Trabajos Manuales</label></td>
                    <td><input type="checkbox" name="aoratoria" id="aoratoria" value="1" @if(old('aoratoria')=='1' || (isset($escolar->aoratoria) ? $escolar->aoratoria : '') == '1')
                        checked
                        @endif> <label for="aoratoria"> Oratoria</label></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="avolley" id="avolley" value="1" @if(old('avolley')=='1' || (isset($escolar->avolley) ? $escolar->avolley : '') == '1')
                        checked
                        @endif> <label for="avolley"> Volleyball</label></td>
                    <td><input type="checkbox" name="aatletismo" id="aatletismo" value="1" @if(old('aatletismo')=='1' || (isset($escolar->aatletismo) ? $escolar->aatletismo : '') == '1')
                        checked
                        @endif> <label for="aatletismo"> Atletismo</label></td>
                    <td><input type="checkbox" name="adomestico" id="adomestico" value="1" @if(old('adomestico')=='1' || (isset($escolar->adomestico) ? $escolar->adomestico : '') == '1')
                        checked
                        @endif> <label for="adomestico"> Trabajo Domestico</label></td>
                    <td><input type="checkbox" name="aanimales" id="aanimales" value="1" @if(old('aanimales')=='1' || (isset($escolar->aanimales) ? $escolar->aanimales : '') == '1')
                        checked
                        @endif> <label for="aanimales"> Cuidar Animales</label></td>
                    <td><input type="checkbox" name="adibujo" id="adibujo" value="1" @if(old('adibujo')=='1' || (isset($escolar->adibujo) ? $escolar->adibujo : '') == '1')
                        checked
                        @endif><label for="adibujo"> Dibujo y Pintura</label></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="afiestas" id="afiestas" value="1" @if(old('afiestas')=='1' || (isset($escolar->afiestas) ? $escolar->afiestas : '') == '1')
                        checked
                        @endif> <label for="afiestas"> Fiestas y Reuniones Sociales</label></td>
                    <td><input type="checkbox" name="acientificos" id="acientificos" value="1" @if(old('acientificos')=='1' || (isset($escolar->acientificos) ? $escolar->acientificos : '') == '1')
                        checked
                        @endif> <label for="acientificos"> Estudios Científicos</label></td>
                    <td><input type="checkbox" name="aenfermos" id="aenfermos" value="1" @if(old('aenfermos')=='1' || (isset($escolar->aenfermos) ? $escolar->aenfermos : '') == '1')
                        checked
                        @endif> <label for="aenfermos">Cuidar Enfermos</label></td>
                    <td><input type="checkbox" name="aotros" id="aotros" value="1" @if(old('aotros')=='1' || (isset($escolar->aotros) ? $escolar->aotros : '') == '1')
                        checked
                        @endif><label for="aotros"> Otros</label></td>
                    <td></td>
                </tr>

            </table>

            <div class="col-12 mt-3">
            </div>
            <div class="col-6 mt-3">
                <label for="trabajar">Le gustaría trabajar:</label>
                <select type="text" id="trabajar" name="trabajar" class="form-control">
                    <option value="">Elegir</option>
                    <option @if(old('trabajar')=='Solo' || (isset($escolar->trabajar)?$escolar->trabajar:'') == 'Solo')
                        selected
                        @else

                        @endif value="Solo">Solo</option>
                    <option @if(old('trabajar')=='En grupos' || (isset($escolar->trabajar)?$escolar->trabajar:'') == 'En grupos')
                        selected
                        @else

                        @endif value="En grupos">En grupos</option>
                </select>
            </div>

            <div class="col-6 mt-3">
                <label for="namigos">Sus amigos son:</label>
                <select type="text" id="namigos" name="namigos" class="form-control">
                    <option value="">Elegir</option>
                    <option @if(old('namigos')=='Pocos' || (isset($escolar->namigos)?$escolar->namigos:'') == 'Pocos')
                        selected
                        @else

                        @endif value="Pocos">Pocos</option>
                    <option @if(old('namigos')=='Muchos' || (isset($escolar->namigos)?$escolar->namigos:'') == 'Muchos')
                        selected
                        @else

                        @endif value="Muchos">Muchos</option>
                </select>
            </div>
            <div class="col-6 mt-3">
                <label for="pasatiempos">¿Cuales son sus diversiones o pasatiempos favoritos?</label>
                <input type="text" id="pasatiempos1" name="pasatiempos1" class="form-control mt-3" value="{{old('pasatiempos1', $escolar->pasatiempos1)}}" placeholder="Primero"></input>
                <div class="valid-feedback"></div>

                <input type="text" id="pasatiempos2" name="pasatiempos2" class="form-control mt-3" value="{{old('pasatiempos2', $escolar->pasatiempos2)}}" placeholder="Segundo"></input>
                <div class="valid-feedback"></div>

                <input type="text" id="pasatiempos3" name="pasatiempos3" class="form-control mt-3" value="{{old('pasatiempos3', $escolar->pasatiempos3)}}" placeholder="Tercero"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="col-6 mt-3">
                <label for="edadamigos">Son sus amigos:</label>
                <select type="text" id="edadamigos" name="edadamigos" class="form-control">
                    <option value="">Elegir</option>
                    <option @if(old('edadamigos')=='Mayores que usted' || (isset($escolar->edadamigos)?$escolar->edadamigos:'') == 'Mayores que usted')
                        selected
                        @else

                        @endif value="Mayores que usted">Mayores que usted</option>
                    <option @if(old('edadamigos')=='Mas jovenes' || (isset($escolar->edadamigos)?$escolar->edadamigos:'') == 'Mas jovenes')
                        selected
                        @else

                        @endif value="Mas jovenes">Mas jovenes</option>
                    <option @if(old('edadamigos')=='De la misma edad' || (isset($escolar->edadamigos)?$escolar->edadamigos:'') == 'De la misma edad')
                        selected
                        @else

                        @endif value="De la misma edad">De la misma edad</option>
                </select>
            </div>


            <div class="col-3 mt-3">
                <button type="submit" class="btn btn-primary" id="guardarButton">Guardar y seguir</button>
                <!-- <a class="btn btn-success" href="{{ route('escolar.editcinco', ['escolar' => $escolar->id]) }}">siguiente</a> -->
                <script>
                    document.getElementById("guardarButton").addEventListener("click", function() {
                        window.location.href = "{{ route('escolar.editcinco', ['escolar' => $escolar->id]) }}";
                    });
                </script>
            </div>
        </form>
    </div>
</div>
@endSection