@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h1 class="mb-0">Padres</h1>
        </div>
        <div class="col text-right">
          <a href="{{route('padres.create')}}" class="btn btn-lg btn-primary">Nuevo Padre</a>
          <a href="{{route('padre.pdf')}}" class="btn btn-lg btn-primary">Documento Padre</a>
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
            <th scope="col">Número de Identidad</th>
            <th scope="col">Teléfono Personal</th>
            <th scope="col">Teléfono de Oficina</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>  
          @foreach ($padres as $index=> $padre)
              
          <tr>
            <th scope="row">
             {{$index + 1}}
            </th>
            <td>
              {{$padre->primernombre}} {{$padre->primerapellido}}
            </td>
            <td>
              {{$padre->numerodeidentidad}}
            </td>
            <td>
              {{$padre->telefonopersonal}}
            </td>
            <td>
              {{$padre->telefonooficina}}
            </td>
           <td>
            
            <form action="{{url('/padres/'.$padre->id)}}" method="POST" class="formulario-eliminar">
              @csrf
              @method('DELETE')
              <a href="{{url('/padres/'.$padre->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
              <a href="{{route('padre.show', ['id'=> $padre -> id])}}" class="btn btn-sm btn-info">Ver</a>
              <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
            
           </td>
           @endforeach
          </tr>
        </tbody>
      </table>
    </div>
    <!--{{$padres->links()}} -->
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