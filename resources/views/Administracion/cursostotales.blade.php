@extends('layout.panel')



@section('css')
<link rel="stylesheet" href="{{ asset('Datatables/datatables.min.css') }}">
<link href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="ruta-a/bootstrap.min.css">
<style>
  .small-select {
    width: 200px;
  }
  
  .dataTables_paginate .paginate_button {
    padding: 3px 5px;
    margin: 0 5px;
    
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
      pagingType: 'simple_numbers',
      lengthMenu: [1, 6, 9, 12],
      language: {
        lengthMenu: "Mostrar MENU Entradas",
        loadingRecords: "Cargando...",
        processing: "Procesando...",
        search: "Buscar:",
        zeroRecords: "Sin resultados encontrados",
        info: "",
        infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
        infoFiltered: "",
        paginate: {
          first: "Primero",
          last: "Ultimo",
          next: "Siguiente",
          previous: "Anterior"
        }
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
          <th style="width:80%">Periodo de Matricula</th>
           <th style="width:20%">Opciones</th>
          </tr>
      
        </thead>
        <tbody>

         <!-- Recorrer los registros existentes -->
         @foreach ($periodo as $periodo)
                <tr>
                    <!-- Mostrar los valores de cada registro -->
                  
                    <td style="width:80%">{{$periodo->periodoMatricula }}</td>
                    
             <td style="width:20%">   
                <a href="{{ route('periodocursos.index', ['periodo' => $periodo->id]) }}" class="btn btn-sm btn-primary">Ver cursos</a>
                
             </td>
             
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
  </form>
@endsection