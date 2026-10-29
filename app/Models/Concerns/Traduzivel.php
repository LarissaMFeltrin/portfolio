<?php

declare(strict_types=1);

namespace App\Models\Concerns;

/**
 * Campos guardados como JSON com um valor por idioma:
 * {"pt_BR": "...", "en": "..."}.
 *
 * Sem pacote de traducao: sao poucos campos, e um JSON por coluna deixa o
 * texto dos dois idiomas lado a lado no mesmo registro, que e como ele e
 * editado no painel.
 */
trait Traduzivel
{
    /**
     * O valor no idioma atual; sem traducao, volta para o idioma principal.
     */
    public function traducao(string $campo): mixed
    {
        $valores = $this->getAttribute($campo) ?? [];
        $principal = config('portfolio.idiomas')[0];

        return filled($valores[app()->getLocale()] ?? null)
            ? $valores[app()->getLocale()]
            : ($valores[$principal] ?? null);
    }
}
