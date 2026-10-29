<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Experiencia;
use App\Models\Projeto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class InicioTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_raiz_abre_em_portugues_e_aponta_para_a_versao_em_ingles(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('<html lang="pt-BR">', false)
            ->assertSee('Do suporte ao desenvolvimento')
            ->assertSee('href="'.route('inicio.en').'" class="idioma"', false);
    }

    #[Test]
    public function en_abre_em_ingles_e_aponta_para_a_versao_em_portugues(): void
    {
        $this->get('/en')
            ->assertOk()
            ->assertSee('<html lang="en">', false)
            ->assertSee('From support to development')
            ->assertSee('href="'.route('inicio').'" class="idioma"', false);
    }

    #[Test]
    public function cada_versao_mostra_o_texto_do_projeto_no_seu_idioma(): void
    {
        Projeto::factory()->create([
            'nome' => ['pt_BR' => 'API de Cobrança e Notas', 'en' => 'Billing & Invoicing API'],
            'resumo' => ['pt_BR' => 'Boleto e nota fiscal.', 'en' => 'Bank slips and invoices.'],
        ]);

        $this->get('/')->assertSee('API de Cobrança e Notas')->assertSee('Boleto e nota fiscal.');
        $this->get('/en')->assertSee('Billing &amp; Invoicing API', false)->assertSee('Bank slips and invoices.');
    }

    #[Test]
    public function texto_sem_traducao_aparece_no_idioma_principal_em_vez_de_sumir(): void
    {
        Projeto::factory()->create(['resumo' => ['pt_BR' => 'Só em português.', 'en' => '']]);

        $this->get('/en')->assertSee('Só em português.');
    }

    #[Test]
    public function rascunho_nao_aparece_e_a_ordem_e_a_do_painel(): void
    {
        Projeto::factory()->create(['nome' => ['pt_BR' => 'Segundo', 'en' => 'Segundo'], 'ordem' => 2]);
        Projeto::factory()->create(['nome' => ['pt_BR' => 'Primeiro', 'en' => 'Primeiro'], 'ordem' => 1]);
        Projeto::factory()->rascunho()->create(['nome' => ['pt_BR' => 'Escondido', 'en' => 'Escondido']]);

        $this->get('/')
            ->assertSeeInOrder(['Primeiro', 'Segundo'])
            ->assertDontSee('Escondido');
    }

    #[Test]
    public function projeto_da_empresa_diz_de_quem_e_e_nao_promete_mostrar_o_codigo(): void
    {
        Projeto::factory()->daEmpresa('Sistemas Cordon')->create();

        $this->get('/')
            ->assertSee('Produto da Sistemas Cordon: código e telas não são públicos.')
            ->assertDontSee('Apresento o código');
    }

    #[Test]
    public function o_periodo_da_experiencia_sai_no_formato_de_cada_idioma(): void
    {
        Experiencia::factory()->create(['inicio' => '2023-05-01', 'fim' => '2025-03-01']);
        Experiencia::factory()->create(['inicio' => '2025-03-01', 'fim' => null]);

        $this->get('/')->assertSeeInOrder(['mar/2025 – atual', 'mai/2023 – mar/2025']);
        $this->get('/en')->assertSeeInOrder(['Mar 2025 – present', 'May 2023 – Mar 2025']);
    }

    #[Test]
    public function idioma_que_o_site_nao_tem_e_404(): void
    {
        $this->get('/es')->assertNotFound();
    }
}
