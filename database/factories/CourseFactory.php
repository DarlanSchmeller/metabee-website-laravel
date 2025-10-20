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
        $placeholderThumbnails = [
            'https://images.pexels.com/photos/8294614/pexels-photo-8294614.jpeg?auto=compress&cs=tinysrgb&w=800',
            'https://images.pexels.com/photos/8386440/pexels-photo-8386440.jpeg?auto=compress&cs=tinysrgb&w=800',
            'https://images.pexels.com/photos/2599244/pexels-photo-2599244.jpeg?auto=compress&cs=tinysrgb&w=800',
            'https://images.pexels.com/photos/8294608/pexels-photo-8294608.jpeg?auto=compress&cs=tinysrgb&w=800',
            'https://images.pexels.com/photos/2599244/pexels-photo-2599244.jpeg?auto=compress&cs=tinysrgb&w=800',
            'https://images.pexels.com/photos/1108101/pexels-photo-1108101.jpeg?auto=compress&cs=tinysrgb&w=800',
            'https://images.pexels.com/photos/442587/pexels-photo-442587.jpeg?auto=compress&cs=tinysrgb&w=800',
            'https://images.pexels.com/photos/8386434/pexels-photo-8386434.jpeg?auto=compress&cs=tinysrgb&w=800',
        ];

        return [
            'title' => fake()->sentence(6, 3),
            'category' => fake()->randomElement(['ia & ml', 'hardware', 'programacao']),
            'description' => fake()->paragraph(2),
            'image' => fake()->randomElement($placeholderThumbnails),
            'instructor' => fake()->name(),
            'duration' => fake()->numberBetween(1, 80),
            'students' => fake()->numberBetween(12, 520),
            'rating' => fake()->randomFloat(1, 3, 5),
            'price' => fake()->randomFloat(2, 10, 200),
            'level' => fake()->randomElement(['iniciante', 'intermediario', 'avancado']),
        ];
    }
}
