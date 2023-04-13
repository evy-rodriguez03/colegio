@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Cursos</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('cursos.create')}}" class="btn btn-lg btn-primary">Nuevo Curso</a>
          <a href="{{route('cursos.pdf')}}" class="btn btn-lg btn-primary">Documento Curso</a>
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
            <th scope="col">Curso</th>
            <th scope="col">Seccion</th>
            <th scope="col">Horario</th>
            <th scope="col">Periodo</th>
            <th scope="col">Jornada</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>

        <tbody>
        @foreach ($cursos as $curso)
        <tr>
             <td>{{$curso->id}}</td>
             <td>{{$curso->curso}}</td>
             <td>{{$curso->seccion}}</td>
             <td>{{$curso->horario}}</td>
              <td>{{$curso->periodo}}</td>
              <td>{{$curso->jornada}}</td>
             <td> 
              <form action="{{route ('cursos.destroy',$curso->id)}}" method="POST">
                <a href= "{{route ('cursos.edit',$curso->id)}}"class="btn btn-sm btn-primary">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
              </form>
             </td>
        </tr>
        
            
           
           @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
