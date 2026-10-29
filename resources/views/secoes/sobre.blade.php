<section id="sobre" class="secao">
  <div class="faixa sobre-grade">
    <div>
      <p class="sobretitulo">{{ __('site.sobre.sobretitulo') }}</p>
      <h2>{{ __('site.sobre.titulo') }}</h2>
      @foreach (__('site.sobre.paragrafos') as $paragrafo)
        <p>{{ $paragrafo }}</p>
      @endforeach
    </div>
    <aside class="caixa-info">
      <dl>
        @foreach (__('site.sobre.info') as $rotulo => $valor)
          <div><dt>{{ $rotulo }}</dt><dd>{{ $valor }}</dd></div>
        @endforeach
      </dl>
    </aside>
  </div>
</section>
