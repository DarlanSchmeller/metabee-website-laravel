<?php

namespace Database\Factories;

use App\Constants\Globals;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
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

        $user = User::first() ?? User::factory()->create();

        // Pick a random image URL
        $imageUrl = fake()->randomElement($placeholderThumbnails);

        // Download image content
        $imageContent = Http::get($imageUrl)->body();
        $fileName = Str::random(20).'.jpg';
        $path = 'course_images/'.$fileName;

        // Store the file in storage/app/public/course_images
        Storage::disk('public')->put($path, $imageContent);

        // Get course categories
        $categories = Globals::COURSE_CATEGORY_LABELS;

        return [
            'title' => fake()->sentence(6, 3),
            'category' => fake()->randomElement($categories),
            'description' => fake()->paragraph(2),
            'fullDescription' => fake()->paragraphs(3, true),

            // Store relative path (used with asset('storage/...'))
            'image' => $path,

            'instructor_id' => $user->id,
            'students' => fake()->numberBetween(12, 520),
            'projects' => fake()->numberBetween(0, 10),
            'tags' => fake()->randomElements([
                'Popular',
                'Em Destaque',
                'Novo',
                'Em Alta',
                'AI',
                'Hardware',
                'Programação',
            ], rand(1, 3)),
            'whatYouLearn' => fake()->sentences(rand(3, 6)),
            'skills' => fake()->words(rand(3, 6)),
            'requirements' => fake()->sentences(rand(2, 5)),
            'language' => fake()->randomElement(['Português', 'English', 'Español']),
            'certificate' => fake()->boolean(),
            'resources' => fake()->boolean(),
            'price' => fake()->randomFloat(2, 10, 200),
            'level' => fake()->randomElement(['iniciante', 'intermediario', 'avançado']),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Course $course) {
            $modulesCount = fake()->numberBetween(3, 6);

            for ($i = 1; $i <= $modulesCount; $i++) {
                $module = Module::create([
                    'course_id' => $course->id,
                    'title' => fake()->sentence(3),
                    'order' => $i,
                ]);

                // Create lessons for this module
                $lessonsCount = fake()->numberBetween(3, 8); // or whatever range you want
                for ($j = 1; $j <= $lessonsCount; $j++) {
                    Lesson::create([
                        'module_id' => $module->id,
                        'title' => fake()->sentence(4),
                        'url' => fake()->url(),
                        'duration' => fake()->numberBetween(10, 120), // in minutes
                        'order' => $j,
                    ]);
                }
            }
        });
    }
}
