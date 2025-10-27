<?php

namespace App\View\Components;

use App\Constants\Globals;
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
                'links' => Globals::COURSE_CATEGORIES,
            ],
            [
                'title' => 'Recursos',
                'links' => [
                    ['label' => 'Documentação', 'href' => '/documentacao'],
                    ['label' => 'Tutoriais', 'href' => '/tutoriais'],
                    ['label' => 'Comunidade', 'href' => '/comunidade'],
                    ['label' => 'Carreiras', 'href' => '/carreiras'],
                ],
            ],
            [
                'title' => 'Empresa',
                'links' => Globals::MAIN_PAGES,
            ],
            [
                'title' => 'Suporte',
                'links' => [
                    ['label' => 'Central de Ajuda', 'href' => '/ajuda'],
                    ['label' => 'Suporte ao Estudante', 'href' => '/suporte'],
                    ['label' => 'Política de Reembolso', 'href' => '/reembolso'],
                    ['label' => 'Termos de Serviço', 'href' => '/termos'],
                ],
            ],
        ];
    }

    public function render(): View
    {
        return view('components.footer');
    }
}
