@props(['courses' => []])

<section class="relative py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <p class="text-gray-400">
                Exibindo <span class="text-amber-500 font-semibold">{{ count($courses) }}</span> cursos
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($courses as $course)
                <div
                    class="group bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl overflow-hidden hover:border-amber-500/40 transition-all duration-300 hover:shadow-xl hover:shadow-amber-500/10 hover:scale-105
                        flex flex-col"
                >
                    {{-- Image --}}
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $course['image'] }}" alt="{{ $course['title'] }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-gray-900/90 backdrop-blur-sm px-3 py-1 rounded-full text-amber-500 text-sm font-semibold border border-amber-500/30">
                            {{ ucfirst($course['level']) ?? 'Nível' }}
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-white mb-2 group-hover:text-amber-400 transition-colors">
                            {{ $course['title'] }}
                        </h3>
                        <p class="text-gray-400 text-sm mb-4 line-clamp-2">
                            {{ $course['description'] }}
                        </p>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <span>{{ $course['instructor'] }}</span>
                        </div>

                        {{-- Tags --}}
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach ($course['tags'] as $tag)
                                <span class="px-3 py-1 bg-amber-500/10 text-amber-400 border border-amber-500/30 rounded-full text-xs font-medium">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>


                        {{-- Stats --}}
                        <div class="flex items-center justify-between text-sm text-gray-400 mb-4">
                            <div class="flex items-center space-x-1">
                                <x-heroicon-o-clock class="w-4 h-4" />
                                <span>{{ $course['duration'] }} horas</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <x-heroicon-o-user-group class="w-4 h-4" />
                                <span>{{ $course['students'] }} alunos</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <x-heroicon-o-star class="w-4 h-4 text-amber-400" />
                                <span class="text-white font-semibold">{{ $course['rating'] }}</span>
                            </div>
                        </div>

                        {{-- Price & Button --}}
                        <div class="mt-auto flex items-center justify-between pt-6 border-t border-amber-500/20">
                            <span class="text-2xl font-bold text-white">R$ {{ $course['price'] }}</span>
                            <a href="{{ route('cursos.show', $course->id) }}"
                            class="bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 px-6 py-2 rounded-xl font-semibold hover:shadow-lg hover:shadow-amber-500/50 transition-all duration-300">
                                Visualizar Curso
                            </a>
                        </div>
                    </div>
                </div>
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
