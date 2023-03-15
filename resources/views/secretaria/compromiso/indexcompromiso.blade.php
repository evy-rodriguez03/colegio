@extends('layout.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Compromiso</h3>
        </div>
        <div class="col text-right">
          <a href="{{Route('dashboardsec.index')}}" class="btn btn-lg btn-success">
            <i class="fas fa-angle-left"></i>Regresar</a>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">
              <form method="=get"> 
              <div class="input-group mb-3">
</div>
 </form>
            <br>
    <table class="table table-bordered">
    <tr>
      <th scope="row">Nombre padre</th>
      <th scope="col"><center>Compromiso</center></th>
    </tr>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td><center><input type="checkbox" value="1"></center></td>
    </tr>
    

  </tbody>
</table>
<br>
<br>
    </div>
  </div>
</form>

@endsection