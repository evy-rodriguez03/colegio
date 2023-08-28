<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PDF Reportes Proceso Matricula</title>
    <style>
        .cabecera {
            color: black;
        }

        .h1 {
            color: black;
        }

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
<center><img src="{{ asset('img/brand/blue.png') }}" class="card-img-top" alt="..."
             style="width:70px;height:70px;"></center>
<center>
    <h4>INSTITUTO "COSME GARCIA C".</h4>
    <h3>PROCESO DE MATRICULA CORRESPONDIENTE AL AÑO {{ date('Y') }}</h3>
</center>
<table class="table table-bordered" style="text-align: center; font-size: 15px;">
    <thead class="cabecera">
    <tr>
                <th scope="row">Nº</th>
                <th scope="row">Nombre</th>
                <th scope="row">Identidad</th>
                <th scope="col">Secretaria</th>
                <th scope="col">Orientaciòn</th>
                <th scope="col">Consejeria</th>
                <th scope="col">Teroreria</th>
                <th scope="col">Secretaria</th>
            </tr>
        </thead>
       <tbody>
       @foreach ($alumnos as $vistaconsejeria)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $vistaconsejeria->primernombre }} {{ $vistaconsejeria->segundonombre }} {{ $vistaconsejeria->primerapellido }} {{ $vistaconsejeria->segundoapellido }}</td>
        <td>{{ $vistaconsejeria->numerodeidentidad }}</td>
        @if (isset($consejerias[$vistaconsejeria->id]))
        <td>{{ $consejerias[$vistaconsejeria->id]->secretaria ? 'Completado' : 'Pendiente' }}</td>
        <td>{{ $consejerias[$vistaconsejeria->id]->orientacion ? 'Completado' : 'Pendiente' }}</td>
        <td>{{ $consejerias[$vistaconsejeria->id]->consej ? 'Completado' : 'Pendiente' }}</td>
        <td>{{ $consejerias[$vistaconsejeria->id]->tesoreria ? 'Completado' : 'Pendiente' }}</td>
        <td>{{ $consejerias[$vistaconsejeria->id]->secultimo ? 'Completado' : 'Pendiente' }}</td>
        @else
        <td>Pendiente</td>
        <td>Pendiente</td>
        <td>Pendiente</td>
        <td>Pendiente</td>
        <td>Pendiente</td>
        @endif
    </tr>
    @endforeach
</tbody>
    </table>
</html>
