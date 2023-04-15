<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoPadreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_padre', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('padre_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('padre_id')->references('id')->on('padres')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('alumno_padre');
    }
}
