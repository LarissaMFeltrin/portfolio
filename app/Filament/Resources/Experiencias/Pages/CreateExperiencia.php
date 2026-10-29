<?php

declare(strict_types=1);

namespace App\Filament\Resources\Experiencias\Pages;

use App\Filament\Resources\Experiencias\ExperienciaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateExperiencia extends CreateRecord
{
    protected static string $resource = ExperienciaResource::class;
}
