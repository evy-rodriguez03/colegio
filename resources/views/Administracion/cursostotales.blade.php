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
      $('#curso').DataTable({
         lengthMenu: [3, 6, 9, 12],
         language: {
    "decimal": ",",
    "thousands": ".",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sSearch": "Buscar:",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast":"Último",
        "sNext":"Siguiente",
        "dom": '<"toolbar">Bftrip',
        "sPrevious": "Anterior"
    },
    "sProcessing":"Cargando..."
}
         
      });
   });
</script>
@endsection
@section('content')
div class="card shadow">
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Cursos Totales</h3>
        </div>
        <div class="col text-right">
          <a href="{{Route('dashboard.index')}}" class="btn btn-lg btn-success">
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
      <table id="curso" class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
           <th></th>
          <th>Periodo de Matricula</th>
          <th></th>
           <th>Opciones</th>
          </tr>
      
        </thead>
        <tbody>

         <!-- Recorrer los registros existentes -->
         @foreach ($periodo as $periodo)
                <tr>
                    <!-- Mostrar los valores de cada registro -->
                  
                   
                    <td></td> 
                    <td>{{$periodo->periodoMatricula }}</td>
                    <td></td>
                    
             <td>   
              <form action="#" method="POST">
                <button  class="btn btn-sm btn-primary" onclick="mostrarCursos('.$periodo['id_periodo'].')">Mostrar Cursos</button>
               
                @csrf
              </form>
              <script>
function mostrarCursos(periodoId) {
    // Realizar una llamada AJAX para obtener los cursos del periodo seleccionado
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Mostrar los cursos obtenidos en el contenedor
            document.getElementById("cursosContainer").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "periodocursos.php?periodo_id=" + periodoId, true);
    xmlhttp.send();
}
</script>
             </td>
             
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
  </form>
@endsection