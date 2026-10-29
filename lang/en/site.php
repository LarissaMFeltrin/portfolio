<?php

declare(strict_types=1);

return [
    'meta' => [
        'titulo' => 'Larissa Feltrin · Full Stack Developer PHP/Laravel',
        'descricao' => 'Full Stack Developer based in Maringá, Brazil. PHP (Laravel and Yii2), MySQL and Angular, with banking, service invoice (NFS-e) and WhatsApp integrations in production.',
        'og_locale' => 'en_US',
    ],

    'menu' => [
        'principal' => 'Main',
        'sobre' => 'About',
        'projetos' => 'Projects',
        'experiencia' => 'Experience',
        'contato' => 'Contact',
        'outro_idioma' => 'PT',
        'outro_idioma_titulo' => 'Versão em português',
    ],

    'inicio' => [
        'sobretitulo' => 'Full Stack Developer · PHP / Laravel',
        'titulo' => "Hi, I'm Larissa. I build :destaque.",
        'titulo_destaque' => 'systems that run in production',
        'texto' => 'Business management systems in PHP (Laravel and Yii2), MySQL and Angular, with banking, service invoice and WhatsApp integrations. I take care of everything from the database to the live server.',
        'local' => 'Maringá, Brazil · on-site, hybrid or remote',
        'ver_projetos' => 'See projects',
        'numeros' => [
            ['valor' => '3+ years', 'texto' => 'working with SaaS business software, in support and development'],
            ['valor' => '4 systems', 'texto' => 'built by me and used by real customers'],
            ['valor' => '6 banks', 'texto' => 'integrated through their APIs, plus service invoices and WhatsApp'],
        ],
    ],

    'sobre' => [
        'sobretitulo' => 'About',
        'titulo' => 'From support to development',
        'paragrafos' => [
            "I started in customer support at Sistemas Cordon, helping real estate agencies, reproducing bugs and investigating data with SQL. That taught me to see software from the user's side. Since 2025 I have worked as a Full Stack Developer at the same company.",
            'I especially enjoy problems where a system has to talk to the outside world: banks, city tax systems, WhatsApp. Most of what I have built involves integrations, background jobs and failure handling, and also getting it live: Linux servers, databases, scheduled tasks and backups.',
            'Outside my job, I maintain my own systems, which already serve a customer in production. This portfolio is one of them: Laravel 13 and Filament, with its code open on GitHub.',
        ],
        'info' => [
            'Location' => 'Maringá, Paraná, Brazil',
            'Work model' => 'On-site, hybrid or remote',
            'Education' => 'Associate degree in Systems Analysis and Development (2024)',
            'Languages' => 'Portuguese (native) · English (intermediate, technical reading)',
        ],
    ],

    'projetos' => [
        'sobretitulo' => 'Projects',
        'titulo' => 'What I have built',
        'em_uso_por' => 'Used by',
        'situacao' => [
            'producao' => 'In production',
            'desenvolvimento' => 'In development',
        ],
        'origem' => [
            'proprio' => 'Own project',
            'empresa' => 'Company project',
        ],
        'aviso' => [
            'proprio' => 'Private code. I can walk through the code and a live demo in an interview.',
            'empresa' => ':empresa product: code and screens are not public.',
        ],
    ],

    'experiencia' => [
        'sobretitulo' => 'Experience',
        'titulo' => 'Where I have worked',
        'formato_mes' => 'M Y',
        'atual' => 'present',
        'formacao' => [
            'curso' => 'Associate degree in Systems Analysis and Development',
            'instituicao' => 'Faculdade Cidade Verde · completed Dec 2024',
        ],
    ],

    'habilidades' => [
        'sobretitulo' => 'Skills',
        'titulo' => 'What I work with',
        'grupos' => [
            'backend' => 'Back-end',
            'frontend' => 'Front-end',
            'integracoes' => 'Integrations',
            'banco' => 'Databases',
            'servidor' => 'Servers & deploy',
            'ferramentas' => 'Tools',
        ],
    ],

    'contato' => [
        'sobretitulo' => 'Contact',
        'titulo' => "Let's talk?",
        'texto' => "I'm open to PHP/Laravel, back-end or full stack developer roles, junior or mid-level.",
        'email' => 'Email',
        'form' => [
            'nome' => 'Your name',
            'email' => 'Your email',
            'empresa' => 'Company (optional)',
            'mensagem' => 'Message',
            'enviar' => 'Send message',
        ],
        'enviada' => "Message sent! I'll reply to your email as soon as I can.",
        'limite' => "You've sent several messages in a short time. Please try again later, or reach me on LinkedIn.",
        'erros' => [
            'required' => 'Please fill in your :attribute.',
            'email' => 'Please enter a valid email.',
            'max' => 'The :attribute may have at most :max characters.',
            'min' => 'Please write at least :min characters in the :attribute.',
        ],
        'campos' => [
            'nome' => 'name',
            'email' => 'email',
            'empresa' => 'company',
            'mensagem' => 'message',
        ],
        'aviso_email' => [
            'assunto' => 'New portfolio message: :nome',
        ],
    ],

    'rodape' => [
        'feito_com' => 'Built with Laravel and Filament ·',
        'codigo' => 'see the code',
    ],
];
