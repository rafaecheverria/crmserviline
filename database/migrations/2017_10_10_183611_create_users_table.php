<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('rut');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('nacimiento');
            $table->string('actividad');
            $table->string('fecha_admision');
            $table->string('diagnostico');
            $table->string('descripcion');
            $table->string('titulo');  
            $table->string('estudios_complementarios')->nullable(); 
            $table->string('posicion');
            $table->string('avatar')->default('default.jpg');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

//nullable() -> hace que el campo no sea obligatorio en la base de datos.