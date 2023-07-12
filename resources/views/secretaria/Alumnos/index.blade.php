@extends('layout.panel')


@section('content')
<style>
.pagination .page-link span {
    font-size: 14px;
}

.pagination .page-link svg {
    width: 12px;
    height: 12px;
}

</style>

<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Alumnos</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('alumnos.create')}}" class="btn btn-lg btn-primary">Nuevo Alumno</a>
          <a href="{{route('alumnos.pdf')}}" class="btn btn-lg btn-primary">Reporte Alumno</a>
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
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Número de identidad</th>
            <th scope="col">Telefono de Emergencia</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($alumnos as $index=> $alumno)
              
          
          <tr>
            <td>
              {{$index + 1}}
            </td>
            <th scope="row">
              {{$alumno->primernombre}} {{$alumno->segundonombre}} {{$alumno->primerapellido}} {{$alumno->segundoapellido}}
            </th>
            <td>
              {{$alumno->numerodeidentidad}}
            </td>
            <td>
              {{$alumno->telefonoemergencia}}
          </td>
           <td>
            
            <form action="{{url('/alumnos/'.$alumno->id)}}" method="POST" class="form-eliminaralumno">
              @csrf
              @method('DELETE')
              <a href="{{url('/alumnos/'.$alumno->id)}}" class="btn btn-sm btn-info">Ver</a>
              <a href="{{url('/alumnos/'.$alumno->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
              <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
            
           </td>
           @endforeach
        </tbody>
      </table>
    </div>
    {{ $alumnos->links('vendor.pagination.bootstrap-4') }}
  </div>
@endsection
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