<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscolardosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escolardos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            //f2
            
            $table->date('nacimientopadre')->nullable();
            $table->string('edadpadre')->nullable();
           
            $table->string('nestudiopadre')->nullable();
            $table->string('profesionpadre')->nullable();
            $table->string('ocupacionpadre')->nullable();
           
            

            $table->date('nacimientomadre')->nullable();
            $table->string('edadmadre')->nullable();
            
            $table->string('nestudiomadre')->nullable();
            $table->string('profesionmadre')->nullable();
            $table->string('ocupacionmadre')->nullable();
            
            
            $table->date('nacimientoencargado')->nullable();
            $table->string('edadencargado')->nullable();
            
            $table->string('nestudioencargado')->nullable();
            $table->string('profesionencargado')->nullable();
            $table->string('ocupacionencargado')->nullable();
            
            $table->string('vivescon')->nullable();
            $table->string('especifiquevives')->nullable();
            $table->string('motivo')->nullable();
            $table->string('nmujeres')->nullable();
            $table->string('nhombres')->nullable();
            $table->string('lugarocupado')->nullable();
            $table->boolean('checkpadrastro')->default(false)->nullable();
            $table->boolean('checkmadrastra')->default(false)->nullable();
            $table->string('otrapersona')->nullable();
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
        Schema::dropIfExists('escolardos');
    }
}
