<?php

declare(strict_types=1);

namespace App\Filament\Resources\Experiencias\Schemas;

use App\Filament\Componentes\AbasDeIdioma;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExperienciaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Experiência')
                ->columnSpanFull()
                ->columns(3)
                ->components([
                    TextInput::make('empresa')
                        ->label('Empresa')
                        ->required()
                        ->maxLength(120),

                    // O site mostra so mes e ano; o dia nao importa.
                    DatePicker::make('inicio')
                        ->label('Início')
                        ->displayFormat('m/Y')
                        ->required(),

                    DatePicker::make('fim')
                        ->label('Fim')
                        ->displayFormat('m/Y')
                        ->helperText('Em branco no emprego atual.')
                        ->afterOrEqual('inicio'),
                ]),

            AbasDeIdioma::make(fn (string $idioma, bool $principal) => [
                TextInput::make("cargo.{$idioma}")
                    ->label('Cargo')
                    ->required($principal)
                    ->maxLength(120),

                Repeater::make("atividades.{$idioma}")
                    ->label('Atividades')
                    ->simple(TextInput::make('atividade')->required()->maxLength(255))
                    ->addActionLabel('Adicionar atividade')
                    ->reorderable()
                    ->defaultItems(0),
            ]),
        ]);
    }
}
