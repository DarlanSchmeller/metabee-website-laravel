<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Display the login page
     */
    public function index(): View
    {
        return view('pages.auth.login');
    }

    /**
     * Attempt to authenticate a user
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:100',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent fixation attacks
            $request->session()->regenerate();

            return redirect()->intended(route('account.index'))->with('success', 'Você agora está logado!');
        }

        return redirect()->intended(route('login'))->with('error', 'As credenciais fornecidas não correspondem com nossos registros.')->withInput();
    }

    /**
     * Log a user out
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Você agora está deslogado, até breve!');
    }
}
