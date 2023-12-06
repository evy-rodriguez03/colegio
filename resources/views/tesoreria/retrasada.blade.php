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
    $('#alumno').DataTable({
      pagingType: 'simple_numbers',
      lengthMenu: [3, 6, 9, 12],
      language: {
        lengthMenu: "Mostrar _MENU_ Entradas",
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
          next: ">>",
          previous: "<<"
        }
      }
    });
  });
</script>
@endsection

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="mb-0">Clases Retrasadas</h2>
      </div>
      <div class="col text-right">
        <a href="{{route('paneltesoreria.index')}}" class="btn btn-lg btn-success">
          <i class="fas fa-angle-left"></i>
          Regresar</a>
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
  <div class="card-body">
    <div class="table-responsive">
      <!-- Projects table -->
      <table id="alumno" class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Numero de Identidad</th>
            <th scope="row">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($alumnos as $index=> $retrasadas)

          <tr>
            <th scope="row">
              {{$index + 1}}
            </th>
            <td>
              {{$retrasadas->primernombre}} {{$retrasadas->primerapellido}}
            </td>
            <td>
              {{$retrasadas->numerodeidentidad}}
            </td>

            <td>
              <a href="{{Route('retrasadas.create', $retrasadas->id)}}" class="btn btn-sm btn-info"> Editar</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endsection