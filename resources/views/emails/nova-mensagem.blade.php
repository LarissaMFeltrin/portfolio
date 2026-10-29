{{ $mensagem->nome }} <{{ $mensagem->email }}>
@if ($mensagem->empresa)
Empresa: {{ $mensagem->empresa }}
@endif
Versão do site: {{ $mensagem->idioma }}

{{ $mensagem->mensagem }}

--
Responda este e-mail para falar direto com quem escreveu.
As mensagens também ficam no painel: {{ url('/admin') }}
