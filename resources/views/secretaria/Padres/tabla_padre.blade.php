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
    setTimeout()
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
            <th scope="col">Nombre</th>
            <th scope="col">Número de Identidad</th>
            <th scope="col">Teléfono Personal</th>
            <th scope="col">Teléfono de Oficina</th>
          </tr>
        </thead>
        <tbody>  
          @foreach ($padres as $padre)
              
          <tr>
            <th scope="row">
              {{$padre->tipo}}{{$padre->primernombre}} {{$padre->segundonombre}}
            </th>
            <td>
              {{$padre->numerodeidentidad}}
            </td>
            <td>
              {{$padre->telefonopersonal}}
            </td>
            
            <td>
              {{$padre->telefonooficina}}
            </td>
           <td>
            
            <form action="{{url('/padres/'.$padre->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{url('/padres/'.$padre->id.'/edit')}}" class="btn btn-sm bt-primary">Editar</a>
              <button type="submit" class="btn btn-sm bt-danger">Eliminar</button>
            </form>
            
           </td>
           @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection