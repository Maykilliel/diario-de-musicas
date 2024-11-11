<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instrumento_id');  // Chave estrangeira para o instrumento
            $table->string('titulo');
            $table->text('letra');
            $table->json('imagens')->nullable();  // Armazenando as imagens em JSON
            $table->timestamps();

            // Definindo a relação com a tabela instrumentos
            $table->foreign('instrumento_id')->references('id')->on('instrumentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('musicas');
    }
}
