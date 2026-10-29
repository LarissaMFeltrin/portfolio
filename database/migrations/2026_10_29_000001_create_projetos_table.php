<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('situacao', 20);
            $table->string('origem', 20);
            // Empresa dona do produto, quando nao e projeto proprio.
            $table->string('organizacao')->nullable();
            // Cliente que usa em producao, quando pode ser citado.
            $table->string('cliente')->nullable();
            // Textos com um valor por idioma: {"pt_BR": ..., "en": ...}.
            $table->json('nome');
            $table->json('resumo');
            $table->json('destaques');
            $table->json('tecnologias');
            $table->unsignedSmallInteger('ordem')->default(0);
            $table->boolean('publicado')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projetos');
    }
};
