@extends('layout.panel')


@section('styles')

@endsection()
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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
    <div class="input-group mb-2">
 
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
      <th scope="row"><center>Tipo de pago</center></th>
      <th scope="col"><center>Pago / Estado</center></th>
      <th scope="row"><center>Monto</center></th>
    </tr>
    <tr>
      <th scope="row">Mensualidad</th>
      <th scope="col"><center><table>
  <tr>
    <td>
      <input type="checkbox" onclick="mostrarMensaje(this)">
    </td>
    <td id="mensaje1"></td>
  </tr>
  <script>
function mostrarMensaje(checkbox) {
  var mensaje = checkbox.parentNode.nextElementSibling;
  if (checkbox.checked) {
    mensaje.innerHTML = "Pagado";
  } else {
    mensaje.innerHTML = "";
  }
}
</script>
</table></center></th>
      <th scope="row"></th>
    </tr>
  <tbody>
    <tr>
      <th scope="row">Gastos administrativos</th>
      <td><center><input type="checkbox" name="gastosadministrativos" value="2"></center></td>
      <th scope="row"></th>
     
    </tr>
    <tr>
      <th scope="row">Bolsa escolar</th>
      <td><center><input type="checkbox" name="bolsaescolar" value="3"></center></td>
      <th scope="row"></th>
    </tr>
   

  </tbody>
</table>



<br>
<button type="submit"class="btn btn-primary btn-lg">Guardar</button>
    </div>
  </div>
</form>
@endsection

@section('scrips')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection



