<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateForm extends Component
{
    public $courseFields;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->courseFields = [
            ['Duração (horas)', 'duration', 'number', '1'],
            ['Aulas', 'lessons', 'number', '1'],
            ['Projetos', 'projects', 'number', '0'],
            ['Idioma', 'language', 'text', 'Ex: Português'],
            ['Preço (R$)', 'price', 'number', '0.00']
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.create-form');
    }
}
