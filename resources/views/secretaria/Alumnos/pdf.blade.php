<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PDF Alumnos</title>
    <style>
        .cabecera {
            color: black;
        }

        .h1 {
            color: black;
        }

        table {
            margin: auto;
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
<center><img src="{{ asset('img/brand/blue.png') }}" class="card-img-top" alt="..." style="width:70px;height:70px;"></center>
<center><h4>Instituto Cosmer Garcia C.</h4></center>
<center><h1>Alumnos</h1></center>
<table class="table table-bordered" style="text-align: center; font-size: 15px;">
    <thead class="cabecera">
    <tr>
        <th scope="row">N°</th>
        <th scope="row">Nombre</th>
        <th scope="row">Número de identidad</th>
        <th scope="row">Grado</th>
        <th scope="row">Sección</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($alumnos as $index => $alumno)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $alumno->primernombre }} {{ $alumno->segundonombre }} {{ $alumno->primerapellido }} {{ $alumno->segundoapellido }}</td>
        <td>{{ $alumno->numerodeidentidad }}</td>
        <td>
    @if ($alumno->curso)
        {{ $alumno->niveleducativo }}
    @else
        Sin Grado
    @endif
</td>
        <td>{{ $alumno->seccion }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
