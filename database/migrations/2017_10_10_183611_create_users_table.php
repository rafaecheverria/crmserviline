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
            $table->string('password')->nullable();
            $table->string('rut');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('direccion');
            $table->date('nacimiento')->nullable();
            $table->string('actividad')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('genero')->nullable();
            $table->string('estado')->nullable();
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