<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodoITable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodo_i', function (Blueprint $table) {
            $table->id();
            $table->date('fechaInicio');
            $table->string('periodoMatricula');
            $table->string('usuario');
            $table->date('fechaCierre');
            $table->timestamps();
            $table->unsignedBigInteger('alumno_id')->unique( )->default(0);
            $table->foreign('alumno_id')
            ->references('id')
            ->on('alumnos')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodo_i');
    }
}
