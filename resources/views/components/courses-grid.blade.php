@props(["courses" => []])

<section class="relative py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8 flex justify-between items-center w-full">
            <p class="text-gray-400">
                Exibindo
                <span class="text-amber-500 font-semibold">{{ $courses->count() }}</span>
                cursos
            </p>

            @can("create", $courseModel)
                <a
                    href="{{ route("cursos.create") }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500/20 text-amber-400 rounded-lg hover:bg-amber-500/30 transition"
                >
                    <x-heroicon-o-plus class="w-5 h-5" />
                    Criar Curso
                </a>
            @endcan
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($courses as $course)
                <x-course-card :course="$course" />
            @empty
                <div class="text-center py-20 col-span-full">
                    <p class="text-gray-400 text-lg">Nenhum curso encontrado.</p>
                </div>
            @endforelse
        </div>
        <div class="mt-8 flex justify-center">
            {{ $courses->links() }}
        </div>
    </div>
</section>
