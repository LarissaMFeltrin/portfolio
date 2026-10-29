<?php

declare(strict_types=1);

namespace App\Filament\Resources\Mensagens\Pages;

use App\Filament\Resources\Mensagens\MensagemResource;
use App\Models\Mensagem;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMensagem extends ViewRecord
{
    protected static string $resource = MensagemResource::class;

    /** Abriu, leu. */
    public function mount(int|string $record): void
    {
        parent::mount($record);

        if ($this->record->lida_em === null) {
            $this->record->marcarComoLida();
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('responder')
                ->label('Responder por e-mail')
                ->icon('heroicon-o-paper-airplane')
                ->url(fn (Mensagem $record) => 'mailto:'.$record->email.'?subject='.rawurlencode('Re: contato pelo portfólio')),
            DeleteAction::make(),
        ];
    }
}
