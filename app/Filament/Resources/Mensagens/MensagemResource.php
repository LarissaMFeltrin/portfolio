<?php

declare(strict_types=1);

namespace App\Filament\Resources\Mensagens;

use App\Filament\Resources\Mensagens\Pages\ListMensagens;
use App\Filament\Resources\Mensagens\Pages\ViewMensagem;
use App\Filament\Resources\Mensagens\Schemas\MensagemInfolist;
use App\Filament\Resources\Mensagens\Tables\MensagensTable;
use App\Models\Mensagem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

/**
 * So leitura: a mensagem e de quem escreveu. Daqui se le, se responde pelo
 * e-mail e, se for o caso, se apaga.
 */
class MensagemResource extends Resource
{
    protected static ?string $model = Mensagem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?string $modelLabel = 'mensagem';

    protected static ?string $pluralModelLabel = 'mensagens';

    protected static ?string $slug = 'mensagens';

    protected static ?string $recordTitleAttribute = 'nome';

    protected static ?int $navigationSort = 3;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function infolist(Schema $schema): Schema
    {
        return MensagemInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MensagensTable::configure($table);
    }

    /** Quantas ainda nao foram lidas, no menu. */
    public static function getNavigationBadge(): ?string
    {
        $naoLidas = Mensagem::naoLidas()->count();

        return $naoLidas > 0 ? (string) $naoLidas : null;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMensagens::route('/'),
            'view' => ViewMensagem::route('/{record}'),
        ];
    }
}
