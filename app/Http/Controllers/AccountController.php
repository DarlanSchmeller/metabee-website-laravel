<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AccountController extends Controller
{
    /**
     * Display my account page
     */
    public function index(): View
    {
        // Get current authenticated user
        $user = Auth::user();

        return view('pages.account.minha-conta')->with('user', $user);
    }

    /**
     * Update the user personal information
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate data
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'bio' => 'string|max:800',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:2080',
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Hash password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Update the user information
        $user->update($validatedData);

        return redirect()->route('login')->with('success', 'Seus dados foram atualizados com sucesso!');
    }

    /**
     * Delete user account
     */
    public function destroy(): RedirectResponse
    {
        $user = Auth::user();

        // Block instructors from deleting their account
        if ($user->role === 'instructor') {
            return redirect()->back()->with('error', 'A conta de um instrutor não deve ser apagada');
        }

        // Delete user image
        if ($user->user_image) {
            Storage::disk('public')->delete($user->user_image);
        }

        // Delete account
        $user->delete();

        return redirect()->route('home')->with('success', 'Sua conta foi apagada com sucesso!');
    }
}
