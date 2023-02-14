@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Usuarios</h3>
        </div>
        <div class="col text-right">
          <a href="{{url('/usuarios/crear')}}" class="btn btn-sm btn-primary">Nuevo Usuario</a>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Contraseña</th>
            <th scope="col">Rol</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">
              /argon/
            </th>
            <td>
              4,569
            </td>
            <td>
              340
            </td>
           <td>

           </td>
           <td>
            <a href="" class="btn btn-sm bt-primary">Editar</a>
            <a href="" class="btn btn-sm bt-danger">Eliminar</a>
           </td>
       
        </tbody>
      </table>
    </div>
  </div>
@endsection