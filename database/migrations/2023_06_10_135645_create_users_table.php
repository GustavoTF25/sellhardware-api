<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100)->nullable();
            $table->string('email', 150)->unique();
            $table->integer('celular')->size(12)->nullable();
            $table->string('senha');
            $table->enum('ativo', array('sim', 'nao'))->default('sim');
            $table->string('fotodeperfil')->nullable();
            $table->timestamps();
            $table->foreignId('id_endereco')->constrained(table: 'endereco', indexName:'users_id_endereco')->nullable();
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
