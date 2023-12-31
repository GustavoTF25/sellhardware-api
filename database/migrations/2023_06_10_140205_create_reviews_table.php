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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->float('notas');
            $table->foreignId('id_usuario')->constrained(table: 'users', indexName: 'notas_id_users');
            $table->foreignId('id_anuncio')->constrained(table: 'anuncio', indexName: 'notas_id_anuncio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
