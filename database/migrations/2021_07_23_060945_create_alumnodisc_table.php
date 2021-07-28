<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnodiscTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnodisc', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('discapacidad_id');
            $table->timestamps();
        });
        Schema::table('alumnodisc', function (Blueprint $table) {
            $table->foreign('alumno_id')->references('id')->on('alumno')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('discapacidad_id')->references('id')->on('discapacidad') ->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnodisc');
    }
}
