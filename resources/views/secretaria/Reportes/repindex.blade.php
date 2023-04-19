@extends('layout.panel')

@section('content')



<div class="card shadow">
        <div class="card-header border-0">
        <div class="col">
                    <h1 class="mb-0">Reportes de Matricula</h1>
                    <br>
                </div>
            <div class="row align-items-center">
                
                
                <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/reporte2.png') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{route('repadre.pdf')}}" class="btn btn-lg btn-info">Reporte de Padres </a></center>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/reporte.png') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
        <div class="card-body">
      <center><a href="{{route('repalumno.pdf')}}" class="btn btn-lg btn-info">Reporte de Alumnos </a></center>
        </div>
      </div>
    </div>

       </div>
        </div>

        @endsection