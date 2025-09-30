<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Header extends Component
{
    public $menuItems;

    public function __construct()
    {
        $this->menuItems = [
            ['label' => 'Cursos', 'href' => '#'],
            ['label' => 'Sobre', 'href' => '#'],
            ['label' => 'Instrutores', 'href' => '#'],
            ['label' => 'Planos', 'href' => '#'],
            ['label' => 'Contato', 'href' => '#'],
        ];
    }

    public function render(): View
    {
        return view('components.header');
    }
}
