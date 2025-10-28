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
        $this->courses = Course::with(['modules' => fn($q) => $q->withSum('lessons', 'duration')])
            ->orderBy('students', 'desc')
            ->take(3)
            ->get()
            ->map(function ($course) {
                // Sum all module lesson durations
                $course->total_duration = $course->modules->sum('lessons_sum_duration');
                return $course;
            });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.featured_courses');
    }
}
