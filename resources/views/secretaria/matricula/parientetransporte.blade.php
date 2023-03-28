@extends('layout.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Parientes que viven en la misma residencia del alumno(a)</h3>
        </div>
        <div class="col text-right">
          <a href="{{Route('dashboardsec.index')}}" class="btn btn-lg btn-success">
            <i class="fas fa-angle-left"></i>Regresar</a>
        </div>
      </div>
    </div>
    <div class="card-body">
    @if ($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>¡Por favor!</strong> {{$error}}
        </div>
          @endforeach
      @endif
    <!-- Formulario para crear -->
    <div class="card-body">
              <form method="=get"> 
              <div class="input-group mb-3">
</div>
<div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="nombre">Nombre completo</label>
              <input type="text" class="form-control" name="primernombre" placeholder="Nombre completo" required>
              <div class="valid-feedback"></div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="parentesco">Parentesco</label>
              <input type="text" class="form-control" name="Parentesco" placeholder="parentesco" required>
              <div class="valid-feedback">Looks good!</div>
          </div>
          <div class="col-md-4 mb-3">
              <label for="edad">Edad</label>
              <input type="" class="form-control" name="edad"  placeholder="Edad" required>
              <div class="valid-feedback">Looks good!</div>
          </div>
          <br>
          <div class="col-md-4 mb-3">
              <input type="text" class="form-control" name="primernombre1" placeholder="Nombre completo" required>
              <div class="valid-feedback"></div>
          </div>
          <br>
          <div class="col-md-4 mb-3">
              <input type="text" class="form-control" name="parentesco1" placeholder="Parentesco" required>
              <div class="valid-feedback"></div>
          </div>
          <br>
          <div class="col-md-4 mb-3">
              <input type="text" class="form-control" name="edad1" placeholder="Edad" required>
              <div class="valid-feedback"></div>
          </div>
      </div>
    </div>
  </div>
</form>
<br>
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Como viaja su hijo</h3>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">

</form>
            <br>
    <table class="table table-bordered">
    <tr>
      <th scope="row">Bus</th>
      <th scope="col"><center><input type="checkbox" name="bus" value="1"></center></th>
    </tr>
  <tbody>
    <tr>
      <th scope="row">Taxi</th>
      <td><center><input type="checkbox" name="taxi" value="2"></center></td>
    </tr>
    <tr>
      <th scope="row">Con padre</th>
      <td><center><input type="checkbox" name="conelpadre" value="1"></center></td>
    </tr>
    <tr>
      <th scope="row">Solo</th>
      <td><center><input type="checkbox" name="solo" value="1"></center></td>
    </tr>

  </tbody>
</table>
<br>
<br>
<button a href="{{Route('datosencargado.create')}}" class="btn btn-primary btn-lg" type="submit">guardar</button>
    </div>
  </div>
</form>

@endsection