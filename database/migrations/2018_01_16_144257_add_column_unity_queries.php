<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUnityQueries extends Migration
{
    public function up()
    {
        Schema::table('queries', function (Blueprint $table) {
            $table->integer('unity_id')->unsigned();
            $table->foreign('unity_id')->references('id')->on('unities');

        });
    }

    public function down()
    {
        //
    }
}
