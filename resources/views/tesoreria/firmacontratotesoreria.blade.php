@extends('layout.panel')

@section('content')
<div class="card shadow m-3"> <!-- Agregado el margen en todos los lados -->
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="mb-0">Firma de Contrato</h2>
            </div>
            <div class="col text-right">
                <a href="{{ Route('paneltesoreria.index') }}" class="btn btn-lg btn-success">
                    <i class="fas fa-angle-left"></i>
                    Regresar
                </a>
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
        <form action="{{ route('firmacontratotesoreria.store') }}" method="POST">
            @csrf
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombre del Padre</th>
                        <th scope="col">Firma del contrato</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($padres as $index => $padre)
                    <tr>
                        <input name='id_padre[]' value="{{ $padre->id }}" type="text" style="display: none">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $padre->primernombre }} {{ $padre->primerapellido }}</td>
                        <td>
                            <input type="checkbox" name="contrato[]" value="1" @if (isset($padre->firmacontrato[0]))
                            @if($padre->firmacontrato[0]->contrato)
                            checked
                            @endif
                            @endif> Firmo el contrato
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <br>
            <div class="col text-left">
                <button class="btn btn-primary btn-lg" type="submit">Aceptar</button>
            </div>
        </form>
    </div>
</div>
@endsection
