<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->text('description');
            $table->text('fullDescription');
            $table->string('image');
            $table->foreignId('instructor_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->integer('duration');
            $table->integer('lessons');
            $table->integer('students')->default(0);
            $table->integer('projects')->default(0);
            $table->json('tags')->nullable();
            $table->json('whatYouLearn')->nullable();
            $table->json('skills')->nullable();
            $table->json('curriculum')->nullable();
            $table->json('requirements')->nullable();
            $table->string('language')->nullable();
            $table->boolean('certificate')->default(true);
            $table->boolean('resources')->default(true);
            $table->float('rating')->default(0);
            $table->float('price')->default(0);
            $table->enum('level', ['iniciante', 'intermediario', 'avancado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
