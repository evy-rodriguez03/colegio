@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Alumno Existente</h3>
        </div>
        <div class="col text-right">
        <a href="{{Route('principal.create')}}" class="btn btn-lg btn-success"> <i class="fas fa-angle-left"></i> Regresar</a>
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
        
            <th scope="col">Nombre del alumno existente</th>
          </tr>
        </thead>
    


        <tbody>
             <!-- puede agregar valores para validar variables -->
        </tbody>
      </table>
    </div>
  </div>
@endsection
