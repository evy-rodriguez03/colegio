@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Paso-7</h1>
            </div>
            <div class="col text-right">
                <a  href="{{route('escolar.editseis', ['escolar' => $escolar->id])}}" class="btn btn-lg btn-success">
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

        <form class="row g-3 mt-3" action="{{route('escolar.updatesiete', $alumnos->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-12 mt-3">
                <label>A continuación se indican algunas manifestaciones y sentimientos que frecuentemente existen en las personas:</label>
            </div>
            <div class="col-12 mt-3">
                <table class="table align-items-center table-flush">
                    <tr class="thead-light">
                        <th></th>
                        <th>Frecuentemente</th>
                        <th>De vez en cuando</th>
                        <th>Casi nunca</th>
                    </tr>
                    <tr>
                        <td>Se siente triste</td>
                        <td><input type="radio" name="triste" id="ftriste" value="0" @if(old('triste')=='0' || (isset($escolar->triste)?$escolar->triste:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="triste" id="dtriste" value="1" @if(old('triste')=='1' || (isset($escolar->triste)?$escolar->triste:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="triste" id="ctriste" value="2" @if(old('triste')=='2' || (isset($escolar->triste)?$escolar->triste:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Llora con facilidad</td>
                        <td><input type="radio" name="llora" id="fllora" value="0" @if(old('llora')=='0' || (isset($escolar->llora)?$escolar->llora:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="llora" id="dllora" value="1" @if(old('llora')=='1' || (isset($escolar->llora)?$escolar->llora:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="llora" id="cllora" value="2" @if(old('llora')=='2' || (isset($escolar->llora)?$escolar->llora:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Se siente preocupado(a)</td>
                        <td><input type="radio" name="preocupado" id="fpreocupado" value="0" @if(old('preocupado')=='0' || (isset($escolar->preocupado)?$escolar->preocupado:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="preocupado" id="dpreocupado" value="1" @if(old('preocupado')=='1' || (isset($escolar->preocupado)?$escolar->preocupado:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="preocupado" id="cpreocupado" value="2" @if(old('preocupado')=='2' || (isset($escolar->preocupado)?$escolar->preocupado:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Se considera nervioso(a)</td>
                        <td><input type="radio" name="nervioso" id="fnervioso" value="0" @if(old('nervioso')=='0' || (isset($escolar->nervioso)?$escolar->nervioso:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="nervioso" id="dnervioso" value="1" @if(old('nervioso')=='1' || (isset($escolar->nervioso)?$escolar->nervioso:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="nervioso" id="cnervioso" value="2" @if(old('nervioso')=='2' || (isset($escolar->nervioso)?$escolar->nervioso:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Se siente solo(a)</td>
                        <td><input type="radio" name="solo" id="fsolo" value="0" @if(old('solo')=='0' || (isset($escolar->solo)?$escolar->solo:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="solo" id="dsolo" value="1" @if(old('solo')=='1' || (isset($escolar->solo)?$escolar->solo:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="solo" id="csolo" value="2" @if(old('solo')=='2' || (isset($escolar->solo)?$escolar->solo:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Se considera débil físicamente</td>
                        <td><input type="radio" name="debil" id="fdebil" value="0" @if(old('debil')=='0' || (isset($escolar->debil)?$escolar->debil:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="debil" id="ddebil" value="1" @if(old('debil')=='1' || (isset($escolar->debil)?$escolar->debil:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="debil" id="cdebil" value="2" @if(old('debil')=='2' || (isset($escolar->debil)?$escolar->debil:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es amistoso(a)</td>
                        <td><input type="radio" name="amistoso" id="famistoso" value="0" @if(old('amistoso')=='0' || (isset($escolar->amistoso)?$escolar->amistoso:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="amistoso" id="damistoso" value="1" @if(old('amistoso')=='1' || (isset($escolar->amistoso)?$escolar->amistoso:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="amistoso" id="camistoso" value="2" @if(old('amistoso')=='2' || (isset($escolar->amistoso)?$escolar->amistoso:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es cariñoso(a)</td>
                        <td><input type="radio" name="carinioso" id="fcarinioso" value="0" @if(old('carinioso')=='0' || (isset($escolar->carinioso)?$escolar->carinioso:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="carinioso" id="dcarinioso" value="1" @if(old('carinioso')=='1' || (isset($escolar->carinioso)?$escolar->carinioso:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="carinioso" id="ccarinioso" value="2" @if(old('carinioso')=='2' || (isset($escolar->carinioso)?$escolar->carinioso:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Se considera tímido(a)</td>
                        <td><input type="radio" name="timido" id="ftimido" value="0" @if(old('timido')=='0' || (isset($escolar->timido)?$escolar->timido:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="timido" id="dtimido" value="1" @if(old('timido')=='1' || (isset($escolar->timido)?$escolar->timido:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="timido" id="ctimido" value="2" @if(old('timido')=='2' || (isset($escolar->timido)?$escolar->timido:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es testarudo(a)</td>
                        <td><input type="radio" name="testarudo" id="ftestarudo" value="0" @if(old('testarudo')=='0' || (isset($escolar->testarudo)?$escolar->testarudo:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="testarudo" id="dtestarudo" value="1" @if(old('testarudo')=='1' || (isset($escolar->testarudo)?$escolar->testarudo:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="testarudo" id="ctestarudo" value="2" @if(old('testarudo')=='2' || (isset($escolar->testarudo)?$escolar->testarudo:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es tranquilo(a) pasivo(a)</td>
                        <td><input type="radio" name="tranquilo" id="ftranquilo" value="0" @if(old('tranquilo')=='0' || (isset($escolar->tranquilo)?$escolar->tranquilo:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="tranquilo" id="dtranquilo" value="1" @if(old('tranquilo')=='1' || (isset($escolar->tranquilo)?$escolar->tranquilo:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="tranquilo" id="ctranquilo" value="2" @if(old('tranquilo')=='2' || (isset($escolar->tranquilo)?$escolar->tranquilo:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es puntual</td>
                        <td><input type="radio" name="puntual" id="fpuntual" value="0" @if(old('puntual')=='0' || (isset($escolar->puntual)?$escolar->puntual:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="puntual" id="dpuntual" value="1" @if(old('puntual')=='1' || (isset($escolar->puntual)?$escolar->puntual:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="puntual" id="cpuntual" value="2" @if(old('puntual')=='2' || (isset($escolar->puntual)?$escolar->puntual:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es egoista</td>
                        <td><input type="radio" name="egoista" id="fegoista" value="0" @if(old('egoista')=='0' || (isset($escolar->egoista)?$escolar->egoista:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="egoista" id="degoista" value="1" @if(old('egoista')=='1' || (isset($escolar->egoista)?$escolar->egoista:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="egoista" id="cegoista" value="2" @if(old('egoista')=='2' || (isset($escolar->egoista)?$escolar->egoista:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es celoso(a)</td>
                        <td><input type="radio" name="celoso" id="fceloso" value="0" @if(old('celoso')=='0' || (isset($escolar->celoso)?$escolar->celoso:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="celoso" id="dceloso" value="1" @if(old('celoso')=='1' || (isset($escolar->celoso)?$escolar->celoso:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="celoso" id="cceloso" value="2" @if(old('celoso')=='2' || (isset($escolar->celoso)?$escolar->celoso:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es violento(a)</td>
                        <td><input type="radio" name="violento" id="fviolento" value="0" @if(old('violento')=='0' || (isset($escolar->violento)?$escolar->violento:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="violento" id="dviolento" value="1" @if(old('violento')=='1' || (isset($escolar->violento)?$escolar->violento:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="violento" id="cviolento" value="2" @if(old('violento')=='2' || (isset($escolar->violento)?$escolar->violento:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es agresivo(a)</td>
                        <td><input type="radio" name="agresivo" id="fagresivo" value="0" @if(old('agresivo')=='0' || (isset($escolar->agresivo)?$escolar->agresivo:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="agresivo" id="dagresivo" value="1" @if(old('agresivo')=='1' || (isset($escolar->agresivo)?$escolar->agresivo:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="agresivo" id="cagresivo" value="2" @if(old('agresivo')=='2' || (isset($escolar->agresivo)?$escolar->agresivo:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es comprensivo(a)</td>
                        <td><input type="radio" name="comprensivo" id="fcomprensivo" value="0" @if(old('comprensivo')=='0' || (isset($escolar->comprensivo)?$escolar->comprensivo:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="comprensivo" id="dcomprensivo" value="1" @if(old('comprensivo')=='1' || (isset($escolar->comprensivo)?$escolar->comprensivo:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="comprensivo" id="ccomprensivo" value="2" @if(old('comprensivo')=='2' || (isset($escolar->comprensivo)?$escolar->comprensivo:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es ordenado(a)</td>
                        <td><input type="radio" name="ordenado" id="fordenado" value="0" @if(old('ordenado')=='0' || (isset($escolar->ordenado)?$escolar->ordenado:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="ordenado" id="dordenado" value="1" @if(old('ordenado')=='1' || (isset($escolar->ordenado)?$escolar->ordenado:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="ordenado" id="cordenado" value="2" @if(old('ordenado')=='2' || (isset($escolar->ordenado)?$escolar->ordenado:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es comunicativo(a)</td>
                        <td><input type="radio" name="comunicativo" id="fcomunicativo" value="0" @if(old('comunicativo')=='0' || (isset($escolar->comunicativo)?$escolar->comunicativo:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="comunicativo" id="dcomunicativo" value="1" @if(old('comunicativo')=='1' || (isset($escolar->comunicativo)?$escolar->comunicativo:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="comunicativo" id="ccomunicativo" value="2" @if(old('comunicativo')=='2' || (isset($escolar->comunicativo)?$escolar->comunicativo:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es muy religioso(a)</td>
                        <td><input type="radio" name="religioso" id="freligioso" value="0" @if(old('religioso')=='0' || (isset($escolar->religioso)?$escolar->religioso:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="religioso" id="dreligioso" value="1" @if(old('religioso')=='1' || (isset($escolar->religioso)?$escolar->religioso:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="religioso" id="creligioso" value="2" @if(old('religioso')=='2' || (isset($escolar->religioso)?$escolar->religioso:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Le preocupa el futuro</td>
                        <td><input type="radio" name="futuro" id="ffuturo" value="0" @if(old('futuro')=='0' || (isset($escolar->futuro)?$escolar->futuro:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="futuro" id="dfuturo" value="1" @if(old('futuro')=='1' || (isset($escolar->futuro)?$escolar->futuro:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="futuro" id="cfuturo" value="2" @if(old('futuro')=='2' || (isset($escolar->futuro)?$escolar->futuro:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es retraido(a)</td>
                        <td><input type="radio" name="retraido" id="fretraido" value="0" @if(old('retraido')=='0' || (isset($escolar->retraido)?$escolar->retraido:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="retraido" id="dretraido" value="1" @if(old('retraido')=='1' || (isset($escolar->retraido)?$escolar->retraido:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="retraido" id="cretraido" value="2" @if(old('retraido')=='2' || (isset($escolar->retraido)?$escolar->retraido:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Es cooperador(a)</td>
                        <td><input type="radio" name="cooperador" id="fcooperador" value="0" @if(old('cooperador')=='0' || (isset($escolar->cooperador)?$escolar->cooperador:'') == '0')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="cooperador" id="dcooperador" value="1" @if(old('cooperador')=='1' || (isset($escolar->cooperador)?$escolar->cooperador:'') == '1')
                            checked
                            @else

                            @endif></td>
                        <td><input type="radio" name="cooperador" id="ccooperador" value="2" @if(old('cooperador')=='2' || (isset($escolar->cooperador)?$escolar->cooperador:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                </table>
            </div>

            <div class="col-3 mt-3">
            <button type="submit" class="btn btn-success" id="guardarButton">Guardar y terminar</button>
                <!-- <a class="btn btn-success" href="{{ route('escolar.index') }}">Terminar</a> -->
                <script>
                    document.getElementById("guardarButton").addEventListener("click", function() {
                        window.location.href = "{{ route('escolar.index') }}";
                    });
                </script>
            </div>
        </form>
    </div>
</div>
@endSection