<section id="inicio" class="hero">
  <div class="faixa hero-grade">
    <div>
      <p class="sobretitulo">{{ __('site.inicio.sobretitulo') }}</p>
      <h1>{!! __('site.inicio.titulo', ['destaque' => '<span class="destaque">'.e(__('site.inicio.titulo_destaque')).'</span>']) !!}</h1>
      <p class="hero-texto">{{ __('site.inicio.texto') }}</p>
      <p class="hero-local">{{ __('site.inicio.local') }}</p>
      <div class="acoes">
        <a href="#projetos" class="botao">{{ __('site.inicio.ver_projetos') }}</a>
        <a href="{{ $contato['linkedin'] }}" class="botao botao-contorno" target="_blank" rel="noopener">LinkedIn</a>
        <a href="{{ $contato['github'] }}" class="botao botao-contorno" target="_blank" rel="noopener">GitHub</a>
      </div>
    </div>
    <div class="numeros">
      @foreach (__('site.inicio.numeros') as $numero)
        <div class="numero"><strong>{{ $numero['valor'] }}</strong><span>{{ $numero['texto'] }}</span></div>
      @endforeach
    </div>
  </div>
</section>
