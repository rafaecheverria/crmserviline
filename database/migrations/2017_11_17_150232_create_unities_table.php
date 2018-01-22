<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitiesTable extends Migration
{
    public function up()
    {
        Schema::create('unities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('email');
            $table->string('direccion');
            $table->string('avatar')->nullable();
            $table->string('region');
            $table->string('ciudad');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('unities');
    }
}
