<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesTable extends Migration
{
    public function up()
    {
        Schema::create('antecedentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sangre')->nullable();
            $table->string('vih')->nullable();
            $table->string('peso')->nullable();
            $table->string('altura')->nullable();
            $table->string('alergia')->nullable();
            $table->string('medicamento_actual')->nullable();
            $table->string('enfermedad')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('antecedentes');
    }
}
