<?php

declare(strict_types=1);

namespace App\Filament\Resources\Projetos\Pages;

use App\Filament\Resources\Projetos\ProjetoResource;
use App\Models\Projeto;
use Filament\Resources\Pages\CreateRecord;

class CreateProjeto extends CreateRecord
{
    protected static string $resource = ProjetoResource::class;

    /** Projeto novo entra no fim da lista do site. */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data + ['ordem' => (int) Projeto::max('ordem') + 1];
    }
}
