<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Features extends Component
{
    public $features;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->features = [
            'Acesso aos cursos adquiridos',
            'Dashboard de progresso',
            'Sessões mensais de perguntas e respostas ao vivo',
            'Certificados de conclusão de cursos',
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.features');
    }
}
