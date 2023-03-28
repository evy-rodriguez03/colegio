<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParientetransportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parientetransportes', function (Blueprint $table) {
            $table->id();
            $table->string('nombrecompleto');
            $table->string('parentesco');
            $table->string('edad');
            $table->boolean('bus')->default(false)->nullable();
            $table->boolean('taxi')->default(false)->nullable();
            $table->boolean('conelpadre')->default(false)->nullable();
            $table->boolean('solo')->default(false)->nullable();
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
        Schema::dropIfExists('parientetransportes');
    }
}
