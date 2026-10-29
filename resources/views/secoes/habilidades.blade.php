<section id="habilidades" class="secao secao-clara">
  <div class="faixa">
    <p class="sobretitulo">{{ __('site.habilidades.sobretitulo') }}</p>
    <h2>{{ __('site.habilidades.titulo') }}</h2>
    <div class="habilidades">
      @foreach ($habilidades as $grupo => $tecnologias)
        <div class="grupo">
          <h3>{{ __("site.habilidades.grupos.{$grupo}") }}</h3>
          <div class="tecs">
            @foreach ($tecnologias as $tecnologia)
              <span>{{ $tecnologia }}</span>
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
