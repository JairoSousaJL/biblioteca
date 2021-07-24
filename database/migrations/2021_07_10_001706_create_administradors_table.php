<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigoAdministrador');
            $table->string('nomeAdministrador');
            $table->string('cpfAdministrador');
            $table->string('user');
            $table->string('password');
            $table->boolean('statusAdministrador');
            $table->boolean('tipoAdministrador');
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
        Schema::dropIfExists('administradors');
    }
}
