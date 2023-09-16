<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscolarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escolars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            //f1
            $table->string('primerapellido');
            $table->string('segundoapellido')->nullable();
            $table->string('primernombre');
            $table->string('segundonombre')->nullable();;
            $table->string('enumerodecelular')->nullable();
            $table->string('eedad')->nullable();
            $table->string('procedencia')->nullable();
            $table->string('tiempolectivo')->nullable();
            $table->string('telelectivo')->nullable();
            $table->string('noelectivo')->nullable();
            $table->string('telnoelectivo')->nullable();
            $table->string('observaciones')->nullable();

            //f3
            $table->string('situacioneconomica')->nullable();
            $table->string('casavives')->nullable();
            $table->boolean('computadora')->default(false)->nullable();
            $table->boolean('tablet')->default(false)->nullable();
            $table->boolean('celular')->default(false)->nullable();
            $table->boolean('internet')->default(false)->nullable();
            $table->boolean('otroscasa')->default(false)->nullable();
            $table->string('talla')->nullable();
            $table->string('peso')->nullable();
            $table->string('hatenido')->nullable();
            $table->string('tiene')->nullable();
            $table->string('ver')->nullable();
            $table->string('verespecifique')->nullable();
            $table->string('vercorregida')->nullable();
            $table->string('escuchar')->nullable();
            $table->string('escucharespecifique')->nullable();
            $table->string('escucharcorregida')->nullable();
            $table->string('estadodentadura')->nullable();
            $table->string('recibidovacuna')->nullable();

            //f4
            $table->boolean('abanda')->default(false)->nullable();
            $table->boolean('afutbol')->default(false)->nullable();
            $table->boolean('apingpong')->default(false)->nullable();
            $table->boolean('anumeros')->default(false)->nullable();
            $table->boolean('alectura')->default(false)->nullable();
            $table->boolean('acoro')->default(false)->nullable();
            $table->boolean('abasket')->default(false)->nullable();
            $table->boolean('atennis')->default(false)->nullable();
            $table->boolean('amanuales')->default(false)->nullable();
            $table->boolean('aoratoria')->default(false)->nullable();
            $table->boolean('avolley')->default(false)->nullable();
            $table->boolean('aatletismo')->default(false)->nullable();
            $table->boolean('adomestico')->default(false)->nullable();
            $table->boolean('aanimales')->default(false)->nullable();
            $table->boolean('adibujo')->default(false)->nullable();
            $table->boolean('afiestas')->default(false)->nullable();
            $table->boolean('acientificos')->default(false)->nullable();
            $table->boolean('aenfermos')->default(false)->nullable();
            $table->boolean('aotros')->default(false)->nullable();
            $table->string('trabajar')->nullable();
            $table->string('namigos')->nullable();
            $table->string('pasatiempos1')->nullable();
            $table->string('pasatiempos2')->nullable();
            $table->string('pasatiempos3')->nullable();
            $table->string('edadamigos')->nullable();

            //f5
            $table->string('estudios')->nullable();
            $table->string('repetido')->nullable();
            $table->string('claseestudiante')->nullable();
            $table->string('agrado')->nullable();
            $table->string('agradomenos')->nullable();
            $table->string('considera')->nullable();
            $table->string('horasextra')->nullable();
            $table->string('tiempolibre')->nullable();
            $table->string('rendimiento')->nullable();
            $table->string('ayudarsele')->nullable();
            $table->string('cursosrepetidos')->nullable();
            $table->string('materiasreprobadas')->nullable();
            $table->string('materiasagradan')->nullable();
            $table->string('atribuyeagrado')->nullable();
            $table->string('agradanmenos')->nullable();
            $table->string('materiasdificultad')->nullable();
            $table->string('culturageneral')->nullable();
            $table->string('diversificado')->nullable();

            //f6
            $table->string('pbienconud')->nullable();
            $table->string('hablarconel')->nullable();
            $table->string('psolucion')->nullable();
            $table->string('pconfianza')->nullable();
            $table->string('mbienconud')->nullable();
            $table->string('hablarconella')->nullable();
            $table->string('msolucion')->nullable();
            $table->string('mconfianza')->nullable();
            $table->boolean('pcomprensivo')->default(false)->nullable();
            $table->boolean('mcomprensivo')->default(false)->nullable();
            $table->boolean('ecomprensivo')->default(false)->nullable();
            $table->boolean('pbondadoso')->default(false)->nullable();
            $table->boolean('mbondadoso')->default(false)->nullable();
            $table->boolean('ebondadoso')->default(false)->nullable();
            $table->boolean('pfuete')->default(false)->nullable();
            $table->boolean('mfuete')->default(false)->nullable();
            $table->boolean('efuete')->default(false)->nullable();
            $table->boolean('pestricto')->default(false)->nullable();
            $table->boolean('mestricto')->default(false)->nullable();
            $table->boolean('eestricto')->default(false)->nullable();
            $table->boolean('ptolerante')->default(false)->nullable();
            $table->boolean('mtolerante')->default(false)->nullable();
            $table->boolean('etolerante')->default(false)->nullable();
            $table->boolean('pcomunicativo')->default(false)->nullable();
            $table->boolean('mcomunicativo')->default(false)->nullable();
            $table->boolean('ecomunicativo')->default(false)->nullable();
            $table->boolean('pproblemas')->default(false)->nullable();
            $table->boolean('mproblemas')->default(false)->nullable();
            $table->boolean('eproblemas')->default(false)->nullable();
            $table->boolean('pestudio')->default(false)->nullable();
            $table->boolean('mestudio')->default(false)->nullable();
            $table->boolean('eestudio')->default(false)->nullable();
            $table->boolean('plibertades')->default(false)->nullable();
            $table->boolean('mlibertades')->default(false)->nullable();
            $table->boolean('elibertades')->default(false)->nullable();
            $table->boolean('pfuturo')->default(false)->nullable();
            $table->boolean('mfuturo')->default(false)->nullable();
            $table->boolean('efuturo')->default(false)->nullable();
            $table->boolean('pgrande')->default(false)->nullable();
            $table->boolean('mgrande')->default(false)->nullable();
            $table->boolean('egrande')->default(false)->nullable();
            $table->boolean('pleve')->default(false)->nullable();
            $table->boolean('mleve')->default(false)->nullable();
            $table->boolean('eleve')->default(false)->nullable();
            $table->string('nopapa')->nullable();
            $table->string('nomama')->nullable();
            $table->string('relaciones')->nullable();


            //f7
            $table->string('triste')->nullable();
            $table->string('llora')->nullable();
            $table->string('preocupado')->nullable();
            $table->string('nervioso')->nullable();
            $table->string('solo')->nullable();
            $table->string('debil')->nullable();
            $table->string('amistoso')->nullable();
            $table->string('carinioso')->nullable();
            $table->string('timido')->nullable();
            $table->string('testarudo')->nullable();
            $table->string('tranquilo')->nullable();
            $table->string('puntual')->nullable();
            $table->string('egoista')->nullable();
            $table->string('celoso')->nullable();
            $table->string('violento')->nullable();
            $table->string('agresivo')->nullable();
            $table->string('comprensivo')->nullable();
            $table->string('ordenado')->nullable();
            $table->string('comunicativo')->nullable();
            $table->string('religioso')->nullable();
            $table->string('futuro')->nullable();
            $table->string('retraido')->nullable();
            $table->string('cooperador')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escolars');
    }
}
