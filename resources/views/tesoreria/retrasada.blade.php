@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h1 class="mb-0">Clases Retrasadas</h1>
        </div>
        <div class="col text-right">
          <a href="{{route('retrasadas.create')}}" class="btn btn-lg btn-primary">Nuevo Alumno</a>
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
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Materia</th>
            <th scope="col">Total a Pagar</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>  
          @foreach ($retrasadas as $index=> $retrasada)
              
          <tr>
            <th scope="row">
             {{$index + 1}}
            </th>
            <td>
              {{$retrasada->primernombre}} {{$retrasada->primerapellido}}
            </td>
            <td>
              {{$retrasada->materiaretrasada}}
            </td>
            <td>
              {{$retrasada->total}}
            </td>
            <td>
            <form action="{{url('/retrasadas/'.$retrasada->id)}}" method="POST" class="formulario-eliminar">
              @csrf
              @method('DELETE')
              <a href="{{url('/retrasadas/'.$retrasada->id.'/edit')}}" class="btn btn-sm bt-primary">Editar</a>
              <button type="submit" class="btn btn-sm bt-danger">Eliminar</button>
            </form>
            </td>
           @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('eliminar') == 'ok')
        <script> 
        Swal.fire(
      '¡Borrado!',
      'El alumno ha sido borrado exitosamente.',
      'Éxito'
    )
    
        </script>

  
@endif

<script>

  $('.formulario-eliminar').submit(function(e){
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