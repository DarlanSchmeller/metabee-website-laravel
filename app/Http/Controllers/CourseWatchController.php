<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\UserCompletedLesson;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CourseWatchController extends Controller
{
    /**
     * Display the specified lesson.
     */
    public function show(Course $course, Module $module, Lesson $lesson): View
    {
        $user = Auth::user();

        $modules = $course->modules()
            ->with('lessons')
            ->orderBy('order', 'asc')
            ->get();

        // Flatten all lessons in order
        $allLessons = $modules->flatMap(fn($mod) => $mod->lessons->sortBy('order'));
        $currentIndex = $allLessons->search(fn($l) => $l->id === $lesson->id);

        // Previous & next lessons
        $previousLesson = $allLessons->get($currentIndex - 1);
        $nextLesson     = $allLessons->get($currentIndex + 1);

        $completedLessonIds = $user->completedLessons()
            ->whereIn('lesson_id', $modules->pluck('lessons.*.id')->flatten())
            ->pluck('lesson_id')
            ->toArray();

        $courseTotalLessons = $modules->sum(fn($mod) => $mod->lessons->count());
        $completedCurrentLesson = in_array($lesson->id, $completedLessonIds);
        $progress = round(count($completedLessonIds) / $courseTotalLessons * 100);

        return view('pages.courses.watch')->with([
            'course' => $course,
            'courseTotalLessons' => $courseTotalLessons,
            'module' => $module,
            'lesson' => $lesson,
            'progress' => $progress,
            'completedLessonIds' => $completedLessonIds,
            'completedCurrentLesson' => $completedCurrentLesson,
            'modules' => $modules,
            'previousLesson' => $previousLesson,
            'nextLesson' => $nextLesson,
        ]);
    }

    /**
     * Mark a lesson as completed in DB
     */
    public function completeLesson(Lesson $lesson): RedirectResponse
    {
        $user = Auth::user();

        UserCompletedLesson::create([
            'user_id' => $user->id,
            'lesson_id' => $lesson->id,
        ]);

        return redirect()->back()->with('success', 'Aula concluída com sucesso!');
    }

    /**
     * Delete a completed lesson check from DB
     */
    public function uncompleteLesson(Lesson $lesson): RedirectResponse
    {
        $user = Auth::user();

        UserCompletedLesson::where([
            'user_id' => $user->id,
            'lesson_id' => $lesson->id,
        ])->delete();

        return redirect()->back()->with('success', 'Aula marcada como incompleta.');
    }
}
