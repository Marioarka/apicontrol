<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipio', function (Blueprint $table) {
            $table->id();
            $table->integer('claveMunicipio');
            $table->unsignedBigInteger('estadoId');
            $table->string('nombreMunicipio');
            $table->timestamps();
        });
        Schema::table('municipio', function (Blueprint $table) {
            $table->foreign('estadoId')->references('id')->on('estado');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipio');
    }
}
