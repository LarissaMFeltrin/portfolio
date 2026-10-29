<section id="contato" class="secao contato">
  <div class="faixa contato-grade">
    <div>
      <p class="sobretitulo">{{ __('site.contato.sobretitulo') }}</p>
      <h2>{{ __('site.contato.titulo') }}</h2>
      <p>{{ __('site.contato.texto') }}</p>

      <div class="contato-links">
        <a href="mailto:{{ $contato['email'] }}"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 4.24-8 5-8-5V6l8 5 8-5v2.24z"/></svg><span><strong>{{ __('site.contato.email') }}</strong><small>{{ $contato['email'] }}</small></span></a>
        <a href="{{ $contato['linkedin'] }}" target="_blank" rel="noopener"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.85 0-2.14 1.45-2.14 2.94v5.67H9.35V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28zM5.34 7.43a2.06 2.06 0 1 1 0-4.13 2.06 2.06 0 0 1 0 4.13zM7.12 20.45H3.56V9h3.56v11.45zM22.22 0H1.77C.79 0 0 .77 0 1.73v20.54C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.73V1.73C24 .77 23.2 0 22.22 0z"/></svg><span><strong>LinkedIn</strong><small>{{ \Illuminate\Support\Str::after($contato['linkedin'], 'www.') }}</small></span></a>
        <a href="{{ $contato['github'] }}" target="_blank" rel="noopener"><svg viewBox="0 0 16 16" aria-hidden="true"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"/></svg><span><strong>GitHub</strong><small>{{ \Illuminate\Support\Str::after($contato['github'], 'https://') }}</small></span></a>
      </div>
    </div>

    <form method="post" action="{{ route('contato') }}" class="formulario" novalidate>
      @csrf
      <input type="hidden" name="idioma" value="{{ app()->getLocale() }}">

      @if (session('contato_enviado'))
        <p class="aviso aviso-ok" role="status">{{ __('site.contato.enviada') }}</p>
      @elseif (session('contato_limite'))
        <p class="aviso aviso-erro" role="alert">{{ __('site.contato.limite') }}</p>
      @endif

      @foreach (['nome' => 'text', 'email' => 'email', 'empresa' => 'text'] as $campo => $tipo)
        <label>
          {{ __("site.contato.form.{$campo}") }}
          <input type="{{ $tipo }}" name="{{ $campo }}" value="{{ old($campo) }}"
                 @if ($campo !== 'empresa') required @endif
                 @if ($campo === 'email') autocomplete="email" @elseif ($campo === 'nome') autocomplete="name" @else autocomplete="organization" @endif
                 @error($campo) class="campo-invalido" aria-invalid="true" @enderror>
          @error($campo)<span class="erro-campo">{{ $message }}</span>@enderror
        </label>
      @endforeach

      <label>
        {{ __('site.contato.form.mensagem') }}
        <textarea name="mensagem" required @error('mensagem') class="campo-invalido" aria-invalid="true" @enderror>{{ old('mensagem') }}</textarea>
        @error('mensagem')<span class="erro-campo">{{ $message }}</span>@enderror
      </label>

      <div class="campo-isca" aria-hidden="true">
        <label>Site <input type="text" name="site" tabindex="-1" autocomplete="off"></label>
      </div>

      <button type="submit" class="botao">{{ __('site.contato.form.enviar') }}</button>
    </form>
  </div>
</section>
