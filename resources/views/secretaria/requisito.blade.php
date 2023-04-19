@extends('layout.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Requisitos</h1>
            </div>
            <div class="col text-right">
            <a href="{{route('dashboardsec.index')}}" class="btn btn-lg btn-success">
                <i class="fas fa-angle-left"></i>
                Regresar</a>
            </div>
        </div>
       </div>
       

    <div class="card-body">
    <h2 class="text">Datos Recibidos</h2>

    <div id="chartContainer" style= "width: 500px; height: 500px;">
        <canvas id="grafica"></canvas>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
    <script>
  const ctx = document.getElementById('grafica');
  var datosGrafica = {!! json_encode($jsonDatos) !!};
  datosGrafica = JSON.parse(datosGrafica);
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Fotografias Alumno', 'Fotografias Padre', 'Carnet Vacunacion', 'Certificado de Conducta'],
      datasets: [{
        label: 'Total',
        data: [datosGrafica.fotoa, datosGrafica.fotop, datosGrafica.carnet, datosGrafica.certi],
        borderWidth: 4
      }]
    },
    options: {
            scales: {
            }
    }
  });
</script>
@endsection