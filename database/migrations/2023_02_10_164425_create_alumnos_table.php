<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('primernombre');
            $table->string('segundonombre');
            $table->string('primerapellido');
            $table->string('segundoapellido');
            $table->string('numerodeidentidad');
            $table->date('fechadenacimiento');
            $table->string('genero');
            $table->string('lugardenacimiento');
            $table->string('direccion');
            $table->string('hermanosentotal');
            $table->string('numerodehermanosenicgc');
            $table->string('nombredelmedico');
            $table->string('telefonodeencargado');
            $table->string('alergia');
            $table->string('fotografias');
            $table->string('fotografiasdelpadre');
            $table->string('fotografiacarnet');
            $table->string('certificadodeconducta');
            $table->string('partidadenacimiento');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
