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


      </table>
      <hr>
      <h2>Pagos realizados</h2>
<?php
  $documentos = [
    'mensualidad' => 'mensualidad',
    'gastosadministrativos' => 'Gastos administrativos',
    'bolsaescolar' => 'Bolsa escolar',
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
<form action="{{url('/alumnos/'.$alumnos->id)}}" method="POST" class="form-eliminaralumno">
    @csrf
    @method('DELETE')
    <a href="{{url('/alumnos/'.$alumnos->id.'/edit')}}" class="btn btn-lg btn-primary">Editar</a>
    <button type="submit" class="btn btn-lg btn-danger">Eliminar</button>
  </form>
   
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