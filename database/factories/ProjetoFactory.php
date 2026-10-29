<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\OrigemProjeto;
use App\Enums\SituacaoProjeto;
use App\Models\Projeto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<Projeto> */
class ProjetoFactory extends Factory
{
    public function definition(): array
    {
        $nome = Str::title($this->faker->unique()->words(2, true));

        return [
            'slug' => Str::slug($nome),
            'nome' => ['pt_BR' => $nome, 'en' => $nome],
            'situacao' => SituacaoProjeto::Producao,
            'origem' => OrigemProjeto::Proprio,
            'resumo' => ['pt_BR' => "Resumo do {$nome}.", 'en' => "{$nome} summary."],
            'destaques' => ['pt_BR' => ['Destaque em portugues'], 'en' => ['Highlight in English']],
            'tecnologias' => ['Laravel', 'MySQL'],
            'ordem' => 0,
            'publicado' => true,
        ];
    }

    public function daEmpresa(string $empresa): static
    {
        return $this->state(['origem' => OrigemProjeto::Empresa, 'organizacao' => $empresa]);
    }

    public function rascunho(): static
    {
        return $this->state(['publicado' => false]);
    }
}
