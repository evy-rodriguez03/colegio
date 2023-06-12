@extends('layout.panel')

@section('css')
<link rel="stylesheet" href="{{ asset('Datatables/datatables.min.css') }}">
<style>
    .small-select {
        width: 200px;
        /* Otros estilos personalizados */
    }
</style>
@endsection
@section('js')
<script src="{{asset('Datatables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#matricula').DataTable();
    });
</script>
@endsection

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Matriculados</h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('creatematricula') }}" class="btn btn-sm btn-primary">Nueva Matricula</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if (session('notification'))
        <div class="alert alert-success" role="alert">
            {{ session('notification') }}
        </div>
        @endif
    </div>
   
    <div class="table-responsive">
        <!-- Projects table -->
        <table id="matricula" class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">N° de Identidad</th>
                    <th scope="col">Grado</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @if ($alumnos)
                @foreach ($alumnos->items() as $index => $alumno)
                <tr>
                    <td scope="row">
                        {{ $index + 1 }}
                    </td>
                    <th scope="row">
                        {{ $alumno->primernombre }} {{ $alumno->primerapellido }}
                    </th>
                    <td>
                        {{ $alumno->numerodeidentidad }}
                    </td>
                    <td>
                        @foreach ($alumno->cursos as $curso)
                           {{ $curso->niveleducativo }} {{ $curso->modalidad }}
                         @endforeach
                    </td>
                    <td>
                        <form action="{{ url('/alumnos/'.$alumno->id) }}" method="POST" class="form-eliminaralumno">
                            @csrf
                            @method('DELETE')
                            <a href="{{ url('/alumnos/'.$alumno->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ url('/alumnos/'.$alumno->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                        @php
                            $proce = App\Models\Proceso::where('id','=',$alumno->id)->get();
                        @endphp
                        @if(count($proce) > 0)
                            <a class="btn btn-warning" href="{{ route('creatematricula', ['id' => $alumno->id]) }}">Continuar Matricula</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="form-group">
        <label for="periodo">Periodo:</label>
        <select id="periodo" class="form-control small-select">
            <option value="">Todos</option>
            @foreach ($alumnos as $alumno)
                @foreach ($alumno->periodos as $periodo)
                    <option value="{{ $periodo->id }}">{{ $periodo->periodoMatricula }}</option>
                @endforeach
            @endforeach
        </select>
    </div>
    
</div>

@endsection




@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




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
