@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
        <h1>Detalles de {{$padre->primernombre}} {{$padre->primerapellido}}</h1>
        </div>
        <div class="col text-right">
        <a href="{{route('padres.index')}}" class="btn btn-lg btn-success"> 
        <i class="fas fa-angle-left"></i>Regresar</a>
        </div>
      </div>
    </div>
    <div class="card-body">
<table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
          </tr>
        </thead>

        <tbody>     
        <tr>
            <th>Nombre</th>
            <td>{{$padre->primernombre}} {{$padre->primerapellido}}</td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td>{{$padre->tipo}}</td>
        </tr>
        <tr>
            <th>Número de Identidad</th>
            <td>{{$padre->numerodeidentidad}}</td>
        </tr>
        <tr>
            <th>Teléfono Personal</th>
            <td>{{$padre->telefonopersonal}}</td>
        </tr>
        <tr>
            <th>Lugar de Trabajo</th>
            <td>{{$padre->lugardetrabajo}}</td>
        </tr>
        <tr>
            <th>Oficio</th>
            <td>{{$padre->oficio}}</td>
        </tr>
        <tr>
            <th>Teléfono de Oficina</th>
            <td>{{$padre->telefonooficina}}</td>
        </tr>
        <tr>
            <th>Ingresos</th>
            <td>{{$padre->ingresos}}</td>
        </tr>
        </tbody>
        
      </table>
    
  
@endSection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('eliminar') == 'ok')
        <script> 
        Swal.fire(
      '¡Borrado!',
      'El padre ha sido borrado exitosamente.',
      'Éxito'
    )

        </script>

  
@endif

<script>

  $('.form-eliminarpadre').submit(function(e){
  e.preventDefault();


  Swal.fire({
  title: '¿Esta seguro?',
  text: "¡Si usted borra este registro no podra recuperarlo!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, borralo'
}).then((result) => {
  if (result.isConfirmed) {
  
    this.submit();
  }
})
  });

  
</script>

@if(session('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: '¡Perfecto!',
      text: '{{ session('success') }}',
      showConfirmButton: false,
      timer: 3000
    })
  </script>
  @endif
    
   
@endSection