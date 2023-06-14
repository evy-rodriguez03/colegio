<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Periodo;

class VerificarEstadoPeriodo extends Command
{
    protected $signature = 'periodo:verificar-estado';

    protected $description = 'Verificar y actualizar el estado de los periodos';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $periodos = Periodo::all();

        foreach ($periodos as $periodo) {
            if ($periodo->fechaCierre <= now()) {
                $periodo->activo = false;
                $periodo->save();
            }
        }

        $this->info('El estado de los periodos ha sido verificado y actualizado.');
    }
}
   
   