<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessagePolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(): bool
    {
        $user = Auth::user();

        return $user->role === 'instructor';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(): bool
    {
        $user = Auth::user();

        return $user->role === 'instructor';
    }
}
