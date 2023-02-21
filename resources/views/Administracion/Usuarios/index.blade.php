@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Usuarios</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('usuarios.create')}}" class="btn btn-sm btn-primary">Nuevo Usuario</a>
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
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Rol</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($usuarios as $usuario)
              
          
          <tr>
            <th scope="row">
              {{$usuario->nombre}} {{$usuario->apellido}}
            </th>
            <td>
              {{$usuario->correo}}
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
      </table>
    </div>
  </div>
@endsection