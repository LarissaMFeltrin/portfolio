<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * So o conteudo. O usuario do painel nao vem de seeder, para nenhuma senha
     * ficar no repositorio: crie com `php artisan make:filament-user`.
     */
    public function run(): void
    {
        $this->call(ConteudoSeeder::class);
    }
}
