<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carro', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome');
            $table->string('anoFabricacao');
            $table->string('anoModelo');
            $table->double('preco', 8, 2);
            $table->bigInteger('km');
            $table->string('vendido');
            $table->string('opcionais');
            $table->unsignedInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('marca');
            $table->unsignedInteger('garagem_id');
            $table->foreign('garagem_id')->references('id')->on('garagem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carro');
    }
}
