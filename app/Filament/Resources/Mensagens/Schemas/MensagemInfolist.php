<?php

declare(strict_types=1);

namespace App\Filament\Resources\Mensagens\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MensagemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()
                ->columnSpanFull()
                ->columns(3)
                ->components([
                    TextEntry::make('nome')->label('Nome'),
                    TextEntry::make('email')
                        ->label('E-mail')
                        ->url(fn ($state) => "mailto:{$state}")
                        ->copyable(),
                    TextEntry::make('empresa')->label('Empresa')->placeholder('Não informou'),
                    TextEntry::make('created_at')->label('Recebida em')->dateTime('d/m/Y H:i'),
                    TextEntry::make('idioma')
                        ->label('Versão do site')
                        ->badge()
                        ->formatStateUsing(fn (string $state) => $state === 'en' ? 'Inglês' : 'Português'),
                    TextEntry::make('mensagem')
                        ->label('Mensagem')
                        ->columnSpanFull()
                        // Quebras de linha de quem escreveu, sem interpretar HTML.
                        ->extraAttributes(['style' => 'white-space: pre-line']),
                ]),
        ]);
    }
}
