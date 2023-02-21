@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Padres</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('padres.create')}}" class="btn btn-sm btn-primary">Nuevo Padre</a>
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
            <th scope="col">Tipo</th>
            <th scope="col">Primer Nombre</th>
            <th scope="col">Segundo Nombre</th>
            <th scope="col">Número de Identidad</th>
            <th scope="col">Teléfono Personal</th>
            <th scope="col">Lugar de Trabajo</th>
            <th scope="col">Oficio</th>
            <th scope="col">Teléfono de Oficina</th>
            <th scope="col">Ingresos</th>
          </tr>
        </thead>
        <tbody>
        <tbody>
          @foreach ($padres as $padre)
              
          
          <tr>
            <td>
              {{$padre->tipo}}
            </td>
            <th scope="row">
              {{$padre->primernombre}} {{$usuario->segundonombre}}
            </th>
            <td>
              {{$padre->numerodeidentidad}}
            </td>
            <td>
              {{$padre->contrasena}}
            </td>
           <td>
            {{$usuario->rol}}
           </td>
           <td>
            
            <form action="{{url('/usuarios/'.$usuario->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{url('/usuarios/'.$usuario->id.'/edit')}}" class="btn btn-sm bt-primary">Editar</a>
              <button type="submit" class="btn btn-sm bt-danger">Eliminar</button>
            </form>
            
           </td>
           @endforeach
        </tbody>
        </tbody>
      </table>
    </div>
  </div>
@endsection