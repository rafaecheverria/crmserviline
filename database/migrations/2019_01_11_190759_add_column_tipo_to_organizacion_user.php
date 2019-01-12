<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTipoToOrganizacionUser extends Migration
{

    public function up()
    {
       Schema::table('organizacion_user', function (Blueprint $table) {
            $table->string('tipo')->nullable();

        });
    }

    public function down()
    {
        Schema::table('organizacion_user', function (Blueprint $table) {
            $table->dropColumn('tipo');
        });
    }
    
}
