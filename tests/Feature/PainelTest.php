<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Enums\OrigemProjeto;
use App\Enums\SituacaoProjeto;
use App\Filament\Resources\Mensagens\Pages\ViewMensagem;
use App\Filament\Resources\Projetos\Pages\CreateProjeto;
use App\Filament\Resources\Projetos\Pages\ListProjetos;
use App\Models\Mensagem;
use App\Models\Projeto;
use App\Models\User;
use Filament\Forms\Components\Repeater;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PainelTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function visitante_vai_para_o_login(): void
    {
        $this->get('/admin/projetos')->assertRedirect('/admin/login');
    }

    #[Test]
    public function lista_os_projetos_incluindo_rascunhos(): void
    {
        $this->actingAs(User::factory()->create());
        $projetos = [Projeto::factory()->create(), Projeto::factory()->rascunho()->create()];

        Livewire::test(ListProjetos::class)->assertCanSeeTableRecords($projetos);
    }

    #[Test]
    public function cria_projeto_com_os_textos_dos_dois_idiomas_no_fim_da_lista(): void
    {
        $this->actingAs(User::factory()->create());
        Projeto::factory()->create(['ordem' => 4]);

        $desfazer = Repeater::fake();

        Livewire::test(CreateProjeto::class)
            ->fillForm([
                'slug' => 'atendeflow',
                'situacao' => SituacaoProjeto::Desenvolvimento,
                'origem' => OrigemProjeto::Proprio,
                'tecnologias' => ['Laravel', 'WhatsApp Cloud API'],
                'nome' => ['pt_BR' => 'AtendeFlow', 'en' => 'AtendeFlow'],
                'resumo' => ['pt_BR' => 'Atendimento pelo WhatsApp.', 'en' => 'WhatsApp customer service.'],
                // Repeater simples: no formulario cada item e {destaque: texto};
                // gravado, vira lista de textos.
                'destaques' => [
                    'pt_BR' => [['destaque' => 'Robô'], ['destaque' => 'Agenda']],
                    'en' => [['destaque' => 'Bot'], ['destaque' => 'Scheduling']],
                ],
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $desfazer();

        $projeto = Projeto::where('slug', 'atendeflow')->sole();
        $this->assertSame(['Robô', 'Agenda'], $projeto->destaques['pt_BR']);
        $this->assertSame('WhatsApp customer service.', $projeto->resumo['en']);
        $this->assertSame(5, $projeto->ordem);
    }

    #[Test]
    public function projeto_da_empresa_exige_o_nome_da_empresa(): void
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(CreateProjeto::class)
            ->fillForm([
                'slug' => 'sistema-da-empresa',
                'origem' => OrigemProjeto::Empresa->value,
                'organizacao' => null,
                'tecnologias' => ['PHP'],
                'nome' => ['pt_BR' => 'Sistema'],
                'resumo' => ['pt_BR' => 'Resumo.'],
            ])
            ->call('create')
            ->assertHasFormErrors(['organizacao' => 'required']);
    }

    #[Test]
    public function abrir_a_mensagem_marca_como_lida(): void
    {
        $this->actingAs(User::factory()->create());
        $mensagem = Mensagem::factory()->create();

        Livewire::test(ViewMensagem::class, ['record' => $mensagem->getRouteKey()])->assertOk();

        $this->assertNotNull($mensagem->fresh()->lida_em);
    }
}
