<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosMadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_madres', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('primernombre');
            $table->string('segundonombre');
            $table->string('primerapellido');
            $table->string('segundoapellido');
            $table->string('numerodeidentidad');
            $table->string('telefonopersonal');
            $table->string('lugardetrabajo');
            $table->string('oficio');
            $table->string('telefonooficina');
            $table->string('ingresos');
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
        Schema::dropIfExists('datos_madres');
    }
}
