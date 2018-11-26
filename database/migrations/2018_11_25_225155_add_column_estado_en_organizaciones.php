<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnEstadoEnOrganizaciones extends Migration
{
   public function up()
    {
        Schema::table('organizaciones', function (Blueprint $table) {
            $table->integer('estado_actual')->unsigned()->nullable();

            $table->foreign('estado_actual')->references('id')->on('estados')
            ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::table('organizaciones', function (Blueprint $table) {
            $table->dropColumn('estado_actual');
        });
    }
}
