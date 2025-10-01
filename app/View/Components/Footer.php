<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Footer extends Component
{
    public $footerSections;
    public $socialLinks;

    public function __construct()
    {
        $this->footerSections = [
            [
                'title' => 'Cursos',
                'links' => [
                    'Fundamentos de Robótica',
                    'Machine Learning',
                    'Automação Industrial',
                    'Tecnologia de Drones',
                ],
            ],
            [
                'title' => 'Recursos',
                'links' => [
                    'Documentação',
                    'Tutoriais',
                    'Comunidade',
                    'Carreiras'
                ],
            ],
            [
                'title' => 'Empresa',
                'links' => [
                    'Sobre Nós',
                    'Cursos',
                    'Planos',
                    'Contato',
                ],
            ],
            [
                'title' => 'Suporte',
                'links' => [
                    'Central de Ajuda',
                    'Suporte ao Estudante',
                    'Política de Reembolso',
                    'Termos de Serviço'
                ],
            ],
        ];

        $this->socialLinks = [
            ['icon' => 'facebook', 'href' => '#'],
            ['icon' => 'twitter', 'href' => '#'],
            ['icon' => 'youtube', 'href' => '#'],
            ['icon' => 'linkedin', 'href' => '#'],
            ['icon' => 'instagram', 'href' => '#'],
        ];
    }

    public function render(): View
    {
        return view('components.footer');
    }
}
