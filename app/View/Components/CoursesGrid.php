<?php

namespace App\View\Components;

use App\Models\Course;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CoursesGrid extends Component
{
    public $courseModel;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->courseModel = Course::class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.courses-grid');
    }
}
