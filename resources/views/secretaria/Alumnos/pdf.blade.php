<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> PDF Alumnos</title>
    <style>
        .cabecera{
            color: black;}

        .h1{
            color: black; }
            table {
        border-collapse: collapse;
    }
    td, th {
        border: 1px solid black;
        padding: 5px;
    }

    </style>
</head>
<body>
<center><img src="{{asset('img/brand/blue.png') }}" class="card-img-top" alt="..." style="width:70px;height:70px;"></center>
<center><h4>Instituto Cosmer Garcia C.</h4></center>  
<center><h1>Alumnos</h1></center>
<table class="table table-bordered" style="text-align: center; font-size: 15px";> 
        <thead class="cabecera">
          <tr>
          
            <th scope="row">Nombre</th>
            <th scope="row">Número de identidad</th>
            <th scope="row">Telefono de encargado</th>
            <th scope="row">Grado</th>
            <th scope="row">Sección</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($alumnos as $alumno)
              
          
          <tr>
            <th scope="row">
              {{$alumno->primernombre}} {{$alumno->segundonombre}} {{$alumno->primerapellido}} {{$alumno->segundoapellido}}
            </th>
            <td>
              {{$alumno->numerodeidentidad}}
            </td>
            <td>
              {{$alumno->telefonodeencargado}}
            </td>
           <td>
            <!-- grado -->
           </td>
           <td>
            <!-- sección -->
           </td>
           @endforeach
        </tbody>
      </table>
    
    
</body>
</html>