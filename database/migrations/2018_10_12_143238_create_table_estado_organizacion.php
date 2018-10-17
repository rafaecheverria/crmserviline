<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;


class CreateTableEstadoOrganizacion extends Migration
{
    public function up()
    {
        Schema::create('estado_organizacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado_id')->unsigned();
            $table->integer('organizacion_id')->unsigned();
            $table->string('nota',500)->nullable();
            $table->timestamp('fecha_creado')->nullable()->default(Carbon::now());
            $table->timestamp('fecha_actualizado')->nullable()->default(Carbon::now());

            $table->foreign('estado_id')->references('id')->on('estados')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('organizacion_id')->references('id')->on('organizaciones')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('estado_organizacion');
    }
}
