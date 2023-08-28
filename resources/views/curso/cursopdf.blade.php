<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> PDF Cursos</title>
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

    body {
  text-align: center;
   }
   table {
  margin: auto;
}

    </style>
</head>
<body>
<center><img src="{{asset('img/brand/blue.png') }}" class="card-img-top" alt="..." style="width:70px;height:70px;"></center>
<center><h4>Instituto Cosmer Garcia C.</h4></center>  
<center><h1>Cursos</h1></center>
<table class="table table-bordered" style="text-align: center; font-size: 20px";> 
        <thead class="cabecera">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Curso</th>
            <th scope="col">Nivel Educativo</th>
            <th scope="col">Horario</th>
            
          </tr>
        </thead>

        <tbody>
        @foreach ($cursos as $curso)
        <tr>
             <td>{{$curso->id}}</td>
             <td>{{$curso->niveleducativo}}</td>
             <td>{{$curso->seccion}}</td>
             <td>{{$curso->horario}}</td>
      
        </tr>
        
        
           @endforeach
        </tbody>
      </table>
    
    
</body>
</html>