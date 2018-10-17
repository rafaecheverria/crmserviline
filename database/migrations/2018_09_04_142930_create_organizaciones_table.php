<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizacionesTable extends Migration
{
    public function up()
    {
        Schema::create('organizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('rut');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('actividad')->nullable();
            $table->string('descripcion')->nullable();        
            $table->string('logo')->default('default.jpg');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organizaciones');
    }
}
