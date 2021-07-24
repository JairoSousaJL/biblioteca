<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigoEmprestimo');
            $table->foreignId('leitor_id')->constrained('leitors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('livro_id')->constrained('livros')->onUpdate('cascade')->onDelete('cascade');
            $table->date('dataEntrada');
            $table->date('dataEntrega');
            $table->integer('statusEmprestimo');
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
        Schema::dropIfExists('emprestimos');
    }
}
