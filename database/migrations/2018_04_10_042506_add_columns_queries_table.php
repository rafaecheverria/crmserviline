<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('queries', function (Blueprint $table) {
            $table->string('sintomas', 1000)->nullable();
            $table->string('examenes', 1000)->nullable();
            $table->string('tratamiento', 1000)->nullable();
            $table->string('observaciones', 1000)->nullable();
        });
    }

    public function down()
    {
        Schema::table('queries', function (Blueprint $table) {
            $table->dropColumn('sintomas');
            $table->dropColumn('examenes');
            $table->dropColumn('tratamiento');
            $table->dropColumn('observaciones');
        });
    }
}
