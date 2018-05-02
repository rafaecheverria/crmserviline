<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiasTable extends Migration
{
    public function up()
    {
        Schema::create('dias', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->string('title');
            $table->string('color', 7);
            $table->string('observacion');
            $table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('users');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('dias');
    }
}
