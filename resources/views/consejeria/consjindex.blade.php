@extends('layout.panel')


@section('content')
<style>
.pagination .page-link span {
    font-size: 14px;
}

.pagination .page-link svg {
    width: 12px;
    height: 12px;
}

</style>

<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h2 class="mb-0">Confirmacion de Pasos de Matricula</h2>
        </div>
        <div class="col text-right">
                <a href="{{route('tabla.index')}}" class="btn btn-lg btn-success">
                    <i class="fas fa-angle-left"></i>
                    Regresar</a>
            </div>
      </div>
    </div>
    <div class="card-body">
     @if (session('notification'))
     <div class="alert alert-success" role="alert">
      {{session('notification')}}
  </div>
     @endif
        <tbody>  
            <tr>
            <th><h3>Fecha: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</h3></th>
            </tr>
        </tbody>

        <tbody>  
            <tr>
            <th><h3>Nombre del Alumno: </h3></th>
            <td></td>
            </tr>
        </tbody>

     <p>Bienvenidos: 
      Gracias por confiar en nuestra institucion, para nosotros es de mucho agrado atenderles <br>
       con esmero y prontitud,por lo que les solicitamos visitar los Departamentos siguientes: <br>
       (Primer ingreso del 1 al 5, reingreso1,2 y 3).De esta manera esta completo su proceso de matricula.
     </p>
    </div>
    <div class="table-responsive">
      <!-- Projects table -->
      <form action ="{{ route('indexcompromiso.store')}}" method="POST">
      @csrf

      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">1° SECRETARIA</th>
            <th scope="col">2° ORIENTACION</th>
            <th scope="col">3° CONSEJERIA</th>
            <th scope="col">4° TESORERIA</th>
            <th scope="col">5° SECRETARIA </th>
          </tr>
        </thead>

        <tbody>
        <tr>
             <td><input type="checkbox" name="secretaria[]" value="1" ></td>
             <td><input type="checkbox" name="orientacion[]" value="2" ></td>
             <td><input type="checkbox" name="consejeria[]" value="3" ></td>
             <td><input type="checkbox" name="tesoreria[]" value="4" ></td>
             <td><input type="checkbox" name="sec[]" value="5" ></td>
        </tr>
        </tbody>
         
      </table>
<br>
<br>

          <div class="col text-left">
          <button class="btn btn-primary btn-lg" type="submit">Aceptar</button>
      </form>
           </div>
    </div>
  </div>





        <script>
           // Obtiene la fecha actual
           var fechaActual = new Date().toLocaleDateString('es-ES');

           // Actualiza el contenido del elemento con el id "fecha-actual" con la fecha actual
           document.getElementById('fecha-actual').textContent = fechaActual;
<        /script>
@endsection