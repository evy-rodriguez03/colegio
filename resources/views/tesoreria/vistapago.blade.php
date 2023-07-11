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
          <h3 class="mb-0">Pago a Realizar</h3>
        </div>
        <div class="col text-right">
          <a href="{{Route('paneltesoreria.index')}}" class="btn btn-lg btn-success">
            <i class="fas fa-angle-left"></i>Regresar</a>
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

@foreach ($alumnos as $index => $vistapago)
 <tr>
  <td>{{$vistapago->id}}</td>
  <td>{{$vistapago->primernombre}} {{$vistapago->primerapellido}}</td>
  <td>{{$vistapago->numerodeidentidad }}</td>
  <td>
  <a href="{{route('pagorealizar.index')}}" class="btn btn-sm btn-info"> ver pago </a>
  </td>
 </tr>

 @endforeach



</tbody>
</table>
    </div>
  </div>
</form>
@endsection
