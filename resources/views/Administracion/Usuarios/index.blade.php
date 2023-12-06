@extends('layout.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Usuarios</h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('usuarios.create') }}" class="btn btn-sm btn-primary">Nuevo Usuario</a>
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
    <div class="table-responsive-sm container p-3"> <!-- Agregado el padding en todos los lados -->
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
                @foreach ($usuarios as $index => $usuario)
                <tr>
                    <td scope="row">
                        {{ $index + 1 }}
                    </td>
                    <th scope="row">
                        {{ $usuario->name }}
                    </th>
                    <td>
                        {{ $usuario->email }}
                    </td>
                    <td>
                        {{ $usuario->getRoleNames()->first() }}
                    </td>
                    <td>
                        @if ($usuario->activo)
                        <form action="{{ url('/usuarios/'.$usuario->id.'/deshabilitar') }}" method="POST" class="formulario-eliminar">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-danger">Deshabilitar</button>
                        </form>
                        @else
                        <form action="{{ route('usuarios.habilitar', $usuario->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <a href="{{ url('/usuarios/'.$usuario->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                            <button type="submit" class="btn btn-sm btn-success">Habilitar</button>
                        </form>
                        @endif
                    </td>
                </tr>
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
        'success'
    )
</script>
@endif

<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Está seguro?',
            text: '¡Si deshabilita este usuario, podrá volver a habilitarlo después!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, deshabilítalo'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
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
    });
</script>
@endif
@endsection
