@extends('layout.panel')

@section('content')

<style>
    .entregado {
  color: green;
  font-weight: bold;
}

.no-entregado {
  color: red;
  font-weight: bold;
}

</style>

<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
        </div>
        <div class="col text-right">
        <a href="{{Route('vistapago.index')}}" class="btn btn-lg btn-success">
          <i class="fas fa-angle-left"></i>Regresar</a>
      </div>
      </div>
    </div>
    <div class="card-body">
<table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
                <th>Nº</th>
                <th>Mensualidad</th>
                <th>Pagos Administrativos</th>
                <th>Bolsa Escolar</th>
               
                
          </tr>
        </thead>
        <tbody>
            @foreach ($pagorealizar as $pago )
                <tr>
                    <td>{{$pago->id}}</td>
                    <td>{{ $pago->mensualidad ? 'Pagado' : 'Pendiente' }}</td>
                    <td>{{ $pago->pagosadministrativos ? 'Pagado' : 'Pendiente' }}</td>
                    <td>{{ $pago->bolsaescolar ? 'Pagado' : 'Pendiente' }}</td>
                    
                 
                </tr>
            @endforeach
            
        </tbody>
        
    </table>

   

@endsection