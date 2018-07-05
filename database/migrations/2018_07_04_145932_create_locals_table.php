<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('descricao')->unsigned()->default(1);
            $table->foreign('descricao')->references('id')->on('descricao_locals');
            $table->string('endereco');
            $table->string('cidade');
            $table->string('estado');
            $table->integer('qtd_mesas');
            $table->integer('qtd_cadeiras');
            $table->float('custo_hora');
            $table->dateTime('periodo_disponivel');
            $table->string('horario_disponivel');
            $table->string('image')->nullable();
            $table->softDeletes();

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
        Schema::dropIfExists('locals');
    }
}
