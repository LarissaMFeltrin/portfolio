<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\MensagemFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/** O que chega pelo formulario de contato do site. */
class Mensagem extends Model
{
    /** @use HasFactory<MensagemFactory> */
    use HasFactory;

    protected $table = 'mensagens';

    protected $fillable = ['nome', 'email', 'empresa', 'mensagem', 'idioma', 'ip', 'lida_em'];

    protected function casts(): array
    {
        return ['lida_em' => 'datetime'];
    }

    #[Scope]
    protected function naoLidas(Builder $query): void
    {
        $query->whereNull('lida_em');
    }

    public function marcarComoLida(): void
    {
        $this->forceFill(['lida_em' => now()])->save();
    }
}
