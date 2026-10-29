<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Mail\NovaMensagemDeContato;
use App\Models\Mensagem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\Test;
use RuntimeException;
use Tests\TestCase;

class ContatoTest extends TestCase
{
    use RefreshDatabase;

    private function dados(array $alterar = []): array
    {
        return [
            'nome' => 'Ana Recrutadora',
            'email' => 'ana@empresa.com.br',
            'empresa' => 'Empresa X',
            'mensagem' => 'Olá! Gostaria de conversar sobre uma vaga.',
            'idioma' => 'pt_BR',
            ...$alterar,
        ];
    }

    #[Test]
    public function grava_a_mensagem_avisa_por_email_e_volta_para_o_formulario(): void
    {
        Mail::fake();
        config(['portfolio.contato.notificar' => 'larissa@exemplo.com']);

        $this->post('/contato', $this->dados())
            ->assertRedirect(route('inicio').'#contato')
            ->assertSessionHas('contato_enviado');

        $mensagem = Mensagem::sole();
        $this->assertSame('ana@empresa.com.br', $mensagem->email);
        $this->assertNull($mensagem->lida_em);

        Mail::assertSent(NovaMensagemDeContato::class, fn ($mail) => $mail->hasTo('larissa@exemplo.com')
            && $mail->hasReplyTo('ana@empresa.com.br')
            && $mail->mensagem->is($mensagem));
    }

    #[Test]
    public function quem_escreve_pela_versao_em_ingles_volta_para_ela(): void
    {
        Mail::fake();

        $this->post('/contato', $this->dados(['idioma' => 'en']))
            ->assertRedirect(route('inicio.en').'#contato');

        $this->assertSame('en', Mensagem::sole()->idioma);
    }

    #[Test]
    public function erro_de_validacao_sai_no_idioma_da_pagina(): void
    {
        $this->from(route('inicio.en'))
            ->post('/contato', $this->dados(['idioma' => 'en', 'email' => 'nao-e-email', 'mensagem' => '']))
            ->assertRedirect(route('inicio.en').'#contato')
            ->assertSessionHasErrors([
                'email' => 'Please enter a valid email.',
                'mensagem' => 'Please fill in your message.',
            ]);

        $this->assertSame(0, Mensagem::count());
    }

    #[Test]
    public function robo_que_preenche_o_campo_escondido_recebe_sucesso_mas_nada_e_gravado(): void
    {
        Mail::fake();

        $this->post('/contato', $this->dados(['site' => 'https://spam.example']))
            ->assertRedirect(route('inicio').'#contato')
            ->assertSessionHas('contato_enviado');

        $this->assertSame(0, Mensagem::count());
        Mail::assertNothingSent();
    }

    #[Test]
    public function email_fora_do_ar_nao_perde_a_mensagem_nem_vira_erro_para_quem_escreveu(): void
    {
        Mail::shouldReceive('to')->andThrow(new RuntimeException('SMTP fora do ar'));

        $this->post('/contato', $this->dados())->assertSessionHas('contato_enviado');

        $this->assertSame(1, Mensagem::count());
    }

    #[Test]
    public function passou_do_limite_por_hora_volta_com_aviso_e_com_o_texto_preenchido(): void
    {
        Mail::fake();
        config(['portfolio.contato.limite_por_hora' => 2]);

        $this->post('/contato', $this->dados());
        $this->post('/contato', $this->dados());

        $this->post('/contato', $this->dados(['mensagem' => 'Terceira tentativa, ainda escrevendo.']))
            ->assertRedirect(route('inicio').'#contato')
            ->assertSessionHas('contato_limite')
            ->assertSessionHasInput('mensagem', 'Terceira tentativa, ainda escrevendo.');

        $this->assertSame(2, Mensagem::count());
    }
}
