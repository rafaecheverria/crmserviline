<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpecialityUserTable extends Migration
{
    public function up()
    {
        Schema::create('speciality_user', function (Blueprint $table) {
            $table->integer('speciality_id')->unsigned();
            $table->integer('user_id')->unsigned();
                        
            $table->foreign('speciality_id')->references('id')->on('specialities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('speciality_user');
    }
}
