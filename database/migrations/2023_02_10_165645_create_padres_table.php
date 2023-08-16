<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo');
            $table->string('primernombre');
            $table->string('segundonombre')->nullable();
            $table->string('primerapellido');
            $table->string('segundoapellido')->nullable();
            $table->string('numerodeidentidad')->unique();;
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
        Schema::dropIfExists('padres');
    }
}
