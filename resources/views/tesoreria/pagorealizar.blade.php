@extends('layout.panel')


@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="pagorealizar.style.css">


<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Pago a Realizar</h3>
        </div>
        <div class="col text-right">
          <a href="{{Route('paneltesoreria.index')}}" class="btn btn-sm btn-success">
            <i class="fas fa-angle-left"></i>Regresar</a>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">
        <form action="">
            <div class="from-group"> 
               <label for="name">Alumno</label>
                <a href="{{Route('alumnos.index')}}"> 
	         	<input type="text" placeholder="">
		         <div class="btn"> <i class="fa fa-search"> buscar</i></a>
            </div>
           	</div>

            <br>
            <div class="form-group">
                <label for="name">Mensualidad</label>
                <input type="checkbox" name="mensualidad" value="1">
            </div>

            <div class="form-group">
                <label for="name">Gastos Administrativos</label>
                <input type="checkbox" name="name2" value="2">
            </div>
            <div class="form-group">
                <label for="name">Bolsa Escolar</label>
                <input type="checkbox" name="name3" value="3">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Generar monto</button>
            <button type="submit" class="btn btn-sm btn-primary">Pago clase retrasada</button>
        </form>
    </div>
  </div>
</head>
  </html>
@endsection