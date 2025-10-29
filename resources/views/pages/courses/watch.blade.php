<x-layout>
    <div class="min-h-screen bg-gray-950 relative pt-12 pb-20">
        <x-hexagon-background />

        {{-- Course Header --}}
        <div class="max-w-7xl mx-auto px-6 mb-10">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <p class="text-gray-400 text-sm mt-1">{{ $module->title }}</p>
                    <h1 class="text-3xl font-bold text-white">{{ $course->title }}</h1>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-400">Progresso</span>
                    <div class="w-40 bg-gray-800 h-2 rounded-full overflow-hidden">
                        <div class="h-full bg-amber-500" style="width: {{ (int) $progress }}%"></div>
                    </div>
                    <span class="text-amber-400 text-sm font-semibold">
                        {{ $progress }}%
                    </span>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="max-w-7xl mx-auto px-6 grid gap-10 lg:grid-cols-[1fr_360px]">
            {{-- Left Column --}}
            <section class="space-y-6">
                {{-- Video Player --}}
                <div
                    class="relative z-10 bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl overflow-hidden shadow-lg">
                    <div class="aspect-video bg-black">
                        <iframe src="{{ str_replace('watch?v=', 'embed/', $lesson->url) }}" title="{{ $lesson->title }}"
                            class="w-full h-full" allowfullscreen></iframe>
                    </div>
                </div>

                {{-- Lesson Info --}}
                <div
                    class="relative bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-6">
                    <div class="flex flex-wrap items-start justify-between gap-4 mb-4">
                        <div class="flex-1">
                            <h2 class="text-xl font-bold text-white mb-1">{{ $lesson->title }}</h2>
                            <div class="flex items-center gap-4 text-sm text-gray-400">
                                <div class="flex items-center gap-1.5">
                                    <x-heroicon-o-clock class="h-5 w-5 text-amber-400" />
                                    <span>
                                        {{ intdiv($lesson->duration, 60) ? intdiv($lesson->duration, 60) . 'h ' : '' }}
                                        {{ $lesson->duration % 60 ? $lesson->duration % 60 . 'min' : '' }}
                                    </span>
                                </div>
                                @if ($completedCurrentLesson)
                                    <div class="flex items-center gap-1.5 text-green-400">
                                        <x-heroicon-o-check class="h-5 w-5" />
                                        <span>Completado</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="flex gap-2">
                            <form method="POST" action="{{ route('cursos.complete-lesson', $lesson) }}">
                                @csrf
                                @if ($completedCurrentLesson)
                                    @method('DELETE')
                                @endif
                                <button type="submit"
                                    class="bg-gray-800/50 px-3 py-2 rounded-md flex items-center gap-2 text-sm
                                    {{ $completedCurrentLesson
                                        ? 'hover:bg-red-500/10 border border-red-500/30 text-red-400'
                                        : 'hover:bg-green-500/10 border border-green-500/30 text-green-400' }}">
                                    <x-heroicon-o-check-circle class="h-5 w-5" />
                                    {{ $completedCurrentLesson ? 'Marcar como Incompleto' : 'Marcar como Completo' }}
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="text-md pt-2 text-gray-400">
                        {{ $course->fullDescription }}
                    </div>

                    {{-- Navigation --}}
                    <div class="mt-6 pt-6 border-t border-gray-800 flex items-center">
                        @if ($previousLesson)
                            <a
                                href="{{ route('cursos.watch', [$course->id, $previousLesson->module_id, $previousLesson->id]) }}">
                                <button
                                    class="bg-gray-800/50 border border-amber-500/30 text-amber-400 px-4 py-2 rounded-md
                                    hover:bg-amber-500/10 flex items-center gap-2 text-sm">
                                    <x-heroicon-o-arrow-left class="h-5 w-5" />
                                    Voltar
                                </button>
                            </a>
                        @endif

                        @if ($nextLesson)
                            <a href="{{ route('cursos.watch', [$course->id, $nextLesson->module_id, $nextLesson->id]) }}"
                                class="ml-auto">
                                <button
                                    class="bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 font-semibold px-4
                                    py-2 rounded-md hover:shadow-lg hover:shadow-amber-500/50 flex items-center text-sm gap-2">
                                    Próximo
                                    <x-heroicon-o-arrow-right class="h-5 w-5" />
                                </button>
                            </a>
                        @endif
                    </div>

                </div>
            </section>

            {{-- Right Column --}}
            <aside class="hidden lg:block">
                <div
                    class="sticky top-24 bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl overflow-hidden">
                    <div class="p-5 border-b border-gray-800">
                        <h3 class="text-lg font-bold text-white flex items-center gap-2">
                            <x-heroicon-o-play class="h-5 w-5 text-amber-400" />
                            Conteúdo do Curso
                        </h3>
                        <p class="text-xs text-gray-400 mt-1">{{ $courseTotalLessons }} Aulas</p>
                    </div>

                    <div class="max-h-[calc(100vh-220px)] overflow-y-auto divide-y divide-gray-800">
                        @foreach ($modules as $module)
                            <div class="p-4">
                                <h4 class="font-semibold text-white mb-2 text-sm">
                                    Módulo {{ $module->order }} -
                                    {{ $module->title }}
                                </h4>
                                <ul class="space-y-1.5">
                                    @foreach ($module->lessons as $lessonData)
                                        <li>
                                            <a
                                                href="{{ route('cursos.watch', [$course->id, $module->id, $lessonData->id]) }}">
                                                <button
                                                    class="w-full text-left px-3 py-2 rounded-md hover:bg-gray-800/50 flex
                                                    items-start gap-3 {{ $lessonData->id == $lesson->id ? 'border border-gray-400' : '' }}">

                                                    @if (in_array($lessonData->id, $completedLessonIds))
                                                        <div
                                                            class="w-8 h-8 rounded-lg flex items-center justify-center bg-green-900 flex-shrink-0">
                                                            <x-heroicon-o-check-circle class="h-6 w-6 text-green-400" />
                                                        </div>
                                                    @else
                                                        <div
                                                            class="w-8 h-8 rounded-lg flex items-center justify-center bg-gray-800 flex-shrink-0">
                                                            <x-heroicon-o-play-circle class="h-6 w-6 text-gray-400" />
                                                        </div>
                                                    @endif

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-white truncate">
                                                            {{ $lessonData->title }}
                                                        </p>
                                                        <p class="text-xs text-gray-500">
                                                            {{ intdiv($lessonData->duration, 60) ? intdiv($lessonData->duration, 60) . 'h ' : '' }}
                                                            {{ $lessonData->duration % 60 ? $lesson->duration % 60 . 'min' : '' }}
                                                        </p>
                                                    </div>
                                                </button>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>
</x-layout>
