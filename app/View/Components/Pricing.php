<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pricing extends Component
{
    public $plans;

    public function __construct()
    {
        $this->plans = [
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
                'highlighted' => false
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
                'highlighted' => true
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
                'highlighted' => false
            ],
        ];
    }

    public function render()
    {
        return view('components.pricing');
    }
}
