@props([
    "course",
])

<x-layout>
    <div class="min-h-screen bg-gray-950">
        <section class="relative pt-24 pb-12">
            <x-glowing-circles />

            <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                <x-course-view-navigation :course="$course" />

                <div class="grid lg:grid-cols-3 gap-12">
                    <div class="lg:col-span-2">
                        <x-course-view-details
                            :course="$course"
                            :rating="$averageRating"
                            :totalduration="$courseTotalDuration"
                            :totallessons="$courseTotalLessons"
                        />

                        <x-reviews :course="$course" :existingreview="$existingReview" :reviews="$reviews" />
                    </div>

                    {{-- Sidebar --}}
                    <div class="lg:col-span-1">
                        <div class="sticky top-32">
                            <div
                                class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 text-white"
                            >
                                <div class="mb-6">
                                    <div class="text-4xl font-bold mb-2">${{ $course->price }}</div>
                                    <p class="text-content">Pagamento único, acesso vitalício</p>
                                </div>

                                @auth
                                    @if (auth()->user()->role !== "guest")
                                        <a
                                            href="{{ route("cursos.watch", [$course->id, $firstModule, $firstLesson]) }}"
                                        >
                                            <x-button px="px-6 w-full mb-6">Assistir Aulas</x-button>
                                        </a>
                                    @else
                                        <x-course-guest-buttons />
                                    @endif
                                @else
                                    <x-course-guest-buttons />
                                @endauth

                                <div class="border-t border-amber-500/20 pt-6">
                                    <h3 class="text-white font-semibold mb-4">Este curso inclui:</h3>
                                    <div class="space-y-3 text-content">
                                        <div class="flex items-center space-x-3">
                                            <x-heroicon-o-play class="w-5 h-5 text-amber-500" />
                                            <span>{{ $courseTotalLessons }} aulas em vídeo</span>
                                        </div>

                                        @if ($course->projects)
                                            <div class="flex items-center space-x-3">
                                                <x-heroicon-o-book-open class="w-5 h-5 text-amber-500" />
                                                <span>{{ $course->projects }} projetos práticos</span>
                                            </div>
                                        @endif

                                        @if ($course->certificate)
                                            <div class="flex items-center space-x-3">
                                                <x-heroicon-o-arrow-down-tray class="w-5 h-5 text-amber-500" />
                                                <span>Certificado incluso</span>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <x-heroicon-o-check-badge class="w-5 h-5 text-amber-500" />
                                                <span>Certificado de conclusão</span>
                                            </div>
                                        @endif

                                        <div class="flex items-center space-x-3">
                                            <x-heroicon-o-user-group class="w-5 h-5 text-amber-500" />
                                            <span>Acesso à comunidade</span>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <x-heroicon-o-globe-alt class="w-5 h-5 text-amber-500" />
                                            <span>Acesso vitalício</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-t border-amber-500/20 pt-6 mt-6 text-content text-sm">
                                    Última atualização:
                                    <span class="text-white font-medium">
                                        {{ $course->updated_at->translatedFormat("d F Y") }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
