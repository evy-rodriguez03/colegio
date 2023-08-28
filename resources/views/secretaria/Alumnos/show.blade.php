@extends('layout.panel')

@section('content')

<style>
    .entregado {
  color: green;
  font-weight: bold;
}

.no-entregado {
  color: red;
  font-weight: bold;
}

</style>

<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
        <h1>Detalles de {{$alumnos->primernombre}} {{$alumnos->primerapellido}}</h1>
        </div>
        <div class="col text-right">
            <a href="{{route('alumnos.index')}}" class="btn btn-sm btn-success">
                <i class="fas fa-angle-left"></i>
                Regresar</a>
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
            <td>{{$alumnos->primernombre}} {{$alumnos->segundonombre}} {{$alumnos->primerapellido}} {{$alumnos->segundoapellido}}</td>
        </tr>
        <tr>
            <th>Número de identidad</th>
            <td>{{$alumnos->numerodeidentidad}}</td>
        </tr>
        <tr>
            <th>Fecha de nacimiento</th>
            <td>{{$alumnos->fechadenacimiento}}</td>
        </tr>
        <tr>
            <th>Ciudad</th>
            <td>{{$alumnos->ciudad}}</td>
        </tr>
        <tr>
          <th>Departamento</th>
          <td>{{$alumnos->depto}}</td>
      </tr>
      <tr>
        <th>Pais</th>
        <td>{{$alumnos->pais}}</td>
    </tr>
        <tr>
            <th>Genero</th>
            <td>{{$alumnos->genero}}</td>
        </tr>
        <tr>
            <th>Direccion</th>
            <td>{{$alumnos->direccion}}</td>
        </tr>
        <tr>
            <th>Escuela Anterior</th>
            <td>{{$alumnos->escuelaanterior}}</td>
        </tr>
        <tr>
            <th>Numero de hermanos en la institución</th>
            <td>{{$alumnos->numerodehermanosenicgc}}</td>
        </tr>
        <tr>
            <th>Alergia</th>
            <td>{{$alumnos->alergia}}</td>
        </tr>
        <tr>
          <th>Total de Hermanos</th>
          <td>{{$alumnos->totalhermanos}}</td>
      </tr>
      
        </tbody>
      </table>
      <hr>
      <h2>Documentos entregados</h2>
<?php
  $documentos = [
    'fotografias' => 'Fotografías del alumno',
    'fotografiasdelpadre' => 'Fotografías del padre',
    'carnet' => 'Carnet de vacunación',
    'certificadodeconducta' => 'Certificado de conducta',
    'bus' => 'bus',
    'taxi' => 'taxi',
    'conpadre' => 'con padre',
    'solo' => 'solo'
    

  ];
?>

<?php foreach ($documentos as $nombre => $titulo): ?>
  <?php
    $entregado = $alumnos->$nombre;
    $clase = $entregado ? 'entregado' : 'no-entregado';
  ?>
  <div class="documento <?php echo $clase ?>">
    <label>
      <input type="checkbox" name="<?php echo $nombre ?>" value="1" <?php echo $entregado ? 'checked' : '' ?> disabled>
      <?php echo $titulo ?>
    </label>
    <span><?php echo $entregado ? 'Entregado' : 'No entregado' ?></span>
  </div>
<?php endforeach; ?>
<hr>

   
@endSection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('eliminar') == 'ok')
        <script> 
        Swal.fire(
      '¡Borrado!',
      'El Alumno ha sido borrado exitosamente.',
      'Éxito'
    )
    
        </script>

  
@endif

<script>

  $('.form-eliminaralumno').submit(function(e){
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

@endsection