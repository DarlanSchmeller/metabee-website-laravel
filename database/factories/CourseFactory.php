<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6, 3),
            'category' => fake()->randomElement(['iniciante', 'intermediario', 'avancado', 'ia & ml', 'hardware', 'programacao']),
            'description' => fake()->paragraph(2),
            'image' => fake()->imageUrl(640, 480, 'technics', true),
            'instructor' => fake()->name(),
            'students' => fake()->numberBetween(12, 520),
            'rating' => fake()->randomFloat(1, 3, 5),
            'price' => fake()->randomFloat(2, 10, 200),
            'level' => fake()->randomElement(['iniciante', 'intermediario', 'avancado']),
        ];
    }
}
