<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCargoToUsers extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('cargo_id')->unsigned()->nullable();

            $table->foreign('cargo_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::table('organizaciones', function (Blueprint $table) {
            $table->dropColumn('cargo_id');
        });
    }
}
