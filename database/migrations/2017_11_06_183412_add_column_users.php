<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsers extends Migration
{
 
     public function up()
    {
       Schema::table('users', function (Blueprint $table) {
            $table->string('rut');
            $table->string('last_name');
            $table->string('phone');
            $table->string('address');
            $table->string('birth_date');
            $table->string('activity');
            $table->string('admission_date');
            $table->string('diagnosis');
            $table->string('description');
            $table->string('title'); 
            $table->string('specialty'); 
            $table->string('complementary_studies'); 
            $table->string('position');        
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rut');
            $table->dropColumn('last_name');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('birth_date');
            $table->dropColumn('activity');
            $table->dropColumn('admission_date');
            $table->dropColumn('diagnosis');
            $table->dropColumn('description');
            $table->dropColumn('title'); 
            $table->dropColumn('specialty'); 
            $table->dropColumn('complementary_studies'); 
            $table->dropColumn('position'); 
        });
    }
}
