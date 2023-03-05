@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Nuevo ejemplo</h3>
        </div>
        <div class="col text-right">
          <a href="{{url('#')}}" class="btn btn-sm btn-success">
            <i class="fas fa-angle-left"></i>
            Regresar</a>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">
        <form action="">
            <div class="form-group">
                <label for="name">ejemplo</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="name2">ejemplo2</label>
                <input type="text" name="name2" class="form-control">
            </div>
            <button type="submit" class="btn btn-sm btn-primary"></button>
        </form>
    </div>
  </div>
@endsection