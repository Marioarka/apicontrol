<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->id();
            $table->integer('matricula')->unique();
            $table->string('nombre');
            $table->string('apaterno');
            $table->string('amaterno');
            $table->string('curp')->unique();
            $table->unsignedBigInteger('estadocivilId');
            $table->string('direccion');
            $table->string('colonia');
            $table->unsignedBigInteger('municipioId');
            $table->unsignedBigInteger('estadoId');
            $table->date('fechaNacimiento');
            $table->string('path');
            $table->timestamps();
        });
        Schema::table('alumno', function (Blueprint $table) {
            $table->foreign('estadocivilId')->references('id')->on('estadoCivil');
            $table->foreign('municipioId')->references('id')->on('municipio');
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
        Schema::dropIfExists('alumno');
    }
}
