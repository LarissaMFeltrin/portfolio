<?php

declare(strict_types=1);

namespace App\Filament\Resources\Experiencias\Pages;

use App\Filament\Resources\Experiencias\ExperienciaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExperiencias extends ListRecords
{
    protected static string $resource = ExperienciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
