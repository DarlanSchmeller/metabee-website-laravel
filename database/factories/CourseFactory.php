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
            'https://images.pexels.com/photos/1108101/pexels-photo-1108101.jpeg?auto=compress&cs=tinysrgb&w=800',
            'https://images.pexels.com/photos/442587/pexels-photo-442587.jpeg?auto=compress&cs=tinysrgb&w=800',
            'https://images.pexels.com/photos/8386434/pexels-photo-8386434.jpeg?auto=compress&cs=tinysrgb&w=800',
        ];

        return [
            'title' => fake()->sentence(6, 3),
            'category' => fake()->randomElement(['ia & ml', 'hardware', 'programacao']),
            'description' => fake()->paragraph(2),
            'fullDescription' => fake()->paragraphs(3, true),
            'image' => fake()->randomElement($placeholderThumbnails),
            'instructor' => fake()->name(),
            'instructorImage' => fake()->imageUrl(200, 200),
            'duration' => fake()->numberBetween(1, 80),
            'lessons' => fake()->numberBetween(5, 50),
            'students' => fake()->numberBetween(12, 520),
            'projects' => fake()->numberBetween(0, 10),
            'tags' => fake()->randomElements([
                'Popular', 'Featured', 'New', 'Trending', 'AI', 'Hardware', 'Programming'
            ], rand(1, 3)),
            'whatYouLearn' => fake()->sentences(rand(3, 6)),
            'skills' => fake()->words(rand(3, 6)),
            'curriculum' => array_map(fn($i) => [
                'module' => fake()->sentence(3),
                'lessons' => fake()->numberBetween(2, 8),
                'duration' => fake()->numberBetween(10, 120) . ' min'
            ], range(1, rand(3, 6))),
            'requirements' => fake()->sentences(rand(2, 5)),
            'language' => fake()->randomElement(['Português', 'English', 'Español']),
            'certificate' => fake()->boolean(),
            'resources' => fake()->boolean(),
            'rating' => fake()->randomFloat(1, 3, 5),
            'price' => fake()->randomFloat(2, 10, 200),
            'level' => fake()->randomElement(['iniciante', 'intermediario', 'avancado']),
        ];
    }
}
