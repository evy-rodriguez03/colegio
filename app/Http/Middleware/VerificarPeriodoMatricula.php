<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Periodo;

class VerificarPeriodoMatricula
{
    
    public function handle(Request $request, Closure $next)
    {
        // Obtenemos el periodo de matrícula actual
        $periodo = Periodo::whereDate('fechaInicio', '<=', now())->whereDate('fechaCierre', '>=', now())->first();
        
        // Si no hay un periodo activo, redireccionamos al usuario a la página de inicio del sistema de matrícula
        if (!$periodo) {
            return redirect()->route('creatematricula')->withErrors(['El periodo de matrícula no ha comenzado.']);
        }
        
        // Si hay un periodo activo, continuamos con la solicitud
        return $next($request);
    }
}
