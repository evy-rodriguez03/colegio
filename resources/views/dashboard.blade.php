@extends('layout.panel')

@section('title', 'Gráficas de Alumnos por Curso')

@section('css')
<style>
    /* Estilos para el toggle switch */
    .custom-toggle {
        /* ... (misma definición de estilos) */
    }

    .chart-container {
        position: relative;
    }

    .chart-switcher {
        /* ... (misma definición de estilos) */
    }

    .chart-switcher label {
        /* ... (misma definición de estilos) */
    }

    .chart-labels {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .chart-label-card {
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 10px;
        width: 160px;
        height: 80px;
        display: flex;
        align-items: center;
    }

    .chart-label-icon {
        /* ... (misma definición de estilos) */
        font-size: 36px;
        margin-right: 10px;
    }

    .chart-label-text {
        /* ... (misma definición de estilos) */
        font-size: 18px;
    }

    .chart-card {
        margin-left: 20px;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card shadow chart-card">
            <div class="card-body">
                <h5 class="card-title">Gráficas de Alumnos por Curso</h5>
                <div class="chart-radio-container">
                    <label class="chart-radio-button">
                        <input type="radio" name="chartType" value="porTodo" checked>
                        Por Todo
                    </label>
                    <label class="chart-radio-button">
                        <input type="radio" name="chartType" value="porDia">
                        Por Día
                    </label>
                </div>
                <div id="chartContainer" class="chart-container">
                    <canvas id="chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="chart-labels">
            <div class="card shadow chart-label-card">
            
                    <i class="fas fa-user-graduate chart-label-icon"></i>
                    <div class="chart-label-text">
                        <p class="card-text mb-0">Por Día: {{ $totalAlumnosDia }}</p>
                    </div>
                
            </div>
            <div class="card shadow chart-label-card">
                    <i class="fas fa-users chart-label-icon"></i>
                    <div class="chart-label-text">
                        <p class="card-text mb-0">{{ now()->format('d-m-Y') }}</p>
                    </div>
                
            </div>
            <div class="card shadow chart-label-card">
                    <i class="fas fa-users chart-label-icon"></i>
                    <div class="chart-label-text">
                        <p class="card-text mb-0">Total Alumnos: {{ $totalAlumnosTotal }}</p>
                    </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Enlace al archivo JavaScript de Chart.js desde el CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartContainer = document.getElementById('chartContainer');
    const chartTypeRadioButtons = document.querySelectorAll('[name="chartType"]');
    const ctx = document.getElementById('chart').getContext('2d');

    const alumnosPorCursoDia = {!! json_encode($alumnosPorCursoDia) !!};
    const alumnosPorCursoGeneral = {!! json_encode($alumnosPorCursoGeneral) !!};
    let currentData = alumnosPorCursoGeneral;

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: currentData.map(data => data.nombre_curso),
            datasets: [{
                label: 'Alumnos',
                data: currentData.map(data => data.cantidad_alumnos),
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    chartTypeRadioButtons.forEach(radioButton => {
        radioButton.addEventListener('change', () => {
            if (radioButton.value === 'porTodo') {
                currentData = alumnosPorCursoGeneral;
            } else if (radioButton.value === 'porDia') {
                currentData = alumnosPorCursoDia;
            }

            chart.data.labels = currentData.map(data => data.nombre_curso);
            chart.data.datasets[0].data = currentData.map(data => data.cantidad_alumnos);
            chart.update();
        });
    });
</script>
@endsection
