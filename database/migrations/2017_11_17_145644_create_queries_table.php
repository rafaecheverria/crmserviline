<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueriesTable extends Migration
{

    public function up()
    {
        Schema::create('queries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha');
            $table->string('hora');
            $table->integer('doctor_id')->unsigned();
            $table->integer('paciente_id')->unsigned();
            $table->integer('unity_id')->unsigned();
            $table->string('estado');
            $table->string('diagnostico');
            $table->string('descripcion');
            $table->timestamps();
            
            $table->foreign('doctor_id')->references('id')->on('users');
            $table->foreign('paciente_id')->references('id')->on('users');
            $table->foreign('unity_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('queries');
    }
}
