<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lineaproducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineaproducto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cantidad');
            $table->bigInteger('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->bigInteger('id_pedido')->unsigned();
            $table->foreign('id_pedido')->references('id')->on('pedidos');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lineapedido');
    }
}