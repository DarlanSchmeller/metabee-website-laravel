<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    protected $table = 'lessons';

    protected $fillable = [
        'module_id',
        'title',
        'duration',
        'url',
        'order',
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
