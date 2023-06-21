<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Roda as Migrations
     */
    public function up(): void
    {
       
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            //$table->id('id_endereco');
            $table->string('nome', 100)->nullable();
            $table->string('email', 150)->unique();
            $table->integer('celular')->size(15)->nullable();
            $table->string('senha');
            $table->string('rua', 45)->nullable();
            $table->string('bairro', 45)->nullable();
            $table->string('cidade', 45)->nullable();
            $table->string('estado', 45)->nullable();
            $table->enum('ativo', array('sim', 'nao'))->default('sim');
            $table->string('fotodeperfil')->nullable();
            $table->timestamps();
        

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
