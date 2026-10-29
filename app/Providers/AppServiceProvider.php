<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Controllers\ContatoController;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Passou do limite: volta para o formulario com o texto preenchido e
        // um aviso, em vez da pagina crua de erro 429.
        RateLimiter::for('contato', fn (Request $request) => Limit::perHour(config('portfolio.contato.limite_por_hora'))
            ->by($request->ip())
            ->response(fn (Request $request) => redirect()
                ->to(route(ContatoController::rotaDoIdioma((string) $request->input('idioma'))).'#contato')
                ->withInput()
                ->with('contato_limite', true)));
    }
}
