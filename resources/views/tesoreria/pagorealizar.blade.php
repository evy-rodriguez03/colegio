@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Pago a Realizar</h3>
        </div>
        <div class="col text-right">
          <a href="{{Route('paneltesoreria.index')}}" class="btn btn-lg btn-success">
            <i class="fas fa-angle-left"></i>Regresar</a>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">
  <form method="=get"> 
    <div class="input-group mb-3">
  <input type="text" name="search" class="form-control" placeholder="Buscar Alumno">
  <button class="btn btn-outline-primary" type="submit">Buscar</button>
</div>
<div class="card-body">
    @if (session('success'))
     <div class="alert alert-success" role="success">
      {{session('success')}}
  </div>
  @endif
 </form>
            <br>
    <table class="table table-bordered">
    <tr>
      <th scope="row">Mensualidad</th>
      <th scope="col"><center><input type="checkbox" name="mensualidad" value="1"></center></th>
    </tr>
  <tbody>
    <tr>
      <th scope="row">Gastos administrativos</th>
      <td><center><input type="checkbox" name="gastosadministrativos" value="2"></center></td>
    </tr>
    <tr>
      <th scope="row">Bolsa escolar</th>
      <td><center><input type="checkbox" name="bolsaescolar" value="1"></center></td>
    </tr>

  </tbody>
</table>
<br>
<br>
<button type="submit"class="btn btn-primary btn-lg">Guardar</button>
    </div>
  </div>
</form>
@endsection



