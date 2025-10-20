<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeHero extends Component
{
    public $news_message;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->news_message = "Novo: Curso Avançado de Robótica com IA disponível";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home-hero');
    }
}
