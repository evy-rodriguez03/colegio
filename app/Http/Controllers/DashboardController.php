<?php

namespace App\Http\Controllers;
use App\Models\Alumno;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        $queryPorDia = "
            SELECT c.id, CONCAT(c.niveleducativo, ' ', c.modalidad, ' ', c.jornada, ' ', c.seccion) as nombre_curso, COUNT(ac.alumno_id) as cantidad_alumnos
            FROM cursos c
            LEFT JOIN matriculados ac ON c.id = ac.curso_id
            WHERE DATE(ac.created_at) = CURDATE() -- Filtrar por el día actual
            GROUP BY c.id, nombre_curso
        ";
    
        $queryGeneral = "
            SELECT c.id, CONCAT(c.niveleducativo, ' ', c.modalidad, ' ', c.jornada, ' ', c.seccion) as nombre_curso, COUNT(ac.alumno_id) as cantidad_alumnos
            FROM cursos c
            LEFT JOIN matriculados ac ON c.id = ac.curso_id
            GROUP BY c.id, nombre_curso
        ";
    
        $alumnosPorCursoDia = DB::select(DB::raw($queryPorDia));
        $alumnosPorCursoGeneral = DB::select(DB::raw($queryGeneral));
    
        $cursos = DB::table('cursos')->get();

        $totalAlumnosDia = DB::table('matriculados')->whereDate('created_at', Carbon::today())->count();
        $fecha = DB::table('matriculados')->whereDate('created_at', now())->count();
        $totalAlumnosTotal = DB::table('matriculados')->count();
    
    
        return view('dashboard', compact('cursos', 'alumnosPorCursoDia', 'alumnosPorCursoGeneral','totalAlumnosDia','totalAlumnosTotal','fecha'));
    }
    

    
    
}
