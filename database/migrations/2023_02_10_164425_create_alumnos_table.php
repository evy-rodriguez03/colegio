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
            $table->string('numerodehermanosenicgc');
            $table->string('telefonodeencargado');
            $table->string('alergia');
            $table->boolean('fotografias')->default(false)->nullable();
            $table->boolean('fotografiasdelpadre')->default(false)->nullable();
            $table->boolean('fotografiacarnet')->default(false)->nullable();
            $table->boolean('certificadodeconducta')->default(false)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            
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
