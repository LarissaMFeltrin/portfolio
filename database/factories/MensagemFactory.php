<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Mensagem;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Mensagem> */
class MensagemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'empresa' => $this->faker->company(),
            'mensagem' => $this->faker->paragraph(),
            'idioma' => 'pt_BR',
            'ip' => $this->faker->ipv4(),
        ];
    }
}
