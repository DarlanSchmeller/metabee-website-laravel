<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\View\View;

class CourseWatchController extends Controller
{
    /**
     * Display the specified lesson.
     */
    public function show(Course $course, Module $module, Lesson $lesson): View
    {
        $modules = $course->modules()
            ->with('lessons')
            ->orderBy('order', 'asc')
            ->get();

        $courseTotalLessons = $modules->sum(fn ($mod) => $mod->lessons->count());

        return view('pages.courses.watch')->with([
            'course' => $course,
            'courseTotalLessons' => $courseTotalLessons,
            'module' => $module,
            'lesson' => $lesson,
            'modules' => $modules,
        ]);
    }
}
