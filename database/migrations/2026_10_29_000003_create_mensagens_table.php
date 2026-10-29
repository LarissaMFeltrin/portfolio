<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mensagens', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->string('empresa')->nullable();
            $table->text('mensagem');
            // Em que versao do site a pessoa escreveu: e nela que se responde.
            $table->string('idioma', 5);
            $table->string('ip', 45)->nullable();
            $table->timestamp('lida_em')->nullable()->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mensagens');
    }
};
