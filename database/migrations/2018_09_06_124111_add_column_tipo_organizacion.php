<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTipoOrganizacion extends Migration
{
 
    public function up()
    {
        Schema::table('organizaciones', function (Blueprint $table) {
            $table->string('tipo')->nullable();

        });
    }

    public function down()
    {
        Schema::table('organizaciones', function (Blueprint $table) {
            $table->dropColumn('tipo');
        });
    }
}
