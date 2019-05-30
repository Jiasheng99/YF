<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->string('worktime');
            $table->enum('role',['cocinero','repartidor','cajero']);
            $table->string('password');
            $table->bigInteger('id_empresa')->unsigned();
            $table->foreign('id_empresa')->references('id')->on('empresas');
            $table->rememberToken();
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
        Schema::dropIfExists('staffs');
    }
}
