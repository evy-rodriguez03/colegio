@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Escolar</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('escolartres.create')}}" class="btn btn-lg btn-success">
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
            <h2 class="col-12 mt-3">*Uso solamente para alumnos provenientes de otro instituto*</h2>

            <div class="form-group col-6 mt-3">
                <label for="cursosrepetidos">Cursos que ha repetido:</label>
                <input type="text" id="cursosrepetidos" name="cursosrepetidos" class="form-control" required value="{{old('cursosrepetidos')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div div class="form-group col-6 mt-3">
                <label for="materiasreprobadas">Materias que ha reprobado:</label>
                <input type="text" id="materiasreprobadas" name="materiasreprobadas" class="form-control" required value="{{old('materiasreprobadas')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="materiasagradan">Que materia le agrada mas?</label>
                <input type="text" id="materiasagradan" name="materiasagradan" class="form-control" required value="{{old('materiasagradan')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="atribuyeagrado">A que atribuye usted ese agrado?</label>
                <input type="text" id="atribuyeagrado" name="atribuyeagrado" class="form-control" required value="{{old('atribuyeagrado')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="agradanmenos">Que materias le agradan menos?</label>
                <input type="text" id="agradanmenos" name="agradanmenos" class="form-control" required value="{{old('agradanmenos')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="materiasdificultad">En que materias tiene mas dificultades?</label>
                <input type="text" id="materiasdificultad" name="materiasdificultad" class="form-control" required value="{{old('materiasdificultad')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="culturageneral">Que carreras desea seguir despues del Ciclo comun de Cultura General?</label>
                <input type="text" id="culturageneral" name="culturageneral" class="form-control" required value="{{old('culturageneral')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-6 mt-3">
                <label for="diversificado">Que carreras desea seguir despues del Ciclo Diversificado?</label>
                <input type="text" id="diversificado" name="diversificado" class="form-control" required value="{{old('diversificado')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <!-- Relaciones Interpersonales  -->
            <h2 class="col-12 mt-3">IX. Relaciones Interpersonales en la Familia</h2>

            <div class="form-group col-12 mt-3">
                <label>Respecto a su padre madre o persona que desempenie el papel de estos:</label>
            </div>

            <div class="form-group col-12 mt-3">
                <table class="table align-items-center table-flush">
                    <tr class="thead-light">
                        <th></th>
                        <th>Padre</th>
                        <th></th>
                        <th></th>
                        <th>Madre</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Mucho</td>
                        <td>Poco</td>
                        <td>Nada</td>
                        <td>Mucho</td>
                        <td>Poco</td>
                        <td>Nada</td>
                    </tr>
                    <tr>
                        <td>Se lleva bien con ud?</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Le permite hablar con el(ella)?</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Le participa en la solucion de problemas en el hogar?</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Tiene confianza con el(ella)?</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
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
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Bondadoso(a)</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>De caracter fuerte</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Estricto</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Tolerante</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Comunicativo</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Me ayuda a solucionar mis problemas</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Siente preocupacion por mis estudios</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Me permite toda clase de libertades</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Se preocupa por mi futuro</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Me sanciona ante una falta grande</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                    <tr>
                        <td>Me sanciona ante una falta leve</td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                        <td><input type="checkbox" name="" value="1"></td>
                    </tr>
                </table>
            </div>

            <div class="form-group col-4 mt-3">
                <label for="">En que rasgos no le gustaria ser como su papa?</label>
                <input type="text" id="" name="" class="form-control" required value="{{old('')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-4 mt-3">
                <label for="">En que rasgos no le gustaria ser como su mama?</label>
                <input type="text" id="" name="" class="form-control" required value="{{old('')}}" placeholder="Especifique"></input>
                <div class="valid-feedback"></div>
            </div>

            <div class="form-group col-4 mt-3">
                <label for="">Las relaciones con sus hermanos las considera:</label>
                <select type="text" id="" name="" class="form-control" required value="{{old('')}}">
                    <option value="">Elegir</option>
                    <option value="">Muy buena</option>
                    <option value="">Buena</option>
                    <option value="">Regulares</option>
                    <option value="">Malas</option>
                </select>
            </div>

            <div>
            <a class="btn btn-success" href="{{ route('escolarcinco.create') }}">siguiente</a>
            </div>
        </form>
    </div>
</div>
@endSection