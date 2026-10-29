<section id="projetos" class="secao secao-clara">
  <div class="faixa">
    <p class="sobretitulo">{{ __('site.projetos.sobretitulo') }}</p>
    <h2>{{ __('site.projetos.titulo') }}</h2>

    @foreach ($projetos as $projeto)
      <article class="projeto" id="projeto-{{ $projeto->slug }}">
        <div>
          <div class="projeto-selos">
            @foreach ($projeto->selos() as $indice => $selo)
              <span @class(['selo', 'selo-producao' => $indice === 0 && $projeto->situacao === \App\Enums\SituacaoProjeto::Producao])>{{ $selo }}</span>
            @endforeach
          </div>
          <h3>{{ $projeto->traducao('nome') }}</h3>
          <p class="projeto-resumo">{{ $projeto->traducao('resumo') }}</p>
          @if ($projeto->cliente)
            <p class="projeto-cliente"><span>{{ __('site.projetos.em_uso_por') }}:</span> <strong>{{ $projeto->cliente }}</strong></p>
          @endif
          <p class="projeto-nota"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 11h12v9H6zM8 11V7a4 4 0 0 1 8 0v4"/></svg>{{ $projeto->aviso() }}</p>
        </div>
        <div>
          <ul class="lista">
            @foreach ($projeto->traducao('destaques') ?? [] as $destaque)
              <li>{{ $destaque }}</li>
            @endforeach
          </ul>
          <div class="tecs">
            @foreach ($projeto->tecnologias as $tecnologia)
              <span>{{ $tecnologia }}</span>
            @endforeach
          </div>
        </div>
      </article>
    @endforeach
  </div>
</section>
