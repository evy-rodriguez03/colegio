<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsejeriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consejerias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alumno');
            $table->boolean('secretaria')->default(false)->nullable();
            $table->boolean('orientacion')->default(false)->nullable();
            $table->boolean('consej')->default(false)->nullable();
            $table->boolean('tesoreria')->default(false)->nullable();
            $table->boolean('secultimo')->default(false)->nullable();
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
        Schema::dropIfExists('consejerias');
    }
}
