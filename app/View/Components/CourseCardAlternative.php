<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CourseCardAlternative extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function getLevelColor($level)
    {
        return match ($level) {
            'iniciante' => 'bg-green-100 text-green-800',
            'intermediario' => 'bg-yellow-100 text-yellow-800',
            'avançado' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.course-card-alternative');
    }
}
