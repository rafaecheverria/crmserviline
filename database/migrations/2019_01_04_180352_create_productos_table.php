<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned()->nullable();
            $table->string('codigo',500)->nullable();
            $table->string('descripcion',500)->nullable();
            $table->string('imagen',500)->nullable();
            $table->integer('stock')->nullable();
            $table->float('precio_compra')->nullable();
            $table->float('precio_venta')->nullable();
            $table->integer('ventas')->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias')
            ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
