<?php

declare(strict_types=1);

namespace App\Filament\Resources\Experiencias\Tables;

use App\Models\Experiencia;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExperienciasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // A mesma ordem do site: o mais recente primeiro.
            ->defaultSort('inicio', 'desc')
            ->columns([
                TextColumn::make('cargo')
                    ->label('Cargo')
                    ->state(fn (Experiencia $record) => $record->traducao('cargo'))
                    ->description(fn (Experiencia $record) => $record->empresa)
                    ->weight('medium'),

                TextColumn::make('inicio')
                    ->label('Período')
                    ->state(fn (Experiencia $record) => $record->periodo())
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
