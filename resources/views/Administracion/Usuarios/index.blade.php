@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Usuarios</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('usuarios.create')}}" class="btn btn-sm btn-primary">Nuevo Usuario</a>
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
            <th scope="col">Correo</th>
            <th scope="col">Rol</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($usuarios as $index=> $usuario)
              
          
          <tr>
            <td scope="row">
             {{$index + 1}}
            </td>
            <th scope="row">
              {{$usuario->name}}
            </th>
            <td>
              {{$usuario->email}}
            </td>
           <td>
            {{$usuario->role}}
           </td>
           <td>
            
            <form action="{{url('/usuarios/'.$usuario->id)}}" method="POST" class="formulario-eliminar">
              @csrf
              @method('DELETE')
              <a href="{{url('/usuarios/'.$usuario->id.'/edit')}}" class="btn btn-sm bt-primary">Editar</a>
              <button type="submit" class="btn btn-outline-light text-dark">Eliminar</button>
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
      'El usuario ha sido borrado exitosamente.',
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