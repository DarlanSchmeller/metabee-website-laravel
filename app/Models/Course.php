<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'instructor',
        'instructorImage',
        'duration',
        'lessons',
        'students',
        'projects',
        'tags',
        'whatYouLearn',
        'skills',
        'curriculum',
        'requirements',
        'language',
        'certificate',
        'resources',
        'rating',
        'price',
        'level',
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
}
