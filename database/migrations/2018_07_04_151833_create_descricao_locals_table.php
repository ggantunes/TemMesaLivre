<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescricaoLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descricao_locals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            //$table->timestamps();
        });

        DB::table('descricao_locals')->insert(
        array(
            array ('id' => 1,'descricao' => 'Sala'),
            array ('id' => 2,'descricao' => 'Sala de Reunião'),
            array ('id' => 3,'descricao' => 'Sala com videoconferência'),
            array ('id' => 4,'descricao' => 'Lounge'),
        )
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descricao_locals');
    }
}
