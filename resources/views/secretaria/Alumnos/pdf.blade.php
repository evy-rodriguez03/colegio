<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> PDF Alumnos</title>
    <style>
        .cabecera{

            background-color: black;
            color: floralwhite;
        }

        .h1{
            color: black;
        }
    </style>
</head>
<body>
<center><img src="{{asset('img/brand/blue.png') }}" class="card-img-top" alt="..." style="width:70px;height:70px;"></center>
<center><h4>Instituto Cosmer Garcia C.</h4></center>  
<center><h1>Alumnos</h1></center>
<table class="table" style="text-align: center; font-size: 15px;"> 
        <thead class="cabecera">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Número de identidad</th>
            <th scope="col">Telefono de encargado</th>
            <th scope="col">Grado</th>
            <th scope="col">Sección</th>
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
           <td>
            
            
           </td>
           @endforeach
        </tbody>
      </table>
    
    
</body>
</html>