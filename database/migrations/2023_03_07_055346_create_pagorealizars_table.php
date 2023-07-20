<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagorealizarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagorealizars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id'); // Columna de clave foránea
            $table->boolean('mensualidad')->default(false)->nullable();
            $table->boolean('pagosadministrativos')->default(false)->nullable();
            $table->boolean('bolsaescolar')->default(false)->nullable();
            $table->timestamps();

            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagorealizars');
    }
}
