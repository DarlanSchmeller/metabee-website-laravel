<?php

namespace App\Http\Controllers;

use App\Constants\Globals;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CourseController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the course.
     */
    public function index(): View
    {
        $courses = Course::with(['modules' => fn($q) => $q->withSum('lessons', 'duration')])
            ->latest()
            ->paginate(9)
            ->through(function ($course) {
                $course->total_duration = $course->modules->sum('lessons_sum_duration');
                return $course;
            });

        return view('pages.courses.index', compact('courses'));
    }


    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
        // Check if user is authorized
        $this->authorize('create', Course::class);

        return view('pages.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $categoryLabels = collect(Globals::COURSE_CATEGORIES)->pluck('label')->implode(',');
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'category' => 'required|in:' . $categoryLabels,
            'description' => 'required|string|max:300',
            'fullDescription' => 'nullable|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2080',
            'projects' => 'nullable|integer|min:0',
            'language' => 'nullable|string|max:50',
            'price' => 'nullable|numeric|min:0',
            'level' => 'required|in:iniciante,intermediario,avançado',
            'modules' => 'required|array|min:1',
            'modules.*.title' => 'required|string|max:100',
            'modules.*.lessons' => 'required|array|min:1',
            'modules.*.lessons.*.title' => 'required|string|max:100',
            'modules.*.lessons.*.url' => 'required|url|max:255',
            'modules.*.lessons.*.duration' => 'required|integer',
            'tags' => 'nullable|string',
            'whatYouLearn' => 'nullable|string',
            'skills' => 'nullable|string',
            'requirements' => 'nullable|string',
        ]);

        if (empty($validatedData['modules'])) {
            return redirect()->back()->withInput()->with('error', 'O currículo do curso é obrigatório!');
        }

        // Handle checkboxes
        $validatedData['certificate'] = $request->has('certificate');
        $validatedData['resources'] = $request->has('resources');

        // Assign instructor_id to course
        $validatedData['instructor_id'] = Auth::user()->id;

        // Handle fields that should be JSON
        $jsonFields = ['tags', 'whatYouLearn', 'skills', 'requirements'];
        foreach ($jsonFields as $field) {
            // Split string by comma and filter out empty values
            if (! empty($validatedData[$field])) {
                $validatedData[$field] = array_values(array_filter(array_map('trim', explode(',', $validatedData[$field]))));
            } else {
                $validatedData[$field] = [];
            }
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('course_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Grab modules data and unset
        $modules = $validatedData['modules'];
        unset($validatedData['modules']);

        $course = Course::create($validatedData);

        // Create modules in DB
        foreach ($modules as $index => $moduleData) {
            $moduleData['course_id'] = $course->id;
            $moduleData['order'] = $index;

            // Get lessons data and unset
            $lessons = $moduleData['lessons'];
            unset($moduleData['lessons']);

            $module = Module::create($moduleData);

            // Create lessons in DB
            foreach ($lessons as $index => $lesson) {
                Lesson::create([
                    'module_id' => $module->id,
                    'title' => $lesson['title'],
                    'url' => $lesson['url'],
                    'duration' => $lesson['duration'],
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso!');
    }

    /**
     * Display the specified course.
     */
    public function show($id)
    {
        $course = Course::with([
            'instructor',
            'modules' => function ($query) {
                $query->withCount('lessons');
                $query->withSum('lessons', 'duration');
            }
        ])->findOrFail($id);

        // Get course duration and lesson count
        $courseTotalDuration = $course->modules->sum('lessons_sum_duration');
        $courseTotalLessons = $course->modules->sum('lessons_count');

        return view('pages.courses.show')->with([
            'course' => $course,
            'courseTotalDuration' => $courseTotalDuration,
            'courseTotalLessons' => $courseTotalLessons
        ]);
    }

    public function search(Request $request): View
    {
        $searchKeywords = strtolower($request->input('keywords'));
        $searchCategories = $request->input('categories', []);
        $query = Course::query();

        if ($searchKeywords) {
            $query->where(function ($q) use ($searchKeywords) {
                $q->whereRaw('LOWER(title) like ?', ['%' . $searchKeywords . '%']);
                $q->orWhereRaw('LOWER(description) like ?', ['%' . $searchKeywords . '%']);
            });
        }

        if (! empty($searchCategories)) {
            $searchCategories = array_map('strtolower', $searchCategories);
            $query->whereIn('category', $searchCategories);
        }

        $courses = $query->paginate(9)
            ->appends($request->only(['keywords', 'categories']));

        return view('pages.courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for editing the specified course.
     */
    public function edit(Course $course): View
    {
        // Check if user is authorized
        $this->authorize('update', $course);

        // Load the modules
        $course->load('modules');

        return view('pages.courses.edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course): RedirectResponse
    {
        $categoryLabels = collect(Globals::COURSE_CATEGORIES)->pluck('label')->implode(',');
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'category' => 'required|in:' . $categoryLabels,
            'description' => 'required|string|max:300',
            'fullDescription' => 'nullable|string|max:1000',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:2080',
            'projects' => 'nullable|integer|min:0',
            'language' => 'nullable|string|max:50',
            'price' => 'nullable|numeric|min:0',
            'level' => 'required|in:iniciante,intermediario,avançado',
            'modules' => 'required|array|min:1',
            'modules.*.title' => 'required|string|max:100',
            'modules.*.lessons' => 'required|array|min:1',
            'modules.*.lessons.*.title' => 'required|string|max:100',
            'modules.*.lessons.*.url' => 'required|url|max:255',
            'modules.*.lessons.*.duration' => 'required|integer',
            'tags' => 'nullable|string',
            'whatYouLearn' => 'nullable|string',
            'skills' => 'nullable|string',
            'requirements' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('course_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Handle fields that should be JSON
        $jsonFields = ['tags', 'whatYouLearn', 'skills', 'requirements'];
        foreach ($jsonFields as $field) {
            // Split string by comma and filter out empty values
            if (! empty($validatedData[$field])) {
                $validatedData[$field] = array_values(array_filter(array_map('trim', explode(',', $validatedData[$field]))));
            } else {
                $validatedData[$field] = [];
            }
        }

        // Handle checkboxes
        $validatedData['certificate'] = $request->has('certificate');
        $validatedData['resources'] = $request->has('resources');

        // Grab modules data and unset
        $modulesData = $validatedData['modules'];
        unset($validatedData['modules']);

        // Update course
        $course->update($validatedData);

        // Sync modules
        $existingModuleIds = $course->modules()->pluck('id')->toArray();
        $incomingModuleIds = [];

        foreach ($modulesData as $moduleIndex => $moduleData) {
            $lessonsData = $moduleData['lessons'] ?? [];
            unset($moduleData['lessons']);

            if (!empty($moduleData['id'])) {
                // Update existing module
                $module = Module::find($moduleData['id']);
                $module->update([
                    'title' => $moduleData['title'],  // make sure it's 'title' not 'module'
                    'order' => $moduleIndex,
                ]);
            } else {
                // Create new module
                $module = $course->modules()->create([
                    'title' => $moduleData['title'],
                    'order' => $moduleIndex,
                ]);
            }

            $incomingModuleIds[] = $module->id;

            // Sync lessons for this module
            $existingLessonIds = $module->lessons()->pluck('id')->toArray();
            $incomingLessonIds = [];

            foreach ($lessonsData as $lessonIndex => $lesson) {
                if (!empty($lesson['id'])) {
                    // Update existing lesson
                    $existingLesson = Lesson::find($lesson['id']);
                    if ($existingLesson) {
                        $existingLesson->update([
                            'title' => $lesson['title'],
                            'url' => $lesson['url'],
                            'duration' => $lesson['duration'],
                            'order' => $lessonIndex,
                        ]);
                        $incomingLessonIds[] = $existingLesson->id;
                    }
                } else {
                    // Create new lesson
                    $newLesson = $module->lessons()->create([
                        'title' => $lesson['title'],
                        'url' => $lesson['url'],
                        'duration' => $lesson['duration'],
                        'order' => $lessonIndex,
                    ]);
                    $incomingLessonIds[] = $newLesson->id;
                }
            }

            // Delete lessons that were removed from form
            $lessonsToDelete = array_diff($existingLessonIds, $incomingLessonIds);
            if (!empty($lessonsToDelete)) {
                Lesson::whereIn('id', $lessonsToDelete)->delete();
            }
        }

        // Delete modules that were removed from form
        $modulesToDelete = array_diff($existingModuleIds, $incomingModuleIds);
        if (!empty($modulesToDelete)) {
            Module::whereIn('id', $modulesToDelete)->delete();
        }


        return redirect()->route('cursos.show', $course->id)->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course): RedirectResponse
    {
        // Check if user is authorized
        $this->authorize('delete', $course);

        // Delete Course Image
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }

        // Delete course from DB
        $course->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso deletado com sucesso!');
    }
}
