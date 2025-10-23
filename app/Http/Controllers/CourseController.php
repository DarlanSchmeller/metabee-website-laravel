<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CourseController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(Course $curso): View
    {
        $courses = Course::latest()->paginate(9);

        return view('pages.courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'category' => 'required|string|max:50',
            'description' => 'required|string|max:300',
            'fullDescription' => 'nullable|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2080',
            'duration' => 'nullable|integer|min:0',
            'lessons' => 'nullable|integer|min:0',
            'projects' => 'nullable|integer|min:0',
            'language' => 'nullable|string|max:50',
            'price' => 'nullable|numeric|min:0',
            'level' => 'required|in:iniciante,intermediario,avançado',
            'modules.*.module' => 'required|string|max:100',
            'modules.*.lessons' => 'required|integer|min:1',
            'modules.*.duration' => 'required|string|max:50',
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

        // Handle curriculum
        $validatedData['curriculum'] = $validatedData['modules'];
        unset($validatedData['modules']);

        // Handle image upload

        Course::create($validatedData);

        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = Course::with('instructor')->findOrFail($id);

        return view('pages.courses.show')->with('course', $course);
    }

    public function search(Request $request): View
    {
        $searchKeywords = strtolower($request->input('keywords'));
        $searchCategories = $request->input('categories', []);
        $query = Course::query();

        if ($searchKeywords) {
            $query->where(function ($q) use ($searchKeywords) {
                $q->whereRaw('LOWER(title) like ?', ['%'.$searchKeywords.'%']);
                $q->orWhereRaw('LOWER(description) like ?', ['%'.$searchKeywords.'%']);
            });
        }

        if (! empty($searchCategories)) {
            $searchCategories = array_map('strtolower', $searchCategories);
            $query->whereIn('category', $searchCategories);
        }

        $courses = $query->paginate(10);

        return view('pages.courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course): View
    {
        // Check if user is authorized
        $this->authorize('update', $course);

        return view('pages.courses.edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course): RedirectResponse
    {
        // Check if user is authorized
        $this->authorize('delete', $course);

        // Delete course from DB
        $course->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso deletado com sucesso!');
    }
}
