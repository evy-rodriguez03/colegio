@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar Paso-6</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('escolar.editcinco', ['escolar' => $escolar->id])}}" class="btn btn-lg btn-success">
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

        <form class="row g-3 mt-3" action="{{route('escolar.updateseis', $alumnos->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Relaciones Interpersonales  -->
            <h2 class="col-12 mt-3">IX. Relaciones Interpersonales en la Familia</h2>

            <div class="form-group col-12 mt-3">
                <label>Respecto a su padre madre o persona que desempenie el papel de estos:</label>
            </div>

            <h2 class="col-12 mt-3">Padre</h2>

            <div class="form-group col-12 mt-3">
                <table class="table align-items-center table-flush">
                    <tr class="thead-light">
                        <th></th>
                        <th>Mucho</th>
                        <th>Poco</th>
                        <th>Nada</th>
                    </tr>

                    <tr>
                        <td>Se lleva bien con ud?</td>
                        <td><input type="radio" name="pbienconud" id="pbienm" value="0" @if(old('pbienconud')=='0' || (isset($escolar->pbienconud)?$escolar->pbienconud:'') == '0')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="pbienconud" id="pbienp" value="1" @if(old('pbienconud')=='1' || (isset($escolar->pbienconud)?$escolar->pbienconud:'') == '1')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="pbienconud" id="pbienn" value="2" @if(old('pbienconud')=='2' || (isset($escolar->pbienconud)?$escolar->pbienconud:'') == '2')
                            checked
                            @else

                            @endif>
                        </td>
                    </tr>
                    <tr>
                        <td>Le permite hablar con el?</td>
                        <td><input type="radio" name="hablarconel" id="ppermitem" value="0" @if(old('hablarconel')=='0' || (isset($escolar->hablarconel)?$escolar->hablarconel:'') == '0')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="hablarconel" id="ppermitep" value="1" @if(old('hablarconel')=='1' || (isset($escolar->hablarconel)?$escolar->hablarconel:'') == '1')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="hablarconel" id="ppermiten" value="2" @if(old('hablarconel')=='2' || (isset($escolar->hablarconel)?$escolar->hablarconel:'') == '2')
                            checked
                            @else

                            @endif>
                        </td>
                    </tr>
                    <tr>
                        <td>Le participa en la solucion de problemas en el hogar?</td>
                        <td><input type="radio" name="psolucion" id="psolucionm" value="0" @if(old('psolucion')=='0' || (isset($escolar->psolucion)?$escolar->psolucion:'') == '0')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="psolucion" id="psolucionp" value="1" @if(old('psolucion')=='1' || (isset($escolar->psolucion)?$escolar->psolucion:'') == '1')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="psolucion" id="psolucionn" value="2" @if(old('psolucion')=='2' || (isset($escolar->psolucion)?$escolar->psolucion:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Tiene confianza con el?</td>
                        <td><input type="radio" name="pconfianza" id="pconfianzam" value="0" @if(old('pconfianza')=='0' || (isset($escolar->pconfianza)?$escolar->pconfianza:'') == '0')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="pconfianza" id="pconfianzap" value="1" @if(old('pconfianza')=='1' || (isset($escolar->pconfianza)?$escolar->pconfianza:'') == '1')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="pconfianza" id="pconfianzan" value="2" @if(old('pconfianza')=='2' || (isset($escolar->pconfianza)?$escolar->pconfianza:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                </table>
            </div>

            <h2 class="col-12 mt-3">Madre</h2>

            <div class="form-group col-12 mt-3">
                <table class="table align-items-center table-flush">
                    <tr class="thead-light">
                        <th></th>
                        <th>Mucho</th>
                        <th>Poco</th>
                        <th>Nada</th>
                    </tr>
                    <tr>
                        <td>Se lleva bien con ud?</td>
                        <td><input type="radio" name="mbienconud" id="pbienm" value="0" @if(old('mbienconud')=='0' || (isset($escolar->mbienconud)?$escolar->mbienconud:'') == '0')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="mbienconud" id="pbienp" value="1" @if(old('mbienconud')=='1' || (isset($escolar->mbienconud)?$escolar->mbienconud:'') == '1')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="mbienconud" id="pbienn" value="2" @if(old('mbienconud')=='2' || (isset($escolar->mbienconud)?$escolar->mbienconud:'') == '2')
                            checked
                            @else

                            @endif>
                        </td>
                    </tr>
                    <tr>
                        <td>Le permite hablar con ella?</td>
                        <td><input type="radio" name="hablarconella" id="ppermitem" value="0" @if(old('hablarconella')=='0' || (isset($escolar->hablarconella)?$escolar->hablarconella:'') == '0')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="hablarconella" id="ppermitep" value="1" @if(old('hablarconella')=='1' || (isset($escolar->hablarconella)?$escolar->hablarconella:'') == '1')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="hablarconella" id="ppermiten" value="2" @if(old('hablarconella')=='2' || (isset($escolar->hablarconella)?$escolar->hablarconella:'') == '2')
                            checked
                            @else

                            @endif>
                        </td>
                    </tr>
                    <tr>
                        <td>Le participa en la solucion de problemas en el hogar?</td>
                        <td><input type="radio" name="msolucion" id="psolucionm" value="0" @if(old('msolucion')=='0' || (isset($escolar->msolucion)?$escolar->msolucion:'') == '0')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="msolucion" id="psolucionp" value="1" @if(old('msolucion')=='1' || (isset($escolar->msolucion)?$escolar->msolucion:'') == '1')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="msolucion" id="psolucionn" value="2" @if(old('msolucion')=='2' || (isset($escolar->msolucion)?$escolar->msolucion:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>
                    <tr>
                        <td>Tiene confianza con el?</td>
                        <td><input type="radio" name="mconfianza" id="pconfianzam" value="0" @if(old('mconfianza')=='0' || (isset($escolar->mconfianza)?$escolar->mconfianza:'') == '0')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="mconfianza" id="pconfianzap" value="1" @if(old('mconfianza')=='1' || (isset($escolar->mconfianza)?$escolar->mconfianza:'') == '1')
                            checked
                            @else

                            @endif>
                        </td>
                        <td><input type="radio" name="mconfianza" id="pconfianzan" value="2" @if(old('mconfianza')=='2' || (isset($escolar->mconfianza)?$escolar->mconfianza:'') == '2')
                            checked
                            @else

                            @endif></td>
                    </tr>


                </table>
            </div>

            <div class="form-group col-12 mt-3">
                <label>Ubique las siguientes cualidades o rasgos segun corresponda:</label>
            </div>

            <div class="form-group col-12 mt-3">
                <table class="table align-items-center table-flush">
                    <tr class="thead-light">
                        <th></th>
                        <th>Padre</th>
                        <th>Madre</th>
                        <th>Encargado</th>
                    </tr>
                    <tr>
                        <td>Comprensivo(a)</td>
                        <td><input type="checkbox" name="pcomprensivo" value="1" @if(old('pcomprensivo')=='1' || (isset($escolar->pcomprensivo) ? $escolar->pcomprensivo : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="mcomprensivo" value="1" @if(old('mcomprensivo')=='1' || (isset($escolar->mcomprensivo) ? $escolar->mcomprensivo : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="ecomprensivo" value="1" @if(old('ecomprensivo')=='1' || (isset($escolar->ecomprensivo) ? $escolar->ecomprensivo : '') == '1')
                            checked
                            @endif></td>
                    </tr>
                    <tr>
                        <td>Bondadoso(a)</td>
                        <td><input type="checkbox" name="pbondadoso" value="1" @if(old('pbondadoso')=='1' || (isset($escolar->pbondadoso) ? $escolar->pbondadoso : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="mbondadoso" value="1" @if(old('mbondadoso')=='1' || (isset($escolar->mbondadoso) ? $escolar->mbondadoso : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="ebondadoso" value="1" @if(old('ebondadoso')=='1' || (isset($escolar->ebondadoso) ? $escolar->ebondadoso : '') == '1')
                            checked
                            @endif></td>
                    </tr>
                    <tr>
                        <td>De caracter fuerte</td>
                        <td><input type="checkbox" name="pfuete" value="1" @if(old('pfuete')=='1' || (isset($escolar->pfuete) ? $escolar->pfuete : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="mfuete" value="1" @if(old('mfuete')=='1' || (isset($escolar->mfuete) ? $escolar->mfuete : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="efuete" value="1" @if(old('efuete')=='1' || (isset($escolar->efuete) ? $escolar->efuete : '') == '1')
                            checked
                            @endif></td>
                    </tr>
                    <tr>
                        <td>Estricto</td>
                        <td><input type="checkbox" name="pestricto" value="1" @if(old('pestricto')=='1' || (isset($escolar->pestricto) ? $escolar->pestricto : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="mestricto" value="1" @if(old('mestricto')=='1' || (isset($escolar->mestricto) ? $escolar->mestricto : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="eestricto" value="1" @if(old('eestricto')=='1' || (isset($escolar->eestricto) ? $escolar->eestricto : '') == '1')
                            checked
                            @endif></td>
                    </tr>
                    <tr>
                        <td>Tolerante</td>
                        <td><input type="checkbox" name="ptolerante" value="1" @if(old('ptolerante')=='1' || (isset($escolar->ptolerante) ? $escolar->ptolerante : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="mtolerante" value="1" @if(old('mtolerante')=='1' || (isset($escolar->mtolerante) ? $escolar->mtolerante : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="etolerante" value="1" @if(old('etolerante')=='1' || (isset($escolar->etolerante) ? $escolar->etolerante : '') == '1')
                            checked
                            @endif></td>
                    </tr>
                    <tr>
                        <td>Comunicativo</td>
                        <td><input type="checkbox" name="pcomunicativo" value="1" @if(old('pcomunicativo')=='1' || (isset($escolar->pcomunicativo) ? $escolar->pcomunicativo : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="mcomunicativo" value="1" @if(old('mcomunicativo')=='1' || (isset($escolar->mcomunicativo) ? $escolar->mcomunicativo : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="ecomunicativo" value="1" @if(old('ecomunicativo')=='1' || (isset($escolar->ecomunicativo) ? $escolar->ecomunicativo : '') == '1')
                            checked
                            @endif></td>
                    </tr>
                    <tr>
                        <td>Me ayuda a solucionar mis problemas</td>
                        <td><input type="checkbox" name="pproblemas" value="1" @if(old('pproblemas')=='1' || (isset($escolar->pproblemas) ? $escolar->pproblemas : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="mproblemas" value="1" @if(old('mproblemas')=='1' || (isset($escolar->mproblemas) ? $escolar->mproblemas : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="eproblemas" value="1" @if(old('eproblemas')=='1' || (isset($escolar->eproblemas) ? $escolar->eproblemas : '') == '1')
                            checked
                            @endif></td>
                    </tr>
                    <tr>
                        <td>Siente preocupacion por mis estudios</td>
                        <td><input type="checkbox" name="pestudio" value="1" @if(old('pestudio')=='1' || (isset($escolar->pestudio) ? $escolar->pestudio : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="mestudio" value="1" @if(old('mestudio')=='1' || (isset($escolar->mestudio) ? $escolar->mestudio : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="eestudio" value="1" @if(old('eestudio')=='1' || (isset($escolar->eestudio) ? $escolar->eestudio : '') == '1')
                            checked
                            @endif></td>
                    </tr>
                    <tr>
                        <td>Me permite toda clase de libertades</td>
                        <td><input type="checkbox" name="plibertades" value="1" @if(old('plibertades')=='1' || (isset($escolar->plibertades) ? $escolar->plibertades : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="mlibertades" value="1" @if(old('mlibertades')=='1' || (isset($escolar->mlibertades) ? $escolar->mlibertades : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="elibertades" value="1" @if(old('elibertades')=='1' || (isset($escolar->elibertades) ? $escolar->elibertades : '') == '1')
                            checked
                            @endif></td>
                    </tr>
                    <tr>
                        <td>Se preocupa por mi futuro</td>
                        <td><input type="checkbox" name="pfuturo" value="1" @if(old('pfuturo')=='1' || (isset($escolar->pfuturo) ? $escolar->pfuturo : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="mfuturo" value="1" @if(old('mfuturo')=='1' || (isset($escolar->mfuturo) ? $escolar->mfuturo : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="efuturo" value="1" @if(old('efuturo')=='1' || (isset($escolar->efuturo) ? $escolar->efuturo : '') == '1')
                            checked
                            @endif></td>
                    </tr>
                    <tr>
                        <td>Me sanciona ante una falta grande</td>
                        <td><input type="checkbox" name="pgrande" value="1" @if(old('pgrande')=='1' || (isset($escolar->pgrande) ? $escolar->pgrande : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="mgrande" value="1" @if(old('mgrande')=='1' || (isset($escolar->mgrande) ? $escolar->mgrande : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="egrande" value="1" @if(old('egrande')=='1' || (isset($escolar->egrande) ? $escolar->egrande : '') == '1')
                            checked
                            @endif></td>
                    </tr>
                    <tr>
                        <td>Me sanciona ante una falta leve</td>
                        <td><input type="checkbox" name="pleve" value="1" @if(old('pleve')=='1' || (isset($escolar->pleve) ? $escolar->pleve : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="mleve" value="1" @if(old('mleve')=='1' || (isset($escolar->mleve) ? $escolar->mleve : '') == '1')
                            checked
                            @endif></td>
                        <td><input type="checkbox" name="eleve" value="1" @if(old('eleve')=='1' || (isset($escolar->eleve) ? $escolar->eleve : '') == '1')
                            checked
                            @endif></td>
                    </tr>
                </table>
            </div>

            <div class="form-group col-4 mt-3">
                <label for="nopapa">En que rasgos no le gustaria ser como su papa?</label>
                <input type="text" id="nopapa" name="nopapa" class="form-control" value="{{old('nopapa', $escolar -> nopapa)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-4 mt-3">
                <label for="nomama">En que rasgos no le gustaria ser como su mama?</label>
                <input type="text" id="nomama" name="nomama" class="form-control"value="{{old('nomama', $escolar -> nomama)}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-4 mt-3">
                <label for="relaciones">Las relaciones con sus hermanos las considera:</label>
                <select type="text" id="relaciones" name="relaciones" class="form-control" >
                    <option value="">Elegir</option>
                    <option @if(old('relaciones')=='Muy buena' || (isset($escolar->relaciones)?$escolar->relaciones:'') == 'Muy buena')
                            selected
                            @else

                            @endif value="Muy buena">Muy buena</option>
                    <option @if(old('relaciones')=='Buena' || (isset($escolar->relaciones)?$escolar->relaciones:'') == 'Buena')
                            selected
                            @else

                            @endif value="Buena">Buena</option>
                    <option @if(old('relaciones')=='Regulares' || (isset($escolar->relaciones)?$escolar->relaciones:'') == 'Regulares')
                            selected
                            @else

                            @endif value="Regulares">Regulares</option>
                    <option @if(old('relaciones')=='Malas' || (isset($escolar->relaciones)?$escolar->relaciones:'') == 'Malas')
                            selected
                            @else

                            @endif value="Malas">Malas</option>
                </select>
            </div>


            <div class="col-3 mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-success" href="{{ route('escolar.editsiete', ['escolar' => $escolar->id]) }}">Siguiente</a>
            </div>
        </form>
    </div>
</div>
@endSection