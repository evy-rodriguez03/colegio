<?php

namespace App\Http\Controllers;
use App\Models\Alumno;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $alumnosPorMes = $this->alumnosPorMes();
        $alumnosPorDia = $this->alumnosPorDia(); // llama a la función alumnosPorMes() y guarda el resultado en la variable $alumnosPorMes
        return view('dashboard', ['alumnosPorMes' => $alumnosPorMes,
                                'alumnosPorDia' => $alumnosPorDia,  ]); // pasa la variable $alumnosPorMes a la vista
    }
    
    public function alumnosPorMes()
    {
        $alumnosPorMes = Alumno::select(DB::raw("DATE_FORMAT(created_at,'%Y-%m') as month"), DB::raw('count(*) as total'))
                        ->groupBy('month')
                        ->paginate(10);
        return $alumnosPorMes; // devuelve la variable $alumnosPorMes
    }

    public function alumnosPorDia()
{
    $alumnosPorDia = Alumno::selectRaw('DATE(created_at) as dia, count(*) as cantidad')
                            ->groupBy('dia')
                            ->orderBy('dia')
                            ->get();

    $fechas = [];
    $cantidades = [];

    foreach ($alumnosPorDia as $alumno) {
        $fechas[] = $alumno->dia;
        $cantidades[] = $alumno->cantidad;
    }

    return [
        'fechas' => $fechas,
        'cantidades' => $cantidades,
    ];
}


    
}
