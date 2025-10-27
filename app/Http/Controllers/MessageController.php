<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'string|min:6|max:120',
            'email' => 'email|min:6|max:100',
            'message' => 'string|min:20|max:300',
        ]);

        Message::create($validatedData);

        return redirect()->back()->with([
            'success' => 'Mensagem enviada, entraremos em contato em breve!',
            'message_sent' => true,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
