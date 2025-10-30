<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'certificate' => 'boolean',
        'resources' => 'boolean',
        'rating' => 'float',
        'price' => 'float',
        'tags' => 'array',
        'whatYouLearn' => 'array',
        'skills' => 'array',
        'curriculum' => 'array',
        'requirements' => 'array',
    ];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(UserReview::class);
    }
}
