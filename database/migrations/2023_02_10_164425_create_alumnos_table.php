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
            $table->bigIncrements('id');
            $table->string('primernombre');
            $table->string('segundonombre');
            $table->string('primerapellido');
            $table->string('segundoapellido');
            $table->string('numerodeidentidad');
            $table->date('fechadenacimiento');
            $table->string('genero');
            $table->string('direccion');
            $table->string('numerodehermanosenicgc');
            $table->boolean('tiene_alergia')->default(false);
            $table->string('alergia')->nullable();
            $table->boolean('fotografias')->default(false)->nullable();
            $table->boolean('fotografiasdelpadre')->default(false)->nullable();
            $table->boolean('carnet')->default(false)->nullable();
            $table->boolean('certificadodeconducta')->default(false)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('ciudad');
            $table->string('depto');
            $table->string('pais');
            $table->string('escuelaanterior')->nullable();
            $table->string('totalhermanos');
            $table->string('medico');
            $table->string('telefonoemergencia');
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');

            


            
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
