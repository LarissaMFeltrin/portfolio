<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * O idioma vem da rota (/ em portugues, /en em ingles), e nao do navegador:
 * o recrutador recebe um link e precisa ver sempre a mesma versao dele.
 */
class DefinirIdioma
{
    public function handle(Request $request, Closure $next, string $idioma): Response
    {
        abort_unless(in_array($idioma, config('portfolio.idiomas'), true), 404);

        app()->setLocale($idioma);

        return $next($request);
    }
}
