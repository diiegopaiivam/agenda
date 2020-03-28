<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComunicadoEnviados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunicado_enviados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_aluno')->unsigned();
            $table->integer('id_serie')->unsigned();
            $table->integer('id_responsavel')->unsigned();
            $table->foreign('id_aluno')->references('id')->on('aluno')->onDelete('cascade');
            $table->foreign('id_serie')->references('id')->on('serie')->onDelete('cascade');
            $table->foreign('id_responsavel')->references('id')->on('responsavel')->onDelete('cascade');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
