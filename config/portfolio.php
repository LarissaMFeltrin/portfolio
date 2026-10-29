<?php

declare(strict_types=1);

return [

    /*
     * Idiomas do site. O primeiro e o principal: e nele que o conteudo e
     * escrito, e e para ele que um texto sem traducao volta.
     */
    'idiomas' => ['pt_BR', 'en'],

    'contato' => [
        'email' => env('PORTFOLIO_EMAIL', 'lari-feltrin@hotmail.com'),
        'linkedin' => 'https://www.linkedin.com/in/larissa-feltrin-096511208',
        'github' => 'https://github.com/LarissaMFeltrin',
        'repositorio' => 'https://github.com/LarissaMFeltrin/portfolio',

        // Quem recebe o aviso de mensagem nova do formulario.
        'notificar' => env('PORTFOLIO_NOTIFICAR', env('PORTFOLIO_EMAIL', 'lari-feltrin@hotmail.com')),

        // Mensagens por IP, por hora. Acima disso e robo, nao recrutador.
        'limite_por_hora' => (int) env('PORTFOLIO_CONTATO_LIMITE', 5),
    ],

    /*
     * Nomes de tecnologia nao se traduzem; so o titulo do grupo, que fica em
     * lang/{idioma}/site.php (habilidades.grupos).
     */
    'habilidades' => [
        'backend' => ['PHP', 'Laravel', 'Yii2', 'Eloquent', 'Filament', 'Livewire', 'MVC'],
        'frontend' => ['Angular', 'JavaScript', 'HTML5', 'CSS3', 'Bootstrap', 'AdminLTE', 'Blade'],
        'integracoes' => ['REST', 'SOAP', 'Webhooks', 'APIs bancárias', 'CNAB', 'NFS-e', 'WhatsApp Cloud API', 'Evolution API'],
        'banco' => ['MySQL', 'MariaDB', 'SQL', 'Migrations'],
        'servidor' => ['Linux', 'Nginx', 'Cron', 'SSL', 'Backup'],
        'ferramentas' => ['Git', 'GitHub', 'GitLab', 'PHPUnit', 'JasperReports'],
    ],

];
