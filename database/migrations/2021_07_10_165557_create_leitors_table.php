<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigoLeitor');
            $table->string('nomeLeitor');
            $table->string('dnLeitor');
            $table->string('cpfLeitor');
            $table->string('telefoneLeitor');
            $table->string('emailLeitor');
            $table->string('enderecoLeitor');
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
        Schema::dropIfExists('leitors');
    }
}
