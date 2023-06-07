@extends('layout.panel')

@section('title', 'Home')

@section('content')

@can('dashboard.index')
    <!-- código HTML de la vista de inicio -->
@endcan

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
          <center><a href="{{Route('cursostotales.index')}}" class="btn btn-lg btn-info">Curso Totales</a></center>
          
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
      <center><img src="{{asset('img/brand/periodomatricula.jpg') }}" class="card-img-top" alt="..." style="width:120px;height:120px;"></center>
        <div class="card-body">
          <center><a href="{{route ('periodo')}}" class="btn btn-lg btn-info">Matricula</a></center>
           
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
<div>
  <canvas id="alumnosPorDia"></canvas>
</div>

<!-- grafica por mes -->
<div class="card bg-gradient-default shadow">
  <div class="card-header bg-transparent">
      <div class="row align-items-center">
          <div class="col">
              <h6 class="text-uppercase text-light ls-1 mb-1">Grafica</h6>
              <h2 class="text-white mb-0">Alumnos por mes</h2>
          </div>
      </div>
  </div>
  <div class="card-body">
      <!-- Chart -->
      <div class="chart">
          <!-- Chart wrapper -->
          <canvas id="chart-alumnos-por-mes" class="chart-canvas"></canvas>
      </div>
  </div>
</div>
<hr>
 <!-- grafica por dia --> 
<div class="card bg-gradient-default shadow">
  <div class="card-header bg-transparent">
      <div class="row align-items-center">
          <div class="col">
              <h6 class="text-uppercase text-light ls-1 mb-1">Grafica</h6>
              <h2 class="text-white mb-0">Alumnos por día</h2>
          </div>
      </div>
  </div>
  <div class="card-body">
      <!-- Chart -->
      <div class="chart">
          <!-- Chart wrapper -->
          <canvas id="chart-alumnos-por-dia" class="chart-canvas"></canvas>
      </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctx = document.getElementById('chart-alumnos-por-mes').getContext('2d');
  var chart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: {!! $alumnosPorMes->pluck('month') !!},
          datasets: [{
              label: 'Cantidad de alumnos',
              data: {!! $alumnosPorMes->pluck('total') !!},
              backgroundColor: '#4e73df'
          }]
      },
      options: {
          maintainAspectRatio: false,
          legend: {
              display: false
          },
          scales: {
              xAxes: [{
                  gridLines: {
                      display: false
                  }
              }],
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  },
                  gridLines: {
                      color: "rgba(0, 0, 0, 0.1)",
                  }
              }]
          }
      }
  });
</script>



<script>
    var ctx = document.getElementById('chart-alumnos-por-dia').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: {!! json_encode($alumnosPorDia['fechas']) !!},
            datasets: [{
                label: 'Alumnos por día',
                backgroundColor: 'rgba(255, 255, 255, 0)',
                borderColor: 'rgb(255, 255, 255)',
                data: {!! json_encode($alumnosPorDia['cantidades']) !!}
            }]
        },

        // Configuration options go here
        options: {}
    });
</script>

@endif

@endSection
