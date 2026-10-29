<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

/**
 * De quem e o projeto. Muda o que o portfolio pode prometer: do projeto
 * proprio a Larissa mostra o codigo na entrevista; o da empresa onde trabalha
 * pertence a ela, e o site precisa dizer isso.
 */
enum OrigemProjeto: string implements HasLabel
{
    case Proprio = 'proprio';
    case Empresa = 'empresa';

    public function rotulo(): string
    {
        return __("site.projetos.origem.{$this->value}");
    }

    public function getLabel(): string
    {
        return $this->rotulo();
    }
}
