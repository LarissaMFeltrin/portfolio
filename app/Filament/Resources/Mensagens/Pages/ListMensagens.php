<?php

declare(strict_types=1);

namespace App\Filament\Resources\Mensagens\Pages;

use App\Filament\Resources\Mensagens\MensagemResource;
use Filament\Resources\Pages\ListRecords;

class ListMensagens extends ListRecords
{
    protected static string $resource = MensagemResource::class;
}
