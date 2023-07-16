
@extends('layout.panel')


@section('css')
<link rel="stylesheet" href="{{ asset('Datatables/datatables.min.css') }}">
<link href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet"/>

<style>
    .small-select {
        width: 200px;
        /* Otros estilos personalizados */
    }
</style>
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>

<script>
   $(document).ready(function() {
      $('#alumno').DataTable({
         lengthMenu: [3, 6, 9, 12],
      });
   });
</script>
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h2 class="mb-0">Departamento de Consejeria</h2>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">
  <form method="=get"> 
    <div class="input-group mb-2">
 
</div>
<div class="card-body">
    @if (session('success'))
     <div class="alert alert-success" role="success">
      {{session('success')}}
  </div>
  @endif
 </form>
 <div class="table-responsive">
        <!-- Projects table -->
        <table id="alumno" class="table align-items-center table-flush">
            <thead class="thead-light">
    <tr>
      <th scope="row"> Nº</th>
      <th scope="row">Nombre</th>
      <th scope="row">Identidad</th>
      <th scope="row">Opciones</th> 
    </tr>
</head>
<tbody>
@foreach ($alumnos as $index => $vistaconsejeria)

 <tr>
  <td>{{$vistaconsejeria->id}}</td>
  <td>{{$vistaconsejeria->primernombre}} {{$vistaconsejeria->segundonombre}} {{$vistaconsejeria->primerapellido}} {{$vistaconsejeria->segundoapellido}}</td>
  <td>{{$vistaconsejeria->numerodeidentidad }}</td>
  <td>
  <a href="{{Route('consejeria.create', $vistaconsejeria->id)}}" class="btn btn-sm btn-info">
          Ver Proceso</a>    
  </td>
 </tr>
 @endforeach
</tbody>
</table>
    </div>
  </div>
</form>
@endsection
