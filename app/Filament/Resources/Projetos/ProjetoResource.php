<?php

declare(strict_types=1);

namespace App\Filament\Resources\Projetos;

use App\Filament\Resources\Projetos\Pages\CreateProjeto;
use App\Filament\Resources\Projetos\Pages\EditProjeto;
use App\Filament\Resources\Projetos\Pages\ListProjetos;
use App\Filament\Resources\Projetos\Schemas\ProjetoForm;
use App\Filament\Resources\Projetos\Tables\ProjetosTable;
use App\Models\Projeto;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class ProjetoResource extends Resource
{
    protected static ?string $model = Projeto::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;

    protected static ?string $modelLabel = 'projeto';

    protected static ?string $pluralModelLabel = 'projetos';

    protected static ?int $navigationSort = 1;

    public static function getRecordTitle(?Model $record): string
    {
        return $record?->traducao('nome') ?? static::getModelLabel();
    }

    public static function form(Schema $schema): Schema
    {
        return ProjetoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjetosTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProjetos::route('/'),
            'create' => CreateProjeto::route('/novo'),
            'edit' => EditProjeto::route('/{record}/editar'),
        ];
    }
}
