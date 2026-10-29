<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\OrigemProjeto;
use App\Enums\SituacaoProjeto;
use App\Models\Concerns\Traduzivel;
use Database\Factories\ProjetoFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    /** @use HasFactory<ProjetoFactory> */
    use HasFactory, Traduzivel;

    protected $fillable = [
        'slug', 'nome', 'situacao', 'origem', 'organizacao', 'cliente',
        'resumo', 'destaques', 'tecnologias', 'ordem', 'publicado',
    ];

    protected function casts(): array
    {
        return [
            'situacao' => SituacaoProjeto::class,
            'origem' => OrigemProjeto::class,
            'nome' => 'array',
            'resumo' => 'array',
            'destaques' => 'array',
            'tecnologias' => 'array',
            'publicado' => 'boolean',
        ];
    }

    /** Os que aparecem no site, na ordem arrumada no painel. */
    #[Scope]
    protected function vitrine(Builder $query): void
    {
        $query->where('publicado', true)->orderBy('ordem')->orderBy('id');
    }

    /**
     * O aviso de baixo do resumo. Projeto proprio tem codigo privado mas
     * apresentavel; o da empresa nao e da Larissa para mostrar.
     */
    public function aviso(): string
    {
        return match ($this->origem) {
            OrigemProjeto::Proprio => __('site.projetos.aviso.proprio'),
            OrigemProjeto::Empresa => __('site.projetos.aviso.empresa', ['empresa' => $this->organizacao]),
        };
    }

    public function selos(): array
    {
        return [
            $this->situacao->rotulo(),
            $this->origem === OrigemProjeto::Empresa ? $this->organizacao : $this->origem->rotulo(),
        ];
    }
}
