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

        if (!$periodo) {
            return redirect()->route('inicio.create')
                ->withErrors(['El periodo de matrícula no ha comenzado.']);
        }

        if ($request->routeIs('matricula.create') || $request->routeIs('matricula.store')) {
            // Verificar si el periodo de matrícula está activo
            if (now()->isBetween($periodo->fechaInicio, $periodo->fechaCierre)) {
                return $next($request);
            } else {
                return redirect()->route('inicio.create')
                    ->withErrors(['El periodo de matrícula ha expirado.']);
            }
        }
        
        // Si no se está intentando acceder a la vista de matrícula, o si el periodo de matrícula está activo, continuamos con la solicitud
        return $next($request);

        // Verificar si la solicitud ya se está realizando en la página de inicio del sistema de matrícula
        if ($request->routeIs('inicio.create') || $request->routeIs('inicio.store')) {
            return $next($request);
        }
        
        // Obtenemos el periodo de matrícula actual
        $periodo = Periodo::whereDate('fechaInicio', '<=', now())->whereDate('fechaCierre', '>=', now())->first();
        
        // Si no hay un periodo activo, redireccionamos al usuario a la página de inicio del sistema de matrícula
        if (!$periodo) {
            return redirect()->route('inicio.create')
                ->withErrors(['El periodo de matrícula no ha comenzado.']);
        }
        
        // Verificar si ha pasado el período permitido para completar la matrícula del usuario
        $periodo_permitido = 365; // período permitido en días
        $fecha_inicio_matricula = $request->session()->get('fecha_inicio_matricula'); // obtener la fecha de inicio de la matrícula del usuario desde la sesión
        if ($fecha_inicio_matricula && (now()->diffInDays($fecha_inicio_matricula) > $periodo_permitido)) {
            // cerrar la matrícula del usuario
            // Aquí debes agregar la lógica para cerrar la matrícula del usuario, por ejemplo, actualizando el estado de la matrícula en tu base de datos
            return redirect()->route('inicio.create')
                ->withErrors(['El periodo para completar la matrícula ha expirado.']);
        }
        
        // Si hay un periodo activo y el usuario todavía está dentro del período permitido para completar la matrícula, continuamos con la solicitud
        return $next($request);
    }
}