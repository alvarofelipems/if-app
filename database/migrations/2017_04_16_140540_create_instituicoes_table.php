<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicoes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->bigInteger('cnpj', 14);
            $table->bigInteger('ie', 20)->nullable();
            $table->string('endereco', 255);
            $table->integer('numero', 255);
            $table->string('complemento', 50)->nullable();
            $table->string('cidade', 255);
            $table->char('uf', 2);
            $table->integer('cep', 8);
            $table->integer('telefone', 11)->nullable();
            $table->string('email', 255)->nullable();
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
        Schema::drop('instituicoes');
    }
}
