<?php

declare(strict_types=1);

namespace App\Filament\Resources\Mensagens\Tables;

use App\Models\Mensagem;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class MensagensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                IconColumn::make('lida_em')
                    ->label('')
                    ->state(fn (Mensagem $record) => $record->lida_em === null)
                    ->boolean()
                    ->trueIcon('heroicon-s-envelope')
                    ->falseIcon('heroicon-o-envelope-open')
                    ->trueColor('primary')
                    ->falseColor('gray')
                    ->tooltip(fn (Mensagem $record) => $record->lida_em ? 'Lida' : 'Não lida'),

                TextColumn::make('nome')
                    ->label('De')
                    ->description(fn (Mensagem $record) => $record->email)
                    ->searchable(['nome', 'email', 'empresa'])
                    ->weight(fn (Mensagem $record) => $record->lida_em ? null : 'bold'),

                TextColumn::make('empresa')->label('Empresa')->placeholder('—')->visibleFrom('md'),

                TextColumn::make('mensagem')->label('Mensagem')->limit(60)->visibleFrom('lg'),

                TextColumn::make('created_at')->label('Recebida')->since()->sortable(),
            ])
            ->filters([
                TernaryFilter::make('lida_em')
                    ->label('Situação')
                    ->nullable()
                    ->trueLabel('Lidas')
                    ->falseLabel('Não lidas'),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
