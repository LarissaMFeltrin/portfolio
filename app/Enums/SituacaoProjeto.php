<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum SituacaoProjeto: string implements HasLabel
{
    case Producao = 'producao';
    case Desenvolvimento = 'desenvolvimento';

    public function rotulo(): string
    {
        return __("site.projetos.situacao.{$this->value}");
    }

    public function getLabel(): string
    {
        return $this->rotulo();
    }
}
