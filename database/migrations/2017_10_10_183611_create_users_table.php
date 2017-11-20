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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('rut');
            $table->string('last_name');
            $table->string('phone');
            $table->string('address');
            $table->string('birth_date');
            $table->string('activity');
            $table->string('admission_date');
            $table->string('diagnosis');
            $table->string('description');
            $table->string('title');  
            $table->string('complementary_studies'); 
            $table->string('position');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
