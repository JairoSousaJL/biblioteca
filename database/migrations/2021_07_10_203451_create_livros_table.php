<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigoLivro');
            $table->string('isbnLivro');
            $table->string('tituloLivro');
            $table->string('subtituloLivro');
            $table->string('autorLivro');
            $table->string('anoPublicacaoLivro');
            $table->string('editoraLivro');
            $table->string('edicaoLivro');
            $table->string('cursoLivro');
            $table->integer('statusLivro');
            $table->integer('quantidadeLivro');
            $table->string('localizacaoLivro');
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
        Schema::dropIfExists('livros');
    }
}
