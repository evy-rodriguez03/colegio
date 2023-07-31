@extends('layout.panel')

@section('css')
<link rel="stylesheet" href="{{ asset('Datatables/datatables.min.css') }}">
<link href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet"/>

<style>
    .small-select {
        width: 200px;
        /* Otros estilos personalizados */
    }
</style>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#periodo').DataTable({
            lengthMenu: [3, 6, 9, 12],
        });

    });
</script>
@endsection

@section('content')

<!-- Tu formulario para crear un nuevo registro -->

<div class="card shadow">
    <div class="card-header border-3">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Periodo Matricula</h1>
            </div>
            <div class="col text-right">
                <a href="{{ route('dashboard.index') }}" class="btn btn-lg btn-primary">
                    <i class="fas fa-angle-left"></i>
                    Regresar
                </a>
                <a href="{{Route('inicio.create')}}" class="btn btn-lg btn-success "> Iniciar Periodo </a>
            </div>
        </div>
    </div>
    <!-- Tabla para mostrar los registros existentes -->
    <div class="card-body">
        <table id="periodo" class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <!-- Definir las columnas de la tabla -->
                    <th>Fecha de Inicio</th>
                    <th>Periodo de Matricula</th>
                    <th>Fecha de Cierre</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Recorrer los registros existentes -->
                @foreach ($periodos as $periodo)
                <tr>
                    <!-- Mostrar los valores de cada registro -->
                    <td>{{ $periodo->fechaInicio }}</td>
                    <td>{{ $periodo->periodoMatricula }}</td>
                    <td>{{ $periodo->fechaCierre }}</td>
                    <td>
                        <p>{{ $periodo->periodoMatricula }} - Estado: {{ $periodo->activo ? 'Abierto' : 'Cerrado' }}</p>
                        @if ($periodo->activo)
                            <form action="{{ route('periodo.cancelar', ['id' => $periodo->id]) }}" method="POST" id="cancelar-form-{{ $periodo->id }}">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="confirmCancelPeriod(event, {{ $periodo->id }})">Cerrar período</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.all.min.js"></script>
<script>
    function confirmCancelPeriod(event, periodoId) {
        event.preventDefault(); // Prevenir el envío del formulario

        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción cerrará el período de matrícula',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, cerrar período'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviar el formulario para cerrar el período
                document.getElementById('cancelar-form-' + periodoId).submit();
            }
        });
    }
</script>
@endsection

