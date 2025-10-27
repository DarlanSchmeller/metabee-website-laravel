<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'contact_messages';

    protected $fillable = [
        'name',
        'email',
        'message',
        'created_at',
        'updated_at',
    ];
}
