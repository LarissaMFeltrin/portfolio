<?php

declare(strict_types=1);

namespace App\Filament\Resources\Projetos\Schemas;

use App\Enums\OrigemProjeto;
use App\Enums\SituacaoProjeto;
use App\Filament\Componentes\AbasDeIdioma;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class ProjetoForm
{
    public static function configure(Schema $schema): Schema
    {
        // O estado vem como enum ao abrir o registro e como string depois que
        // o select muda.
        $daEmpresa = fn (Get $get): bool => in_array($get('origem'), [OrigemProjeto::Empresa, OrigemProjeto::Empresa->value], true);

        return $schema->components([
            Section::make('Projeto')
                ->columnSpanFull()
                ->columns(3)
                ->components([
                    TextInput::make('slug')
                        ->label('Identificador')
                        ->helperText('Vira a âncora do projeto no site: #projeto-identificador.')
                        ->required()
                        ->alphaDash()
                        ->maxLength(80)
                        ->unique(ignoreRecord: true),

                    Select::make('situacao')
                        ->label('Situação')
                        ->options(SituacaoProjeto::class)
                        ->default(SituacaoProjeto::Producao)
                        ->required(),

                    Select::make('origem')
                        ->label('De quem é')
                        ->options(OrigemProjeto::class)
                        ->default(OrigemProjeto::Proprio)
                        ->required()
                        ->live(),

                    TextInput::make('organizacao')
                        ->label('Empresa dona do produto')
                        ->helperText('Aparece no selo e no aviso de que o código não é público.')
                        ->visible($daEmpresa)
                        ->required($daEmpresa)
                        ->maxLength(120),

                    TextInput::make('cliente')
                        ->label('Cliente em produção')
                        ->helperText('Só se o cliente autorizou aparecer.')
                        ->maxLength(160),

                    Toggle::make('publicado')
                        ->label('Aparece no site')
                        ->default(true)
                        ->inline(false),

                    TagsInput::make('tecnologias')
                        ->label('Tecnologias')
                        ->placeholder('Digite e tecle Enter')
                        ->reorderable()
                        ->required()
                        ->columnSpanFull(),
                ]),

            AbasDeIdioma::make(fn (string $idioma, bool $principal) => [
                TextInput::make("nome.{$idioma}")
                    ->label('Nome')
                    ->required($principal)
                    ->maxLength(120),

                Textarea::make("resumo.{$idioma}")
                    ->label('Resumo')
                    ->rows(3)
                    ->required($principal),

                Repeater::make("destaques.{$idioma}")
                    ->label('Destaques')
                    ->simple(TextInput::make('destaque')->required()->maxLength(255))
                    ->addActionLabel('Adicionar destaque')
                    ->reorderable()
                    ->defaultItems(0),
            ]),
        ]);
    }
}
