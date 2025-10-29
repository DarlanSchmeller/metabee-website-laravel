<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Delete all course images
        Storage::disk('public')->delete(Storage::disk('public')->files('course_images'));

        // Delete all user images
        Storage::disk('public')->delete(Storage::disk('public')->files('user_images'));

        // Create first user image
        $source = public_path('images/team/ceo.jpg');
        $filename = 'ceo.jpg';
        Storage::disk('public')->putFileAs('user_images', $source, $filename);

        $user = User::factory()->create([
            'name' => 'Clistenes Grizafis Bento',
            'email' => 'clistenes@metabee.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'user_image' => 'user_images/ceo.jpg',
            'bio' => 'Com uma sólida experiência na indústria no desenvolvimento de AMRs (Robôs Móveis Autônomos), Clistenes é o principal idealizador da MetaBee. Formado em Matemática e Engenharia de Software, ele combina conhecimento técnico com uma visão estratégica voltada para democratizar o acesso às tecnologias emergentes. Sua trajetória profissional é marcada pela inovação e pela capacidade de transformar ideias em realidade, sempre explorando soluções práticas no universo da robótica, fabricação digital e educação maker. Clistenes lidera a MetaBee com paixão, inspirando equipes, alunos e parceiros a superar limites e alcançar novos horizontes no setor tecnológico.',
            'role' => 'instructor',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Use factory to create fake course data
        // Course::factory()->count(20)->create([
        //     'instructor_id' => $user->id,
        // ]);

        // Create courses using json data
        $courses = json_decode(file_get_contents(database_path('seeders/data/courses.json')), true);

        foreach ($courses as $courseData) {
            // Download image content
            $imageContent = Http::get($courseData['image'])->body();
            $fileName = Str::random(20).'.jpg';
            $path = 'course_images/'.$fileName;

            // Store new image path
            $courseData['image'] = $path;
            Storage::disk('public')->put($path, $imageContent);

            // Extract curriculum before creating course
            $curriculum = $courseData['curriculum'] ?? [];
            unset($courseData['curriculum']);

            // Create course
            $course = Course::create($courseData);

            // Create modules and lessons
            foreach ($curriculum as $moduleIndex => $moduleData) {
                // Create module
                $module = Module::create([
                    'course_id' => $course->id,
                    'title' => $moduleData['title'],
                    'order' => $moduleIndex + 1,
                ]);

                // Create lessons for this module
                foreach ($moduleData['lessons'] as $lessonIndex => $lessonData) {
                    Lesson::create([
                        'module_id' => $module->id,
                        'title' => $lessonData['title'],
                        'url' => $lessonData['url'],
                        'duration' => $lessonData['duration'],
                        'order' => $lessonIndex + 1,
                    ]);
                }
            }
        }
    }
}
