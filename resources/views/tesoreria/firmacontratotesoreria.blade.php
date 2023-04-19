@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Firma de Contrato</h3>
        </div>
        <div class="col text-right">
          <a href="{{Route('paneltesoreria.index')}}" class="btn btn-lg btn-primary">Regresar</a>
        </div>
      </div>
    </div>
    <div class="card-body">
     @if (session('notification'))
     <div class="alert alert-success" role="alert">
      {{session('notification')}}
  </div>
     @endif
    </div>
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre del Padre</th>
            <th scope="col">Compromiso</th>
          </tr>
        </thead>
    


        <tbody>

        @foreach ($padres as $padre)
        <tr>
             <td>{{$padre->id}}</td>
            <td> {{$padre->primernombre}} {{$padre->primerapellido}}</td>
             <td>{{$padre->compromiso}} <input type="checkbox" name="nivel" value="compromiso">  Firmo el contrato de tesoreia</td>
              
        </tr>

       
        
            
           
           @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection