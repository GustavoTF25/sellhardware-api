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
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('componente',255);
            $table->string('fabricante',255)->nullable();
            $table->string('marca',255)->nullable();
            $table->string('modelo',255)->nullable();
            $table->string('categoria',255)->nullable();
            $table->string('tipo',255)->nullable();
            $table->float('capacidade')->nullable();
           
            //$table->foreignId('id_observacoes')->constrained(table: 'observacoes', indexName: 'produto_id_observacoes');
           // $table->unsignedInteger('id_obs')->nullable();
           // $table->foreignId('id_obs')->references('id_observacoes')->on('observacoes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto');
    }
};
