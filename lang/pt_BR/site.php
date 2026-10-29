<?php

declare(strict_types=1);

return [
    'meta' => [
        'titulo' => 'Larissa Feltrin · Desenvolvedora Full Stack PHP/Laravel',
        'descricao' => 'Desenvolvedora Full Stack em Maringá – PR. PHP (Laravel e Yii2), MySQL e Angular, com integrações bancárias, NFS-e e WhatsApp em produção.',
        'og_locale' => 'pt_BR',
    ],

    'menu' => [
        'principal' => 'Principal',
        'sobre' => 'Sobre',
        'projetos' => 'Projetos',
        'experiencia' => 'Experiência',
        'contato' => 'Contato',
        'outro_idioma' => 'EN',
        'outro_idioma_titulo' => 'English version',
    ],

    'inicio' => [
        'sobretitulo' => 'Desenvolvedora Full Stack · PHP / Laravel',
        'titulo' => 'Olá, eu sou a Larissa. Desenvolvo :destaque.',
        'titulo_destaque' => 'sistemas que rodam em produção',
        'texto' => 'Sistemas de gestão em PHP (Laravel e Yii2), MySQL e Angular, com integrações bancárias, nota fiscal de serviço e WhatsApp. Cuido do banco de dados até o servidor no ar.',
        'local' => 'Maringá – PR · presencial, híbrido ou remoto',
        'ver_projetos' => 'Ver projetos',
        'numeros' => [
            ['valor' => '3+ anos', 'texto' => 'em sistemas SaaS de gestão, entre suporte e desenvolvimento'],
            ['valor' => '4 sistemas', 'texto' => 'desenvolvidos por mim e em uso por clientes reais'],
            ['valor' => '6 bancos', 'texto' => 'integrados via API, além de NFS-e e WhatsApp'],
        ],
    ],

    'sobre' => [
        'sobretitulo' => 'Sobre',
        'titulo' => 'Do suporte ao desenvolvimento',
        'paragrafos' => [
            'Comecei no suporte da Sistemas Cordon, atendendo imobiliárias, reproduzindo erros e investigando dados com SQL. Esse tempo me ensinou a enxergar o sistema pelo lado de quem usa. Desde 2025 trabalho como desenvolvedora Full Stack na mesma empresa.',
            'Gosto principalmente de problemas em que o sistema precisa conversar com o mundo de fora: banco, prefeitura, WhatsApp. Boa parte do que construí envolve integrações, rotinas em segundo plano e tratamento de falhas, e também a parte de colocar no ar: servidor Linux, banco de dados, agendamentos e backup.',
            'Além do trabalho, mantenho meus próprios sistemas, que já atendem um cliente em produção. Este portfólio também é um deles: Laravel 13 e Filament, com o código aberto no GitHub.',
        ],
        'info' => [
            'Localização' => 'Maringá – PR',
            'Modelo de trabalho' => 'Presencial, híbrido ou remoto',
            'Formação' => 'Tecnólogo em Análise e Desenvolvimento de Sistemas (2024)',
            'Inglês' => 'Intermediário · leitura técnica e documentação',
        ],
    ],

    'projetos' => [
        'sobretitulo' => 'Projetos',
        'titulo' => 'O que eu construí',
        'em_uso_por' => 'Em uso por',
        'situacao' => [
            'producao' => 'Em produção',
            'desenvolvimento' => 'Em desenvolvimento',
        ],
        'origem' => [
            'proprio' => 'Projeto próprio',
            'empresa' => 'Projeto da empresa',
        ],
        'aviso' => [
            'proprio' => 'Código privado. Apresento o código e o sistema funcionando na entrevista.',
            'empresa' => 'Produto da :empresa: código e telas não são públicos.',
        ],
    ],

    'experiencia' => [
        'sobretitulo' => 'Experiência',
        'titulo' => 'Por onde passei',
        'formato_mes' => 'M/Y',
        'atual' => 'atual',
        'formacao' => [
            'curso' => 'Tecnólogo em Análise e Desenvolvimento de Sistemas',
            'instituicao' => 'Faculdade Cidade Verde · concluído em dez/2024',
        ],
    ],

    'habilidades' => [
        'sobretitulo' => 'Habilidades',
        'titulo' => 'Com o que eu trabalho',
        'grupos' => [
            'backend' => 'Back-end',
            'frontend' => 'Front-end',
            'integracoes' => 'Integrações',
            'banco' => 'Banco de dados',
            'servidor' => 'Servidor e deploy',
            'ferramentas' => 'Ferramentas',
        ],
    ],

    'contato' => [
        'sobretitulo' => 'Contato',
        'titulo' => 'Vamos conversar?',
        'texto' => 'Estou aberta a vagas de desenvolvedora PHP/Laravel, back-end ou full stack, júnior ou pleno.',
        'email' => 'E-mail',
        'form' => [
            'nome' => 'Seu nome',
            'email' => 'Seu e-mail',
            'empresa' => 'Empresa (opcional)',
            'mensagem' => 'Mensagem',
            'enviar' => 'Enviar mensagem',
        ],
        'enviada' => 'Mensagem enviada! Respondo no seu e-mail assim que puder.',
        'limite' => 'Você já enviou várias mensagens agora há pouco. Tente de novo mais tarde, ou me chame pelo LinkedIn.',
        'erros' => [
            'required' => 'Preencha o campo :attribute.',
            'email' => 'Informe um e-mail válido.',
            'max' => 'O campo :attribute aceita no máximo :max caracteres.',
            'min' => 'Escreva pelo menos :min caracteres na :attribute.',
        ],
        'campos' => [
            'nome' => 'nome',
            'email' => 'e-mail',
            'empresa' => 'empresa',
            'mensagem' => 'mensagem',
        ],
        'aviso_email' => [
            'assunto' => 'Mensagem nova no portfólio: :nome',
        ],
    ],

    'rodape' => [
        'feito_com' => 'Feito com Laravel e Filament ·',
        'codigo' => 'ver o código',
    ],
];
