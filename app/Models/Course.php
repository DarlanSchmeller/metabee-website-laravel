<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'title',
        'category',
        'description',
        'fullDescription',
        'image',
        'duration',
        'lessons',
        'instructor_id',
        'projects',
        'language',
        'price',
        'level',
        'certificate',
        'resources',
        'tags',
        'whatYouLearn',
        'skills',
        'curriculum',
        'requirements',
    ];

    protected $casts = [
        'tags' => 'array',
        'whatYouLearn' => 'array',
        'skills' => 'array',
        'curriculum' => 'object',
        'requirements' => 'array',
        'certificate' => 'boolean',
        'resources' => 'boolean',
        'rating' => 'float',
        'price' => 'float',
    ];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
}
