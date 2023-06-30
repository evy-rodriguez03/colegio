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
            $table->string('eprimerapellido');
            $table->string('esegundoapellido');
            $table->string('eprimernombre');
            $table->string('esegundonombre');
            $table->string('enumerodeidentidad');
            $table->string('egrado');
            $table->string('enumerodecelular');
            $table->string('elugardenacimiento');
            $table->string('efechadenacimiento');
            $table->string('eedad');
            $table->string('procedencia');
            $table->string('tiempolectivo');
            $table->string('telelectivo');
            $table->string('noelectivo');
            $table->string('telnoelectivo');
            $table->string('observaciones');
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
