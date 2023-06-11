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
          <h3 class="mb-0">Confirmacion de Pasos de Matricula</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('dashboard.index')}}" class="btn btn-lg btn-primary">Regresar</a>
        </div>
      </div>
    </div>
    <div class="card-body">
     @if (session('notification'))
     <div class="alert alert-success" role="alert">
      {{session('notification')}}
  </div>
     @endif

     <h3 class="mb-0">Fecha: </h3> <h3>Alumno(a): </h3>
     <p>Bienvenidos: 
      Gracias por confiar en nuestra institucion, para nosotros es de mucho agrado atenderles con esmero y prontitud,
       por lo que les solicitamos visitar los Departamentos siguientes:(Primer ingreso del 1 al 5, reingreso1,2 y 3).
       De esta manera esta completo su proceso de matricula.
     </p>

    </div>
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">1° SECRETARIA</th>
            <th scope="col">2° ORIENTACION</th>
            <th scope="col">3° CONSEERIA</th>
            <th scope="col">4° TESORERIA</th>
            <th scope="col">5° SECRETARIA </th>
          </tr>
        </thead>
        <tbody>
        <div class="col text-left">
        
            <div class="col-md-4 mb-3">
                <label for="observaciones">Observaciones</label>
                <input type="text" class="form-control" name="obsrvaciones" placeholder="Puede escribir algunas Observaciones" required>
                <div class="valid-feedback">#</div>
            </div>
         
@endsection