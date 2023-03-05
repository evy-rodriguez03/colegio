@extends('layout.panel')

@section('title', 'Home')

@section('content')
<div>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/personall.jpg') }}" class="card-img-top" alt="..." style="width:120px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{Route('usuarios.index')}}" class="btn btn-lg btn-info">Personal</a></center>
          
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/cursototal.png') }}" class="card-img-top" alt="..." style="width:120px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{url('/usuarios/crear')}}" class="btn btn-lg btn-info">Curso Totales</a></center>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/periodomatricula.jpg') }}" class="card-img-top" alt="..." style="width:120px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{route ('periodo')}}" class="btn btn-lg btn-info">Periodo Matricula</a></center>
           
        </div>
      </div>
    </div>
    
  </div>
  
</div>

<hr>

@if(isset($alumnosPorMes) && !$alumnosPorMes->isEmpty())
<div class="table-responsive tabla-alumnos-mes tabla-dashboard">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Mes y año</th>
        <th>Cantidad de alumnos</th>
      </tr>
    </thead>
    <tbody>
      @foreach($alumnosPorMes as $alumno)
        <tr>
          <td>{{ $alumno->month }} {{ $alumno->year }}</td>
          <td>{{ $alumno->total }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{ $alumnosPorMes->links() }}
  </div>
</div>
<hr>
<div>
  <canvas id="alumnosPorDia"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0"></script>
<script>
  var ctx = document.getElementById('alumnosPorDia').getContext('2d');
  var chart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: {!! json_encode($alumnosPorDia['fechas']) !!},
          datasets: [{
              label: 'Nuevos alumnos por día',
              data: {!! json_encode($alumnosPorDia['cantidades']) !!},
              borderWidth: 1,
              borderColor: 'blue',
              backgroundColor: 'lightblue',
              fill: true,
          }]
      },
      options: {
          responsive: true,
          maintainAspectRatio: false,
      }
  });
</script>

<hr>


<div>
  <canvas id="alumnosPorMes"></canvas>
</div>
<script>
  var ctx = document.getElementById('alumnosPorMes').getContext('2d'); // especifica el canvas correspondiente
  var chart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: {!! json_encode($alumnosPorMes->pluck('month')) !!},
          datasets: [{
              label: 'Nuevos alumnos por mes',
              data: {!! json_encode($alumnosPorMes->pluck('total')) !!},
              borderWidth: 1,
              backgroundColor: 'lightblue',
              borderColor: 'blue',
          }]
      },
      options: {
          responsive: true,
          maintainAspectRatio: false,
      }
  });
</script>


@endif
@endSection
