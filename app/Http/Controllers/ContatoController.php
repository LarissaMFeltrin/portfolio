<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ContatoRequest;
use App\Mail\NovaMensagemDeContato;
use App\Models\Mensagem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContatoController extends Controller
{
    public function __invoke(ContatoRequest $request): RedirectResponse
    {
        $idioma = $request->validated('idioma');

        // Robo preencheu o campo escondido: responde como se tivesse dado
        // certo, para ele nao aprender a contornar, e nao grava nada.
        if (filled($request->validated('site'))) {
            return $this->voltar($idioma);
        }

        $mensagem = Mensagem::create([
            ...$request->safe()->only(['nome', 'email', 'empresa', 'mensagem']),
            'idioma' => $idioma,
            'ip' => $request->ip(),
        ]);

        // A mensagem ja esta salva e aparece no painel; um SMTP fora do ar
        // nao pode virar erro para quem escreveu.
        try {
            Mail::to(config('portfolio.contato.notificar'))->send(new NovaMensagemDeContato($mensagem));
        } catch (Throwable $e) {
            report($e);
        }

        return $this->voltar($idioma);
    }

    private function voltar(string $idioma): RedirectResponse
    {
        return redirect()
            ->to(route(self::rotaDoIdioma($idioma)).'#contato')
            ->with('contato_enviado', true);
    }

    public static function rotaDoIdioma(string $idioma): string
    {
        return $idioma === 'en' ? 'inicio.en' : 'inicio';
    }
}
