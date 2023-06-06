@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Formulario Pre-Escolar</h3>
        </div>
        <div class="col text-right">
          <a href="{{Route('panelorientacion.index')}}" class="btn btn-lg btn-primary">Regresar</a>
          <a href="#" class="btn btn-lg btn-success-color-dark">Reporte </a> 
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
            <th scope="col">Nombre del Alumno</th>
            <th scope="col">Grado</th>
            <th scope="col">Seccion</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>

        <tbody>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

             <td>   
              <form action="#" method="POST">
                <a href= "#"class="btn btn-sm btn-primary">Editar</a>
                <a href="#" class="btn btn-sm btn-info">Ver</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
              </form>
             </td>
        </tr>
        
            
         
        </tbody>
      </table>
    </div>
  </div>
@endsection