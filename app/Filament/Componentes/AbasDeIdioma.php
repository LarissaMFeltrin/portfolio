<?php

declare(strict_types=1);

namespace App\Filament\Componentes;

use Closure;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

/**
 * Uma aba por idioma do site, com os mesmos campos em cada uma. Os campos
 * gravam em `campo.idioma`, o formato que o trait Traduzivel le.
 */
class AbasDeIdioma
{
    private const ROTULOS = ['pt_BR' => 'Português', 'en' => 'English'];

    /**
     * @param  Closure(string $idioma, bool $principal): array  $campos
     */
    public static function make(Closure $campos): Tabs
    {
        $idiomas = config('portfolio.idiomas');

        return Tabs::make('Textos')
            ->columnSpanFull()
            ->tabs(array_map(
                fn (string $idioma) => Tab::make(self::ROTULOS[$idioma] ?? $idioma)
                    ->schema($campos($idioma, $idioma === $idiomas[0])),
                $idiomas,
            ));
    }
}
