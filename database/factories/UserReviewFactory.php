<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserReview>
 */
class UserReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::where('id', '!=', 1)->pluck('id')->toArray();
        $courseIds = Course::pluck('id')->toArray();

        return [
            'user_id' => fake()->randomElement($userIds),
            'course_id' => fake()->randomElement($courseIds),
            'content' => fake()->paragraph(4, true),
            'rating' => fake()->numberBetween(2, 5),
        ];
    }
}
