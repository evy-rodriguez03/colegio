@extends('layout.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Pago a Realizar</h3>
        </div>
        <div class="col text-right">
          <a href="{{Route('vistapago.index')}}" class="btn btn-lg btn-success">
            <i class="fas fa-angle-left"></i>Regresar</a>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">
      @if (session('notification'))
        <div class="alert alert-success" role="alert">
          {{ session('notification') }}
        </div>
      @endif

      <form action ="{{ route('pagorealizar.store')}}" method="POST">
        @csrf <!-- Agrega el token CSRF para proteger el formulario -->
        <table class="table table-bordered">
          <tr>
            <th scope="row">Mensualidad</th>
            <th scope="col"><center><input type="checkbox" name="mensualidad" value="1"></center></th>
          </tr>
          <tbody>
            <tr>
              <th scope="row">Gastos administrativos</th>
              <td><center><input type="checkbox" name="pagosadministrativos" value="1"></center></td>
            </tr>
            <tr>
              <th scope="row">Bolsa escolar</th>
              <td><center><input type="checkbox" name="bolsaescolar" value="1"></center></td>
            </tr>
          </tbody>
        </table>
        <br>
        <br>
        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
      </form>
    </div>
  </div>
@endsection
