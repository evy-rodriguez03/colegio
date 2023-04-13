@extends('layout.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="mb-0">Requisitos</h1>
                </div>
                <div class="col text-right">
                    <a href="{{route('dashboardsec.index')}}" class="btn btn-sm btn-success">
                        <i class="fas fa-angle-left"></i>
                        Regresar
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <h2 class="text">Datos Recibidos</h2>

            <!-- Aquí se mostrará la gráfica -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="grafica"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Cargar las librerías de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Obtener los datos de la base de datos
        var datos = <?php echo json_encode($graficaDatos); ?>;
            .then(response => response.json())
            .then(data => {
                // Crear la gráfica con los datos
                var ctx = document.getElementById('grafica').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Fotografía', 'Fotografía Padre', 'Fotografía Carnet Vacuna', 'Certificado de Conducta'],
                        datasets: [{
                            label: 'Número de estudiantes',
                            data: [
                                data.fotografia,
                                data.fotografia_padre,
                                data.fotografia_carnet,
                                data.certificado_conducta
                            ],
                            backgroundColor: [
                                '#3366CC',
                                '#DC3912',
                                '#FF9900',
                                '#109618'
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Documentos proporcionados por los estudiantes'
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            });
    </script>

@endsection