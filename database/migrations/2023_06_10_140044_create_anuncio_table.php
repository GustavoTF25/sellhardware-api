<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anuncio', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->float('quantidade');
            $table->string('preco', 255);
            $table->enum('condicao_produto', array('novo','semi_novo','usado'))->default('novo')->nullable();
            $table->boolean('status_anuncio')->default(true)->nullable();
            $table->longText('descricao')->nullable();
            $table->float('mediaNotas')->nullable();
            $table->float('mediaVotos')->nullable();
            $table->longText('observacoes')->nullable();
            $table->timestamps();
            $table->foreignId('id_usuario')->constrained(table: 'users', indexName: 'anuncio_id_users');
            $table->foreignId('id_produto')->constrained(table: 'produto', indexName: 'anuncio_id_produto' );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncio');
    }
};
