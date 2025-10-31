@props(["course" => null])

<div
    class="group bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl overflow-hidden hover:border-amber-500/40 transition-all duration-300 hover:shadow-xl hover:shadow-amber-500/10 hover:scale-105 flex flex-col"
>
    {{-- Image --}}
    <div class="relative h-48 overflow-hidden">
        <img
            src="{{ asset("storage/" . $course->image) }}"
            alt="{{ $course->title }}"
            class="w-full h-full object-cover group-hover:scale-113 transition-transform duration-300"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
        <div class="absolute top-4 right-4 flex gap-2">
            <div
                class="bg-gray-900/90 backdrop-blur-sm px-3 py-1 rounded-full text-amber-500 text-sm font-semibold border border-amber-500/30"
            >
                {{ ucfirst($course->level) ?? "Nível" }}
            </div>
            <div
                class="bg-gray-900/90 backdrop-blur-sm px-3 py-1 rounded-full text-amber-500 text-sm font-semibold border border-amber-500/30"
            >
                {{ ucfirst($course->category) ?? "Categoria" }}
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="p-6 flex flex-col flex-1">
        <h3 class="text-xl font-bold text-white mb-2 group-hover:text-amber-400 transition-colors">
            {{ $course->title }}
        </h3>
        <p class="text-gray-400 text-sm mb-4 line-clamp-2">
            {{ $course->description }}
        </p>
        <div class="flex items-center text-sm text-gray-500 mb-4">
            <span>Por {{ $course->instructor->name }}</span>
        </div>

        {{-- Tags --}}
        <div class="flex flex-wrap gap-2 mb-4">
            @foreach ($course->tags as $tag)
                <span
                    class="px-3 py-1 bg-amber-500/10 text-amber-400 border border-amber-500/30 rounded-full text-xs font-medium"
                >
                    {{ $tag }}
                </span>
            @endforeach
        </div>

        {{-- Stats --}}
        <div class="flex items-center justify-between text-sm text-gray-400 mb-4">
            <div class="flex items-center space-x-1">
                <x-heroicon-o-clock class="w-4 h-4" />
                <span>
                    @if ($course->total_duration)
                        {{ intdiv($course->total_duration, 60) ? intdiv($course->total_duration, 60) . "h " : "" }}
                        {{ $course->total_duration % 60 ? $course->total_duration % 60 . "min" : "" }}
                    @endif
                </span>
            </div>
            <div class="flex items-center space-x-1">
                <x-heroicon-o-user-group class="w-4 h-4" />
                <span>{{ $course->students }} alunos</span>
            </div>
            <div class="flex items-center space-x-1">
                <x-heroicon-o-star class="w-4 h-4 text-amber-400" />
                <span class="text-white font-semibold">
                    {{ number_format($course->average_rating, 1) }}
                </span>
            </div>
        </div>

        {{-- Price & Button --}}
        <div class="mt-auto flex items-center justify-between pt-6 border-t border-amber-500/20">
            <span class="text-2xl font-bold text-white">R$ {{ $course->price }}</span>
            <a href="{{ route("cursos.show", $course->id) }}">
                <x-button px="px-6" py="py-2">Visualizar Curso</x-button>
            </a>
        </div>
    </div>
</div>
