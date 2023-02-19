@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Alumnos</h3>
        </div>
        <div class="col text-right">
          <a href="{{url('/alumnos/create')}}" class="btn btn-sm btn-primary">Nuevo Alumno</a>
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
            <th scope="col">Número de identidad</th>
            <th scope="col">Telefono de encargado</th>
            <th scope="col">Grado</th>
            <th scope="col">Sección</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($alumnos as $alumno)
              
          
          <tr>
            <th scope="row">
              {{$alumno->primernombre}} {{$alumno->segundonombre}} {{$alumno->primerapellido}} {{$alumno->segundoapellido}}
            </th>
            <td>
              {{$alumno->numerodeidentidad}}
            </td>
            <td>
              {{$alumno->telefonodeencargado}}
            </td>
           <td>
            <!-- grado -->
           </td>
           <td>
            <!-- sección -->
           </td>
           <td>
            
            <form action="{{url('/alumnos/'.$alumno->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{url('/alumnos/'.$alumno->id.'/edit')}}" class="btn btn-sm bt-primary">Editar</a>
              <button type="submit" class="btn btn-sm bt-danger">Eliminar</button>
            </form>
            
           </td>
           @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection