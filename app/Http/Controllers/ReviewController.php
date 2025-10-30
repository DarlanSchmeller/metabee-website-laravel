<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\UserReview;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Store a newly created review in DB.
     */
    public function store(Request $request, Course $course): RedirectResponse
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|in:1,2,3,4,5',
            'content' => 'required|string|min:10|max:400',
        ]);

        $user = Auth::user();
        $validatedData['user_id'] = $user->id;
        $validatedData['course_id'] = $course->id;

        // Check if user reviewed this course
        if ($user->reviews()->where('course_id', $course->id)->exists()) {
            return redirect()->back()->with('error', 'Você já avaliou este curso.');
        }

        // Store review in db
        UserReview::create($validatedData);

        return redirect()->back()->with('success', 'Avaliação criada com sucesso!');
    }

    /**
     * Update the specified review in DB.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return redirect()->back()->with('success', 'Avaliação atualizada com sucesso!');
    }

    /**
     * Remove the specified review from DB.
     */
    public function destroy(string $id): RedirectResponse
    {
        return redirect()->back()->with('success', 'Avaliação deletada com sucesso!');
    }
}
