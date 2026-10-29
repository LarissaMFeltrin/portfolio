<section id="experiencia" class="secao">
  <div class="faixa">
    <p class="sobretitulo">{{ __('site.experiencia.sobretitulo') }}</p>
    <h2>{{ __('site.experiencia.titulo') }}</h2>
    <div class="linha-tempo">
      @foreach ($experiencias as $experiencia)
        <div class="cargo">
          <div class="cargo-cabeca">
            <div><h3>{{ $experiencia->traducao('cargo') }}</h3><span class="cargo-empresa">{{ $experiencia->empresa }}</span></div>
            <span class="cargo-periodo">{{ $experiencia->periodo() }}</span>
          </div>
          <ul class="lista">
            @foreach ($experiencia->traducao('atividades') ?? [] as $atividade)
              <li>{{ $atividade }}</li>
            @endforeach
          </ul>
        </div>
      @endforeach
    </div>
    <div class="formacao">
      <strong>{{ __('site.experiencia.formacao.curso') }}</strong>
      <span>{{ __('site.experiencia.formacao.instituicao') }}</span>
    </div>
  </div>
</section>
