<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $curso): View
    {
        $courses = Course::paginate(9);
        
        return view('pages.courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course): View
    {
        $course = Course::where('id', $course)->get();

        return view('pages.courses.show', $course);
    }

    public function search(Request $request): View
    {
        $searchKeywords = strtolower($request->input('keywords'));
        $searchCategories = $request->input('categories', []);
        $query = Course::query();

        if ($searchKeywords) {
            $query->where(function($q) use ($searchKeywords) {
                $q->whereRaw('LOWER(title) like ?', ['%' . $searchKeywords . '%']);
                    $q->orWhereRaw('LOWER(description) like ?', ['%' . $searchKeywords . '%']);
            });
        }

        if (!empty($searchCategories)) {
            $searchCategories = array_map('strtolower', $searchCategories);
            $query->whereIn('category', $searchCategories);
        }

        $courses = $query->paginate(10);
        
        return view('pages.courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
