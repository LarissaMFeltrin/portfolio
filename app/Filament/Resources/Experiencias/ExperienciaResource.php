<?php

declare(strict_types=1);

namespace App\Filament\Resources\Experiencias;

use App\Filament\Resources\Experiencias\Pages\CreateExperiencia;
use App\Filament\Resources\Experiencias\Pages\EditExperiencia;
use App\Filament\Resources\Experiencias\Pages\ListExperiencias;
use App\Filament\Resources\Experiencias\Schemas\ExperienciaForm;
use App\Filament\Resources\Experiencias\Tables\ExperienciasTable;
use App\Models\Experiencia;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class ExperienciaResource extends Resource
{
    protected static ?string $model = Experiencia::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static ?string $modelLabel = 'experiência';

    protected static ?string $pluralModelLabel = 'experiências';

    protected static ?string $slug = 'experiencias';

    protected static ?int $navigationSort = 2;

    public static function getRecordTitle(?Model $record): string
    {
        return $record ? "{$record->traducao('cargo')} · {$record->empresa}" : static::getModelLabel();
    }

    public static function form(Schema $schema): Schema
    {
        return ExperienciaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExperienciasTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExperiencias::route('/'),
            'create' => CreateExperiencia::route('/nova'),
            'edit' => EditExperiencia::route('/{record}/editar'),
        ];
    }
}
