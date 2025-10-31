<?php

namespace App\Constants;

class Globals
{
    const MAIN_PAGES = [
        ['label' => 'Home', 'href' => '/'],
        ['label' => 'Cursos', 'href' => '/cursos'],
        ['label' => 'Sobre nós', 'href' => '/sobre-nos'],
        ['label' => 'Planos', 'href' => '/planos'],
    ];

    const SEARCH_CATEGORY = '/cursos/search?keywords=&categories%5B%5D=';

    const COURSE_CATEGORIES = [
        ['icon' => 'cube', 'label' => 'Exploradores da Robótica', 'href' => self::SEARCH_CATEGORY.'Exploradores+da+Robótica'],
        ['icon' => 'wrench', 'label' => 'MakerBee', 'href' => self::SEARCH_CATEGORY.'MakerBee'],
        ['icon' => 'cpu-chip', 'label' => 'IA e ML', 'href' => self::SEARCH_CATEGORY.'IA+%e+ML'],
        ['icon' => 'computer-desktop', 'label' => 'Hardware', 'href' => self::SEARCH_CATEGORY.'Hardware'],
        ['icon' => 'code-bracket', 'label' => 'Programação', 'href' => self::SEARCH_CATEGORY.'Programação'],
    ];

    const COURSE_CATEGORY_LABELS = [
        'Exploradores da Robótica' => 'Exploradores da Robótica',
        'MakerBee' => 'MakerBee',
        'IA e ML' => 'IA e ML',
        'Hardware' => 'Hardware',
        'Programação' => 'Programação',
    ];

    const FACEBOOK_LINK = 'https://www.facebook.com/profile.php?id=61550807497574';

    const LINKEDIN_LINK = 'https://www.linkedin.com/company/metabee_educacaoerobotica/';

    const INSTAGRAM_LINK = 'https://www.instagram.com/metabee.robotica/';

    const PRICING = [
        [
            'name' => 'Starter',
            'icon' => 'academic-cap',
            'price' => '29',
            'period' => 'mês',
            'description' => 'Perfeito para iniciantes começando sua jornada em robótica',
            'features' => [
                'Acesso a 20+ cursos para iniciantes',
                'Participação no fórum da comunidade',
                'Modelos de projetos básicos',
                'Certificado de conclusão',
                'Suporte por e-mail',
            ],
            'highlighted' => false,
        ],
        [
            'name' => 'Profissional',
            'icon' => 'bolt',
            'price' => '79',
            'period' => 'mês',
            'description' => 'Ideal para estudantes sérios e profissionais',
            'features' => [
                'Acesso a todos os 200+ cursos',
                'Sessões ao vivo com instrutores',
                'Modelos de projetos avançados',
                'Suporte prioritário',
                'Certificados verificados',
                'Orientação de carreira',
                'Webinars exclusivos',
                'Recursos para download',
            ],
            'highlighted' => true,
        ],
        [
            'name' => 'Enterprise',
            'icon' => 'building-office',
            'price' => '299',
            'period' => 'mês',
            'description' => 'Para equipes e organizações',
            'features' => [
                'Tudo que tem no plano Profissional',
                'Painel personalizado para equipe',
                'Gerente de conta dedicado',
                'Criação de cursos customizados',
                'Acesso à API',
                'Análises avançadas',
                'Ferramentas de colaboração em equipe',
                'Membros ilimitados na equipe',
            ],
            'highlighted' => false,
        ],
    ];

    const PLANS = [
        'starter',
        'profissional',
        'enterprise',
    ];
}
