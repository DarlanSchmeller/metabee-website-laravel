<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    public function updatePersonalInfo(Request $request)
    {
        $user = Auth::user();


        // Validate data
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100',
            'bio' => 'string|max:800',
            'user_image' => 'image|mimes:jpeg,png,jpg,webp|max:2080',
        ]);

        if ($request->hasFile('user_image')) {
            // Delete old image
            if ($user->user_image) {
                Storage::disk('public')->delete($user->user_image);
            }

            // Store new image
            $imagePath = $request->file('user_image')->store('user_images', 'public');
            $validatedData['user_image'] = $imagePath;
        }

        // Update the user information
        $user->update($validatedData);

        return redirect()->back()->with('success', 'Seus dados foram atualizados com sucesso!');
    }

    /**
     * Update the user credentials
     */
    public function updateUserCredentials(Request $request)
    {
        // Validate data
        $validatedData = $request->validate([
            'password' => 'required|string|min:8',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Confirm current password is correct
        if (! Hash::check($validatedData['password'], $user->password)) {
            return redirect()->back()->with('error', 'A senha atual está incorreta.');
        }

        // Hash password
        $validatedData['password'] = Hash::make($validatedData['new-password']);
        unset($validatedData['new-password']);

        // Update the user credentials
        $user->update($validatedData);

        return redirect()->route('account.index')->with('success', 'Suas credenciais foram atualizadas com sucesso!');
    }

    /**
     * Delete user account
     */
    public function destroy(): RedirectResponse
    {
        $user = Auth::user();

        // Block instructors from deleting their account
        if ($user->role === 'instructor') {
            return redirect()->back()->with('error', 'A conta de um instrutor não deve ser deletada');
        }

        // Delete user image
        if ($user->user_image) {
            Storage::disk('public')->delete($user->user_image);
        }

        // Delete account
        $user->delete();

        return redirect()->route('home')->with('success', 'Sua conta foi deletada com sucesso!');
    }
}
