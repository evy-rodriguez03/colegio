<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolar extends Model
{
    use HasFactory;
    protected $fillable = [
        //f1
        'primerapellido',
        'segundoapellido',
        'primernombre',
        'segundonombre',
        'egrado',
        'enumerodecelular',
        'tiempolectivo',
        'telelectivo',
        'noelectivo',
        'telnoelectivo',
        'observaciones',

        //f3
        'situacioneconomica',
        'casavives',
        'computadora',
        'tablet',
        'celular',
        'internet',
        'otroscasa',
        'talla',
        'peso',
        'hatenido',
        'ver',
        'verespecifique',
        'vercorregida',
        'escuchar',
        'escucharespecifique',
        'escucharcorregida',
        'estadodentadura',
        'recibidovacuna',

        //f4
        'abanda',
        'afutbol',
        'apingpong',
        'anumeros',
        'alectura',
        'acoro',
        'abasket',
        'atennis',
        'amanuales',
        'aoratoria',
        'avolley',
        'aatletismo',
        'adomestico',
        'aanimales',
        'adibujo',
        'afiestas',
        'acientificos',
        'aenfermos',
        'aotros',
        'trabajar',
        'namigos',
        'pasatiempos1',
        'pasatiempos2',
        'pasatiempos3',
        'edadamigos',

        //f5
        'estudios',
        'repetido',
        'claseestudiante',
        'agrado',
        'agradomenos',
        'considera',
        'horasextra',
        'tiempolibre',
        'rendimiento',
        'ayudarsele',
        'cursosrepetidos',
        'materiasreprobadas',
        'materiasagradan',
        'atribuyeagrado',
        'agradanmenos',
        'materiasdificultad',
        'culturageneral',
        'diversificado',

        //f6
        'pbienconud',
        'hablarconel',
        'psolucion',
        'pconfianza',
        'mbienconud',
        'hablarconella',
        'msolucion',
        'mconfianza',
        'pcomprensivo',
        'mcomprensivo',
        'ecomprensivo',
        'pbondadoso',
        'mbondadoso',
        'ebondadoso',
        'pfuete',
        'mfuete',
        'efuete',
        'pestricto',
        'mestricto',
        'eestricto',
        'ptolerante',
        'mtolerante',
        'etolerante',
        'pcomunicativo',
        'mcomunicativo',
        'ecomunicativo',
        'pproblemas',
        'mproblemas',
        'eproblemas',
        'pestudio',
        'mestudio',
        'eestudio',
        'plibertades',
        'mlibertades',
        'elibertades',
        'pfuturo',
        'mfuturo',
        'efuturo',
        'pgrande',
        'mgrande',
        'egrande',
        'pleve',
        'mleve',
        'eleve',
        'nopapa',
        'nomama',
        'relaciones',

        //f7
        'triste',
        'llora',
        'preocupado',
        'nervioso',
        'solo',
        'debil',
        'amistoso',
        'carinioso',
        'timido',
        'testarudo',
        'tranquilo',
        'puntual',
        'egoista',
        'celoso',
        'violento',
        'agresivo',
        'comprensivo',
        'ordenado',
        'comunicativo',
        'religioso',
        'futuro',
        'retraido',
        'cooperador'



    ];

    public function curso()
    {
        return $this->belongsToMany(Curso::class);
    }
    public function padre()
    {
        return $this->belongsToMany(Padre::class);
    }
}
