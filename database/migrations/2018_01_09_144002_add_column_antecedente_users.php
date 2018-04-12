<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAntecedenteUsers extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('sangre')->nullable();
            $table->string('vih')->nullable();
            $table->integer('peso')->nullable();
            $table->string('altura')->nullable();
            $table->string('alergia')->nullable();
            $table->string('medicamento_actual')->nullable();
            $table->string('enfermedad')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('sangre');
            $table->dropColumn('vih');
            $table->dropColumn('peso');
            $table->dropColumn('altura');
            $table->dropColumn('alergia');
            $table->dropColumn('medicamento_actual');
            $table->dropColumn('enfermedad');
        });
    }
}
