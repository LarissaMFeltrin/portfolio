<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Experiencia;
use App\Models\Projeto;
use Illuminate\View\View;

class InicioController extends Controller
{
    public function __invoke(): View
    {
        return view('inicio', [
            'projetos' => Projeto::vitrine()->get(),
            'experiencias' => Experiencia::cronologica()->get(),
            'habilidades' => config('portfolio.habilidades'),
            'contato' => config('portfolio.contato'),
        ]);
    }
}
