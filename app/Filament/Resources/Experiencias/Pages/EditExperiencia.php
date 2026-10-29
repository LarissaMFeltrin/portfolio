<?php

declare(strict_types=1);

namespace App\Filament\Resources\Experiencias\Pages;

use App\Filament\Resources\Experiencias\ExperienciaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExperiencia extends EditRecord
{
    protected static string $resource = ExperienciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
