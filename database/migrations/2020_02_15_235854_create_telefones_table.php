<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefones', function (Blueprint $table) {
            $table->increments('id');
            //O unsigned() mantém a integridade do banco, ao apagar um registro, ele apaga todos os seus relacionamentos.
            $table->integer('contato_id')->unsigned();
            $table->string('titulo');
            $table->string('telefone');
            $table->timestamps();
        });

        //Criando o relacionamento com a tabela contatos (foreign key - chave estrangeira)
        Schema::table('telefones', function(Blueprint $table) {
            $table->foreign('contato_id')->references('id')->on('contatos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('telefones');
    }
}
