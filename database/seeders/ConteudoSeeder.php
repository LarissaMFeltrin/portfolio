<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\OrigemProjeto;
use App\Enums\SituacaoProjeto;
use App\Models\Experiencia;
use App\Models\Projeto;
use Illuminate\Database\Seeder;

/**
 * O conteudo do portfolio como esta no ar. Depois de publicado, ele e
 * editado pelo painel (/admin); este seeder serve para subir um banco novo.
 *
 * Pode rodar de novo: atualiza pelo slug (projetos) e pela empresa + inicio
 * (experiencias), sem duplicar.
 */
class ConteudoSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->projetos() as $ordem => $projeto) {
            Projeto::updateOrCreate(['slug' => $projeto['slug']], $projeto + ['ordem' => $ordem + 1, 'publicado' => true]);
        }

        foreach ($this->experiencias() as $experiencia) {
            Experiencia::updateOrCreate(
                ['empresa' => $experiencia['empresa'], 'inicio' => $experiencia['inicio']],
                $experiencia,
            );
        }
    }

    private function projetos(): array
    {
        return [
            [
                'slug' => 'api-cobranca-notas',
                'nome' => ['pt_BR' => 'API de Cobrança e Notas', 'en' => 'Billing & Invoicing API'],
                'situacao' => SituacaoProjeto::Producao,
                'origem' => OrigemProjeto::Proprio,
                'organizacao' => null,
                'cliente' => null,
                'resumo' => [
                    'pt_BR' => 'Uma API que centraliza boleto, Pix, pagamentos e nota fiscal de serviço para outros sistemas. O sistema cliente faz uma chamada só; a API fala com o banco ou com a prefeitura, guarda o retorno e confere o pagamento sozinha.',
                    'en' => 'An API that centralizes bank slips (boleto), Pix instant payments, bill payments and service invoices for other systems. The client system makes a single call; the API talks to the bank or the city, stores the response and checks the payment on its own.',
                ],
                'destaques' => [
                    'pt_BR' => [
                        'Integração com Itaú, Sicoob, Inter, Caixa, Sicredi e Banco do Brasil: boleto, Pix, pagamentos, extrato e webhooks',
                        'Emissão de NFS-e pelo padrão nacional e por sistemas de prefeituras, com o PDF da nota (DANFSE) gerado pela própria API',
                        'Multiempresa, com autenticação JWT por credencial de sistema e certificado digital por empresa',
                        'Envio de lotes, registro de boletos e baixa de pagos em segundo plano, pelo agendador do Laravel',
                        'Painel administrativo para acompanhar boletos, notas e credenciais',
                        'Implantação em VPS Ubuntu: Nginx, PHP 8.4, MySQL 8, SSL, cron e backup diário',
                    ],
                    'en' => [
                        'Integrations with Itaú, Sicoob, Inter, Caixa, Sicredi and Banco do Brasil: boleto, Pix, payments, statements and webhooks',
                        "Service invoices (NFS-e) through Brazil's national standard and city systems, with the invoice PDF rendered by the API itself",
                        'Multi-company, with JWT authentication per system credential and a digital certificate per company',
                        'Batch sending, slip registration and payment reconciliation as background jobs on the Laravel scheduler',
                        'Admin panel to follow slips, invoices and credentials',
                        'Deployed on an Ubuntu VPS: Nginx, PHP 8.4, MySQL 8, SSL, cron and daily backups',
                    ],
                ],
                'tecnologias' => ['Laravel 10', 'PHP 8', 'MySQL', 'REST', 'JWT', 'SOAP', 'Linux · Nginx'],
            ],
            [
                'slug' => 'ordemflow',
                'nome' => ['pt_BR' => 'OrdemFlow', 'en' => 'OrdemFlow'],
                'situacao' => SituacaoProjeto::Producao,
                'origem' => OrigemProjeto::Proprio,
                'organizacao' => null,
                'cliente' => 'Waltech Serviços Técnicos · Maringá – PR',
                'resumo' => [
                    'pt_BR' => 'Gestão de ordens de serviço para empresas de manutenção, do chamado à nota fiscal.',
                    'en' => 'Work order management for maintenance companies, from the service request to the invoice.',
                ],
                'destaques' => [
                    'pt_BR' => [
                        'Multi-tenant com um banco de dados separado para cada empresa',
                        'Painel administrativo e app do técnico no celular (PWA), com fotos, assinatura do cliente e cronômetro do atendimento',
                        'Equipamentos com QR Code e manutenções preventivas abertas automaticamente',
                        'Emissão de NFS-e direto da ordem de serviço, integrada à API de Cobrança e Notas',
                        'Financeiro com contas a pagar e a receber e fluxo de caixa',
                        'Testes automatizados com PHPUnit',
                    ],
                    'en' => [
                        'Multi-tenant, with a separate database for each company',
                        'Admin panel and a mobile app for technicians (PWA) with photos, customer signature and a job timer',
                        'Equipment tracked by QR code, with preventive maintenance opened automatically',
                        'Service invoices issued straight from the work order, through the Billing & Invoicing API',
                        'Finance module with payables, receivables and cash flow',
                        'Automated tests with PHPUnit',
                    ],
                ],
                'tecnologias' => ['Laravel 13', 'Filament 5', 'Livewire', 'MySQL', 'Multi-tenancy', 'PWA', 'PHPUnit'],
            ],
            [
                'slug' => 'wppmanager',
                'nome' => ['pt_BR' => 'WppManager', 'en' => 'WppManager'],
                'situacao' => SituacaoProjeto::Producao,
                'origem' => OrigemProjeto::Empresa,
                'organizacao' => 'Sistemas Cordon',
                'cliente' => null,
                'resumo' => [
                    'pt_BR' => 'Plataforma multiempresa de atendimento pelo WhatsApp, que desenvolvi como desenvolvedora da Sistemas Cordon. O produto pertence à empresa.',
                    'en' => 'A multi-company WhatsApp customer service platform I developed as a developer at Sistemas Cordon. The product belongs to the company.',
                ],
                'destaques' => [
                    'pt_BR' => [
                        'Bot de autoatendimento, campanhas em massa e assistente de IA para apoiar os atendentes',
                        'Integração com a API oficial da Meta (WhatsApp Cloud API), Evolution API e Evolution Go',
                        'Várias empresas, cada uma com vários números organizados por departamento',
                        'Painel de supervisão em tempo real para o gestor acompanhar os atendimentos',
                        'Implantação, treinamento e apresentações comerciais para clientes',
                    ],
                    'en' => [
                        'Self-service bot, bulk campaigns and an AI assistant that supports the agents',
                        "Integration with Meta's official WhatsApp Cloud API, Evolution API and Evolution Go",
                        'Many companies, each with several numbers organized by department',
                        'Real-time supervision panel for managers to follow ongoing conversations',
                        'Customer onboarding, training and sales demos',
                    ],
                ],
                'tecnologias' => ['Laravel', 'PHP', 'MySQL', 'Meta Cloud API', 'Evolution API'],
            ],
        ];
    }

    private function experiencias(): array
    {
        return [
            [
                'cargo' => ['pt_BR' => 'Desenvolvedora Full Stack', 'en' => 'Full Stack Developer'],
                'empresa' => 'Sistemas Cordon',
                'inicio' => '2025-03-01',
                'fim' => null,
                'atividades' => [
                    'pt_BR' => [
                        'Desenvolvimento do WppManager, do bot às campanhas e ao painel de supervisão',
                        'Sistema de estoque e faturamento em Yii2: produtos, estoque, orçamentos comparando fornecedores e geração automática de pedidos',
                        'Regras fiscais (Simples Nacional, ICMS, ISSQN), emissão de NFS-e e homologação bancária via API e CNAB',
                        'Interfaces com Angular, Blade, Bootstrap e AdminLTE',
                        'Mentoria de uma desenvolvedora vinda do suporte, com teste técnico e plano de acompanhamento',
                    ],
                    'en' => [
                        'Developed WppManager, from the bot to the campaigns and the supervision panel',
                        'Inventory and billing system in Yii2: products, stock, quotes comparing suppliers and automatic purchase orders',
                        'Brazilian tax rules (Simples Nacional, ICMS, ISSQN), service invoices and bank certification via API and CNAB files',
                        'Interfaces with Angular, Blade, Bootstrap and AdminLTE',
                        'Mentored a developer moving from support into development, with a technical test and a follow-up plan',
                    ],
                ],
            ],
            [
                'cargo' => ['pt_BR' => 'Analista de Suporte Pleno', 'en' => 'Support Analyst (mid-level)'],
                'empresa' => 'Sistemas Cordon',
                'inicio' => '2023-05-01',
                'fim' => '2025-03-01',
                'atividades' => [
                    'pt_BR' => [
                        'Atendimento a imobiliárias nos sistemas web (PHP) e desktop (C), com consultas SQL avançadas',
                        'Reprodução de erros, chamados detalhados para o desenvolvimento e validação das correções',
                        'Apoio em homologações bancárias via XML e API e em relatórios JasperReports',
                    ],
                    'en' => [
                        'Supported real estate agencies on the web (PHP) and desktop (C) systems, with advanced SQL queries',
                        'Reproduced bugs, wrote detailed tickets for development and validated fixes',
                        'Helped with bank integration certification via XML and API, and with JasperReports reports',
                    ],
                ],
            ],
            [
                'cargo' => ['pt_BR' => 'Atendimento ao Cliente (SAC de marketplaces)', 'en' => 'Customer Service (marketplaces)'],
                'empresa' => 'Ventureshop E-commerce',
                'inicio' => '2018-10-01',
                'fim' => '2020-07-01',
                'atividades' => [
                    'pt_BR' => ['Atendimento nos canais Mercado Livre e Netshoes: pedidos, trocas e reclamações'],
                    'en' => ['Customer service on Mercado Livre and Netshoes: orders, returns and complaints'],
                ],
            ],
        ];
    }
}
