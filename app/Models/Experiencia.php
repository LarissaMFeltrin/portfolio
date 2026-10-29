<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\Traduzivel;
use Database\Factories\ExperienciaFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    /** @use HasFactory<ExperienciaFactory> */
    use HasFactory, Traduzivel;

    protected $fillable = ['cargo', 'empresa', 'inicio', 'fim', 'atividades'];

    protected function casts(): array
    {
        return [
            'cargo' => 'array',
            'atividades' => 'array',
            'inicio' => 'date',
            'fim' => 'date',
        ];
    }

    /** Da mais recente para a mais antiga, como num curriculo. */
    #[Scope]
    protected function cronologica(Builder $query): void
    {
        $query->orderByDesc('inicio');
    }

    /** "mar/2025 – atual" em portugues, "Mar 2025 – present" em ingles. */
    public function periodo(): string
    {
        $formato = __('site.experiencia.formato_mes');

        return $this->inicio->locale(app()->getLocale())->translatedFormat($formato)
            .' – '
            .($this->fim?->locale(app()->getLocale())->translatedFormat($formato) ?? __('site.experiencia.atual'));
    }
}
