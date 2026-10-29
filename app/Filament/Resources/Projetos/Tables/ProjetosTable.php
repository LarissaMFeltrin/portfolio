<?php

declare(strict_types=1);

namespace App\Filament\Resources\Projetos\Tables;

use App\Models\Projeto;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ProjetosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // Arrastar para mudar a ordem em que aparecem no site.
            ->reorderable('ordem')
            ->defaultSort('ordem')
            ->columns([
                TextColumn::make('nome')
                    ->label('Projeto')
                    ->state(fn (Projeto $record) => $record->traducao('nome'))
                    ->description(fn (Projeto $record) => $record->organizacao ?? $record->cliente)
                    ->weight('medium'),

                TextColumn::make('situacao')->label('Situação')->badge(),

                TextColumn::make('origem')->label('De quem é')->badge()->color('gray'),

                ToggleColumn::make('publicado')->label('No site'),

                TextColumn::make('updated_at')
                    ->label('Alterado')
                    ->since()
                    ->visibleFrom('md'),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
