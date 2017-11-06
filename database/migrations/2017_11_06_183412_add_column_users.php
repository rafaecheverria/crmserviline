<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('users', function (Blueprint $table) {
            $table->string('last_name');
            $table->string('rut');
            $table->string('phone');
            $table->string('address');
            $table->string('age');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_name');
            $table->dropColumn('rut');
            $table->dropColumn('phone')->unique();
            $table->dropColumn('address');
            $table->dropColumn('age');
        });
    }
}
