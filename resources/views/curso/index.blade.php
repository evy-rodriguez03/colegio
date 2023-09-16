@extends('layout.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="mb-0">Cursos</h2>
            </div>
            <div class="col text-right">
                <a href="{{ route('cursos.create') }}" class="btn btn-lg btn-primary">Nuevo Curso</a>
                <a href="{{ route('cursos.pdf') }}" class="btn btn-lg btn-primary">Reporte Curso</a>
            </div>
        </div>
    </div>
    @if (session('notification'))
    <div class="card-body">
        <div class="alert alert-success" role="alert">
            {{ session('notification') }}
        </div>
    </div>
    @endif
    <div class="table-responsive-sm container"> <!-- Agregado el padding en todos los lados -->
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Grado</th>
                    <th scope="col">Modalidad</th>
                    <th scope="col">Jornada</th>
                    <th scope="col">seccion</th>
                    <th scope="col">horario</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->niveleducativo }}</td>
                    <td>{{ $curso->modalidad }}</td>
                    <td>{{ $curso->jornada }}</td>
                    <td>{{ $curso->seccion }}</td>
                    <td>{{ $curso->horario }}</td>
                    <td>
                        <form id="deleteCurso{{ $curso->id }}" action="{{ route('cursos.destroy', $curso->id) }}" method="POST">
                            <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            @csrf
                            @method('DELETE')
                            @if ($curso->alumnos->isEmpty())
                            <button type="submit" class="btn btn-sm btn-danger" onclick="confirmDelete(event, {{ $curso->id }})">Eliminar</button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.all.min.js"></script>
<script>
    function confirmDelete(event, courseId) {
        event.preventDefault(); // Prevenir el envío del formulario

        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción no se puede deshacer',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviar el formulario de eliminación
                document.getElementById('deleteCurso' + courseId).submit();
            }
        });
    }
</script>
@endsection
