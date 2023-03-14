@extends('layout.panel')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
        <h1>Detalles de {{$padre->primernombre}} {{$padre->primerapellido}}</h1>
        </div>
        <div class="col text-right">
        <a href="{{route('padres.index')}}" class="btn btn-lg btn-success"> 
        <i class="fas fa-angle-left"></i>Regresar</a>
        </div>
      </div>
    </div>
    <div class="card-body">
<table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
          </tr>
        </thead>

        <tbody>     
        <tr>
            <th>Nombre</th>
            <td>{{$padre->primernombre}} {{$padre->primerapellido}}</td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td>{{$padre->tipo}}</td>
        </tr>
        <tr>
            <th>Número de Identidad</th>
            <td>{{$padre->numerodeidentidad}}</td>
        </tr>
        <tr>
            <th>Teléfono Personal</th>
            <td>{{$padre->telefonopersonal}}</td>
        </tr>
        <tr>
            <th>Lugar de Trabajo</th>
            <td>{{$padre->lugardetrabajo}}</td>
        </tr>
        <tr>
            <th>Oficio</th>
            <td>{{$padre->oficio}}</td>
        </tr>
        <tr>
            <th>Teléfono de Oficina</th>
            <td>{{$padre->telefonooficina}}</td>
        </tr>
        <tr>
            <th>Ingresos</th>
            <td>{{$padre->ingresos}}</td>
        </tr>
        </tbody>
        
      </table>
    
      <a  href="{{url('/padres/'.$padre->id.'/edit')}}" class="btn btn-lg btn-primary">Editar</a>
      <button type="submit" class="btn btn-lg btn-danger">Eliminar</button>
    
   
@endSection