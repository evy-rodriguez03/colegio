@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar Paso-6</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('escolarcinco.create')}}" class="btn btn-lg btn-success">
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
                        <td><input type="checkbox" name="pbienm" value="1"></td>
                        <td><input type="checkbox" name="pbienp" value="1"></td>
                        <td><input type="checkbox" name="pbienn" value="1"></td>
                    </tr>
                    <tr>
                        <td>Le permite hablar con el?</td>
                        <td><input type="checkbox" name="ppermitem" value="1"></td>
                        <td><input type="checkbox" name="ppermitep" value="1"></td>
                        <td><input type="checkbox" name="ppermiten" value="1"></td>
                    </tr>
                    <tr>
                        <td>Le participa en la solucion de problemas en el hogar?</td>
                        <td><input type="checkbox" name="psolucionm" value="1"></td>
                        <td><input type="checkbox" name="psolucionp" value="1"></td>
                        <td><input type="checkbox" name="psolucionn" value="1"></td>
                    </tr>
                    <tr>
                        <td>Tiene confianza con el?</td>
                        <td><input type="checkbox" name="pconfianzam" value="1"></td>
                        <td><input type="checkbox" name="pconfianzap" value="1"></td>
                        <td><input type="checkbox" name="pconfianzan" value="1"></td>
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
                        <td><input type="checkbox" name="mbienm" value="1"></td>
                        <td><input type="checkbox" name="mbienp" value="1"></td>
                        <td><input type="checkbox" name="mbienn" value="1"></td>
                    </tr>
                    <tr>
                        <td>Le permite hablar con ella?</td>
                        <td><input type="checkbox" name="mpermitem" value="1"></td>
                        <td><input type="checkbox" name="mpermitep" value="1"></td>
                        <td><input type="checkbox" name="mpermiten" value="1"></td>
                    </tr>
                    <tr>
                        <td>Le participa en la solucion de problemas en el hogar?</td>
                        <td><input type="checkbox" name="msolucionm" value="1"></td>
                        <td><input type="checkbox" name="msolucionp" value="1"></td>
                        <td><input type="checkbox" name="msolucionn" value="1"></td>
                    </tr>
                    <tr>
                        <td>Tiene confianza con ella?</td>
                        <td><input type="checkbox" name="mconfianzam" value="1"></td>
                        <td><input type="checkbox" name="mconfianzap" value="1"></td>
                        <td><input type="checkbox" name="mconfianzan" value="1"></td>
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
                        <td><input type="checkbox" name="pconprensivo" value="1"></td>
                        <td><input type="checkbox" name="mcomprensivo" value="1"></td>
                        <td><input type="checkbox" name="ecomprensivo" value="1"></td>
                    </tr>
                    <tr>
                        <td>Bondadoso(a)</td>
                        <td><input type="checkbox" name="pbondadoso" value="1"></td>
                        <td><input type="checkbox" name="mbondadoso" value="1"></td>
                        <td><input type="checkbox" name="ebondadoso" value="1"></td>
                    </tr>
                    <tr>
                        <td>De caracter fuerte</td>
                        <td><input type="checkbox" name="pfuete" value="1"></td>
                        <td><input type="checkbox" name="mfuete" value="1"></td>
                        <td><input type="checkbox" name="efuete" value="1"></td>
                    </tr>
                    <tr>
                        <td>Estricto</td>
                        <td><input type="checkbox" name="pestircto" value="1"></td>
                        <td><input type="checkbox" name="mestircto" value="1"></td>
                        <td><input type="checkbox" name="eestircto" value="1"></td>
                    </tr>
                    <tr>
                        <td>Tolerante</td>
                        <td><input type="checkbox" name="ptolerante" value="1"></td>
                        <td><input type="checkbox" name="mtolerante" value="1"></td>
                        <td><input type="checkbox" name="etolearnte" value="1"></td>
                    </tr>
                    <tr>
                        <td>Comunicativo</td>
                        <td><input type="checkbox" name="pcomunicativo" value="1"></td>
                        <td><input type="checkbox" name="mcomunicativo" value="1"></td>
                        <td><input type="checkbox" name="ecomunicativo" value="1"></td>
                    </tr>
                    <tr>
                        <td>Me ayuda a solucionar mis problemas</td>
                        <td><input type="checkbox" name="pproblemas" value="1"></td>
                        <td><input type="checkbox" name="mproblemas" value="1"></td>
                        <td><input type="checkbox" name="eproblemas" value="1"></td>
                    </tr>
                    <tr>
                        <td>Siente preocupacion por mis estudios</td>
                        <td><input type="checkbox" name="pestudio" value="1"></td>
                        <td><input type="checkbox" name="mestudio" value="1"></td>
                        <td><input type="checkbox" name="eestudio" value="1"></td>
                    </tr>
                    <tr>
                        <td>Me permite toda clase de libertades</td>
                        <td><input type="checkbox" name="plibertades" value="1"></td>
                        <td><input type="checkbox" name="mlibertades" value="1"></td>
                        <td><input type="checkbox" name="elibertades" value="1"></td>
                    </tr>
                    <tr>
                        <td>Se preocupa por mi futuro</td>
                        <td><input type="checkbox" name="pfuturo" value="1"></td>
                        <td><input type="checkbox" name="mfuturo" value="1"></td>
                        <td><input type="checkbox" name="efuturo" value="1"></td>
                    </tr>
                    <tr>
                        <td>Me sanciona ante una falta grande</td>
                        <td><input type="checkbox" name="pgrande" value="1"></td>
                        <td><input type="checkbox" name="mgrande" value="1"></td>
                        <td><input type="checkbox" name="egrande" value="1"></td>
                    </tr>
                    <tr>
                        <td>Me sanciona ante una falta leve</td>
                        <td><input type="checkbox" name="pleve" value="1"></td>
                        <td><input type="checkbox" name="mleve" value="1"></td>
                        <td><input type="checkbox" name="eleve" value="1"></td>
                    </tr>
                </table>
            </div>

            <div class="form-group col-4 mt-3">
                <label for="nopapa">En que rasgos no le gustaria ser como su papa?</label>
                <input type="text" id="nopapa" name="nopapa" class="form-control" required value="{{old('nopapa')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-4 mt-3">
                <label for="nomama">En que rasgos no le gustaria ser como su mama?</label>
                <input type="text" id="nomama" name="nomama" class="form-control" required value="{{old('nomama')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-4 mt-3">
                <label for="relaciones">Las relaciones con sus hermanos las considera:</label>
                <select type="text" id="relaciones" name="relaciones" class="form-control" required value="{{old('relaciones')}}">
                    <option value="">Elegir</option>
                    <option value="relacionmb">Muy buena</option>
                    <option value="relacionb">Buena</option>
                    <option value="relacionr">Regulares</option>
                    <option value="relacionm">Malas</option>
                </select>
            </div>


            <div class="col-3 mt-3">
                <a class="btn btn-success" href="{{ route('escolarsiete.create') }}">Siguiente</a>
            </div>
        </form>
    </div>
</div>
@endSection