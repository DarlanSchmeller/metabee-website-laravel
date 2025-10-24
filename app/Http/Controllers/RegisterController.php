<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new user.
     */
    public function create(): View
    {
        return view('pages.auth.register');
    }

    /**
     * Store a newly created user in DB.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate data
        $registrationData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Hash password
        $registrationData['password'] = Hash::make($registrationData['password']);

        // Create the new user
        $user = User::create($registrationData);

        return redirect()->route('login')->with('success', 'Você agora está registrado e pode realizar o login!');
    }

    /**
     * Remove the specified user from DB.
     */
    public function destroy(string $id)
    {
        //
    }
}
