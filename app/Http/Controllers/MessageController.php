<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class MessageController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of messages.
     */
    public function index(): View
    {
        // Check if user is authorized
        $this->authorize('view', Message::class);

        // Get messages
        $messages = Message::latest()->paginate(5);

        return view('pages.messages.index')->with('messages', $messages);
    }

    /**
     * Store a newly created message in DB.
     */
    public function store(Request $request): RedirectResponse
    {
        try {
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
        } catch (ValidationException $e) {
            return redirect(url()->previous().'#contact')
                ->withErrors($e->validator)
                ->withInput();
        }
    }

    /**
     * Remove the specified message from DB.
     */
    public function destroy(Message $message): RedirectResponse
    {
        // Check if user is authorized to delete
        $this->authorize('delete', Message::class);

        $message->delete();

        return redirect()->back()->with('success', 'Mensagem deletada com sucesso!');
    }
}
