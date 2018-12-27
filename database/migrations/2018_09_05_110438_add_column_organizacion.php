<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;

class AddColumnOrganizacion extends Migration
{
    public function up()
    {
        Schema::table('organizaciones', function (Blueprint $table) {
            $table->integer('ciudad_id')->unsigned()->nullable();
            $table->string('giro')->nullable();
            $table->datetime('fecha_actualizado')->format('Y-m-d H:m:s')->nullable()->default(Carbon::now());

            $table->foreign('ciudad_id')->references('id')->on('ciudades')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('organizaciones', function (Blueprint $table) {
            $table->dropColumn('ciudad_id');
            $table->dropColumn('giro');
        });
    }
}
