<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> PDF Padres</title>
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
<center><h4>Instituto Cosmer Garcia C.</h4></center>  
<center><h1>Padres</h1></center>
<table class="table table-bordered" style="text-align: center; font-size: 15px";> 
        <thead class="cabecera">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Número de Identidad</th>
            <th scope="col">Teléfono Personal</th>
            <th scope="col">Teléfono de Oficina</th>
          </tr>
        </thead>
        <tbody>  
          @foreach ($padres as $index=> $padre)
              
          <tr>
            <th scope="row">
             {{$index + 1}}
            </th>
            <td>
              {{$padre->primernombre}} {{$padre->primerapellido}}
            </td>
            <td>
              {{$padre->numerodeidentidad}}
            </td>
            <td>
              {{$padre->telefonopersonal}}
            </td>
            <td>
              {{$padre->telefonooficina}}
            </td>

           @endforeach
          </tr>
        </tbody>
      </table>
    
    
</body>
</html>