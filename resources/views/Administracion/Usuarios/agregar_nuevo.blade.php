<?php
use Illuminate\Support\Str;
?>

@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Agregar Nuevo Personal</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('usuarios.index')}}" class="btn btn-sm btn-success">
            <i class="fas fa-angle-left"></i>
            Regresar</a>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">

      @if ($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>¡Porfavor!</strong> {{$error}}
        </div>
          @endforeach
      @endif
        <form action="{{route('usuarios.index')}}" method="POST">
          @csrf
            <div class="form-group">
                <label for="name">Nombre del Usuario</label>
                <input type="text" name="name" class="form-control" required value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="email">Correo Electronico</label>
                <input type="text" name="email" class="form-control" required value="{{old('email')}}">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" name="password" class="form-control" required value="{{old('password', str::random(8))}}">
            </div>
            <div class="form-group">
                <label for="role">Cargo</label>
                <select class="form-control" name="role" required value="{{old('role')}}">
                  <option value="">Elegir</option>
                  <option value="1">Admin</option>
                 <option value="2">Secretaria</option>
                 <option value="3">Tesoreria</option>
                 <option value="4">Orientación</option>
                 <option value="5">Consejeria</option>
               </select>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
        </form>
    </div>
  </div>
@endsection