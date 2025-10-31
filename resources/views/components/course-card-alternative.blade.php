@props(["course" => null])

<div
    class="group bg-gray-900 rounded-2xl border border-amber-500/20 shadow-xl shadow-amber-500/10 hover:shadow-2xl hover:shadow-amber-500/20 hover:border-amber-500/40 transition-all duration-300 overflow-hidden"
>
    <div class="relative h-48 overflow-hidden">
        <img
            src="{{ asset("storage/" . $course->image) }}"
            alt="{{ $course->title }}"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
        />

        <div class="absolute top-4 left-4">
            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $getLevelColor($course->level) }}">
                {{ ucfirst($course->level) }}
            </span>
        </div>

        <div
            class="absolute top-4 right-4 bg-gray-900/90 backdrop-blur-sm border border-amber-500/30 rounded-full p-2 shadow-lg"
        >
            <div class="flex items-center space-x-1">
                <x-heroicon-s-star class="w-4 h-4 text-amber-500 fill-current" />
                <span class="text-sm font-semibold text-amber-400">
                    {{ number_format($course->average_rating, 1) }}
                </span>
            </div>
        </div>
    </div>

    <div class="p-6">
        <h3 class="text-xl font-bold text-white mb-2 group-hover:text-amber-400 transition-colors">
            {{ $course->title }}
        </h3>

        <p class="text-gray-400 text-sm mb-4 line-clamp-2">
            {{ $course->description }}
        </p>

        <div class="flex flex-wrap gap-2 mb-4">
            @foreach ($course->tags as $tag)
                <span
                    class="px-3 py-1 bg-amber-500/10 text-amber-400 border border-amber-500/30 rounded-full text-xs font-medium"
                >
                    {{ $tag }}
                </span>
            @endforeach
        </div>

        <div class="flex items-center space-x-4 text-sm text-gray-400 mb-6">
            <div class="flex items-center">
                <x-heroicon-o-users class="w-4 h-4 mr-1" />
                {{ number_format($course->students, 0, ",", ".") }} alunos
            </div>

            <div class="flex items-center">
                <x-heroicon-o-clock class="w-4 h-4 mr-1" />
                @if ($course->total_duration)
                    {{ intdiv($course->total_duration, 60) ? intdiv($course->total_duration, 60) . "h " : "" }}
                    {{ $course->total_duration % 60 ? $course->total_duration % 60 . "min" : "" }}
                @endif
            </div>

            <div class="flex items-center space-x-1">
                <x-heroicon-o-star class="w-4 h-4 text-amber-400" />
                <span class="text-white font-semibold">{{ number_format($course->average_rating, 1) }}</span>
            </div>
        </div>

        <div class="mt-auto flex items-center justify-between pt-6 border-t border-amber-500/20"></div>

        <div class="flex items-center justify-between">
            <div class="text-2xl font-bold text-amber-400">R$ {{ $course->price }}</div>
            <a href="{{ route("cursos.show", $course->id) }}">
                <x-button px="px-4" py="py-3">
                    <span class="flex items-center">
                        Visualizar Curso
                        <x-heroicon-o-arrow-right
                            class="ml-2 w-4 h-4 group-hover/btn:translate-x-1 transition-transform"
                        />
                    </span>
                </x-button>
            </a>
        </div>
    </div>
</div>
