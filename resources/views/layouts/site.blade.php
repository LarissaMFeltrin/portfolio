@php
    $emIngles = app()->getLocale() === 'en';
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ __('site.meta.titulo') }}</title>
<meta name="description" content="{{ __('site.meta.descricao') }}">
<link rel="canonical" href="{{ url()->current() }}">
<link rel="alternate" hreflang="pt-BR" href="{{ route('inicio') }}">
<link rel="alternate" hreflang="en" href="{{ route('inicio.en') }}">
<meta name="theme-color" content="#0b2530">
<link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
<meta property="og:type" content="profile">
<meta property="og:title" content="{{ __('site.meta.titulo') }}">
<meta property="og:description" content="{{ __('site.meta.descricao') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:locale" content="{{ __('site.meta.og_locale') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/portfolio.css') }}?v={{ filemtime(public_path('css/portfolio.css')) }}">
</head>
<body>

<header class="topo">
  <div class="faixa">
    <a href="#inicio" class="nome-topo"><img src="{{ asset('favicon.svg') }}" alt="" width="32" height="32">Larissa Feltrin</a>
    <nav class="menu" aria-label="{{ __('site.menu.principal') }}">
      <a href="#sobre">{{ __('site.menu.sobre') }}</a>
      <a href="#projetos">{{ __('site.menu.projetos') }}</a>
      <a href="#experiencia">{{ __('site.menu.experiencia') }}</a>
      <a href="#contato">{{ __('site.menu.contato') }}</a>
      <a href="{{ route($emIngles ? 'inicio' : 'inicio.en') }}" class="idioma"
         hreflang="{{ $emIngles ? 'pt-BR' : 'en' }}" lang="{{ $emIngles ? 'pt-BR' : 'en' }}"
         title="{{ __('site.menu.outro_idioma_titulo') }}">{{ __('site.menu.outro_idioma') }}</a>
    </nav>
  </div>
</header>

<main>
  @yield('conteudo')
</main>

<footer class="rodape">
  <div class="faixa">
    <p>© {{ now()->year }} Larissa Maria Feltrin</p>
    <p>{{ __('site.rodape.feito_com') }} <a href="{{ config('portfolio.contato.repositorio') }}" target="_blank" rel="noopener">{{ __('site.rodape.codigo') }}</a></p>
  </div>
</footer>
</body>
</html>
