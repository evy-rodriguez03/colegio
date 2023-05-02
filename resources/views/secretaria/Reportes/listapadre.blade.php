<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> PDF Reportes Alumnos</title>
    <style>
        .cabecera{
            color: black;}

        .h1{
            color: black; }
            table {
        border-collapse: collapse;
        margin: auto;
    }
    td, th {
        border: 1px solid black;
        padding: 5px;
    }

    </style>
</head>
<body>
<center><img src="{{asset('img/brand/blue.png') }}" class="card-img-top" alt="..." style="width:70px;height:70px;"></center>
<center><h4>INSTITUTO "COSME GARCIA C".</h4>
<h3>MATRICULA CORRESPONDIENTE AL AÑO {{ date('Y') }}</h3></center>  
<table class="table table-bordered" style="text-align: center; font-size: 15px";> 
        <thead class="cabecera">
          <tr>
            <th scope="row">N°</th>
            <th scope="row">Nombre Del Alumno</th>
            <th scope="row">Padre o Encargado</th>
            <th scope="row">Parentesco</th>
            <th scope="row">Fecha de Nacimiento</th>
            <th scope="row">N° de Identidad</th>
            <th scope="row">N° de Telefono</th>
            <th scope="row">Dirección</th>
            <th scope="row">Firma</th>
            <th scope="row">Curso</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($alumnos as $index => $alumno)
      <tr>
        <td>{{ $index + 0 }}</td>
        <td>{{ $alumno->primernombre }} {{ $alumno->segundonombre }} {{ $alumno->primerapellido }} {{ $alumno->segundoapellido }}</td>
        <td>
          @foreach($padres as $padre)
          <td>{{$padre->primernombre}} {{$padre->primerapellido}}</td>
          <td>{{$padre->tipo}}</td>
          <td>{{$padre->direccion}}</td>
          <td>{{$padre->numerodeidentidad}}</td>
          <td>{{$padre->telefonopersonal}}</td>
          @endforeach
        </td>
        
      </tr>
      @endforeach
        </tbody>
      </table>
</body>
</html>