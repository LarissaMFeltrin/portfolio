<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Experiencia;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Experiencia> */
class ExperienciaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cargo' => ['pt_BR' => 'Desenvolvedora', 'en' => 'Developer'],
            'empresa' => $this->faker->company(),
            'inicio' => '2025-03-01',
            'fim' => null,
            'atividades' => ['pt_BR' => ['Atividade'], 'en' => ['Activity']],
        ];
    }
}
