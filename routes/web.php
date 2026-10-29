<?php

declare(strict_types=1);

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', InicioController::class)->middleware('idioma:pt_BR')->name('inicio');
Route::get('/en', InicioController::class)->middleware('idioma:en')->name('inicio.en');

Route::post('/contato', ContatoController::class)->middleware('throttle:contato')->name('contato');
