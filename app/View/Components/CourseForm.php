<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CourseForm extends Component
{
    public $courseFields;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->courseFields = [
            ['Duração (horas)', 'duration', 'number', '1', null],
            ['Aulas', 'lessons', 'number', '1', null],
            ['Projetos', 'projects', 'number', '0', null],
            ['Idioma', 'language', 'text', 'Ex: Português', null],
            ['Preço (R$)', 'price', 'number', '0.00', '0.01'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.course-form');
    }
}
