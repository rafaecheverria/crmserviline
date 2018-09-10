<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnRegionOrganizacion extends Migration
{
    public function up()
    {
        Schema::table('organizaciones', function (Blueprint $table) {
            $table->integer('region_id')->unsigned()->nullable();

            $table->foreign('region_id')->references('id')->on('regiones')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }
    public function down()
    {
       Schema::table('organizaciones', function (Blueprint $table) {
            $table->dropColumn('region_id');
        });
    }
}