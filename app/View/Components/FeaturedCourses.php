<?php

namespace App\View\Components;

use App\Models\Course;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedCourses extends Component
{
    public $courses;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->courses = Course::orderBy('students', 'desc')->take(3)->get();
    }

    public function getLevelColor($level)
    {
        return match ($level) {
            'iniciante' => 'bg-green-100 text-green-800',
            'intermediario' => 'bg-yellow-100 text-yellow-800',
            'avancado' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.featured_courses');
    }
}
