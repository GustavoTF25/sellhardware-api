<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50)->nullable(true);
            $table->string('email', 100);
            $table->integer('celular')-> size(12)->default(55);
            $table->string('senha');
            $table->enum('ativo', ['sim', 'nao'])->default('sim');
            $table->enum('admin', ['sim', 'nao'])->default('nao');
            $table->string('foto')->default('/');
            $table->timestamps();
            //$table->id('id_endereço');
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
