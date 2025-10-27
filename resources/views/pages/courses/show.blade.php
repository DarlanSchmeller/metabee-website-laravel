@props([
    "course",
])

<x-layout>
    <div class="min-h-screen bg-gray-950">
        {{-- Hero Section --}}
        <section class="relative pt-24 pb-12">
            <div class="absolute top-20 right-20 w-96 h-96 bg-amber-500/20 rounded-full filter blur-3xl"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-row gap-6">
                    {{-- Back Button --}}
                    <a
                        href="{{ route("cursos.index") }}"
                        class="inline-flex items-center space-x-2 bg-gray-800/60 hover:bg-gray-700/80 text-amber-400 hover:text-amber-300 font-semibold px-5 py-3 rounded-lg shadow-md hover:shadow-amber-500/40 transition-all duration-200 border border-amber-500/30 mb-6"
                    >
                        <x-heroicon-o-arrow-left class="w-5 h-5" />
                        <span>Voltar para Cursos</span>
                    </a>
                    @can("update", $course)
                        {{-- Edit Button --}}
                        <a
                            href="{{ route("cursos.edit", $course->id) }}"
                            class="inline-flex items-center space-x-2 bg-blue-700/80 hover:bg-blue-600 text-white font-semibold px-5 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 border border-blue-500/30 mb-6"
                        >
                            <x-heroicon-o-pencil class="w-5 h-5" />
                            <span>Editar Curso</span>
                        </a>

                        <form
                            action="{{ route("cursos.destroy", $course->id) }}"
                            method="POST"
                            onsubmit="return confirm('Tem certeza que deseja apagar este curso?')"
                        >
                            @csrf
                            @method("DELETE")
                            <button
                                type="submit"
                                class="inline-flex items-center space-x-2 bg-red-700/80 hover:bg-red-600 text-white font-semibold px-5 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 border border-red-500/30 mb-6"
                            >
                                <x-heroicon-o-trash class="w-5 h-5" />
                                <span>Apagar Curso</span>
                            </button>
                        </form>
                    @endcan
                </div>

                <div class="grid lg:grid-cols-3 gap-12">
                    {{-- Main Content --}}
                    <div class="lg:col-span-2">
                        {{-- Imagem do Curso --}}
                        <div class="relative rounded-2xl overflow-hidden mb-8">
                            <img
                                src="{{ asset("storage/" . $course->image) }}"
                                alt="{{ $course->title }}"
                                class="w-full h-96 object-cover"
                            />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-gray-950 via-transparent to-transparent"
                            ></div>
                            <div class="absolute bottom-6 left-6 right-6">
                                <div
                                    class="inline-block bg-gray-900/90 backdrop-blur-sm px-4 py-2 rounded-full text-amber-500 text-sm font-semibold border border-amber-500/30 mb-4"
                                >
                                    {{ ucfirst($course->level) }}
                                </div>
                                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                                    {{ $course->title }}
                                </h1>
                            </div>
                        </div>

                        {{-- Stats do Curso --}}
                        <div class="flex flex-wrap gap-6 mb-8 text-white">
                            <div class="flex items-center space-x-2">
                                <x-heroicon-o-star class="w-5 h-5 text-amber-500" />
                                <span class="font-semibold">{{ $course->rating }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <x-heroicon-o-user-group class="w-5 h-5 text-amber-500" />
                                <span class="text-content">{{ $course->students }} alunos</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <x-heroicon-o-clock class="w-5 h-5 text-amber-500" />
                                <span class="text-content">{{ $course->duration }} horas</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <x-heroicon-o-book-open class="w-5 h-5 text-amber-500" />
                                <span class="text-content">{{ $course->lessons }} aulas</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <x-heroicon-o-clipboard-document-list class="w-5 h-5 text-amber-500" />
                                <span class="text-content">{{ $course->category }}</span>
                            </div>
                        </div>

                        {{-- Sobre o Curso --}}
                        <div
                            class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 mb-8 text-white"
                        >
                            <h2 class="text-2xl font-bold mb-4">Sobre este Curso</h2>
                            <p class="text-content leading-relaxed mb-6">
                                {{ $course->fullDescription }}
                            </p>
                            <div class="grid md:grid-cols-3 gap-4 text-content">
                                <div class="flex items-center space-x-2">
                                    <x-heroicon-o-globe-alt class="w-5 h-5 text-amber-500" />
                                    <span>{{ $course->language }}</span>
                                </div>
                                @if ($course->certificate)
                                    <div class="flex items-center space-x-2">
                                        <x-heroicon-o-check-badge class="w-5 h-5 text-amber-500" />
                                        <span>Certificado incluso</span>
                                    </div>
                                @endif

                                @if ($course->resources)
                                    <div class="flex items-center space-x-2">
                                        <x-heroicon-o-arrow-down-tray class="w-5 h-5 text-amber-500" />
                                        <span>Recursos para Download</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- O que você vai aprender --}}
                        <div
                            class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 mb-8 text-white"
                        >
                            <h2 class="text-2xl font-bold mb-6">O que você vai aprender</h2>
                            <div class="grid md:grid-cols-2 gap-4 text-content">
                                @foreach ($course->whatYouLearn as $item)
                                    <div class="flex items-start space-x-3">
                                        <x-heroicon-o-check-circle
                                            class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5"
                                        />
                                        <span>{{ $item }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Habilidades --}}
                        <div
                            class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 mb-8 text-white"
                        >
                            <h2 class="text-2xl font-bold mb-6">Habilidades que você irá adquirir</h2>
                            <div class="flex flex-wrap gap-3">
                                @foreach ($course->skills as $skill)
                                    <span
                                        class="px-4 py-2 bg-amber-500/10 border border-amber-500/30 rounded-lg text-amber-400 text-sm font-medium"
                                    >
                                        {{ $skill }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        {{-- Currículo --}}
                        <div
                            class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 mb-8 text-white"
                        >
                            <h2 class="text-2xl font-bold mb-6">Currículo do Curso</h2>
                            <div class="space-y-4">
                                @foreach ($course->curriculum as $index => $module)
                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-800/50 border border-amber-500/20 rounded-xl hover:border-amber-500/40 transition-all"
                                    >
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-br from-amber-500/20 to-yellow-500/20 rounded-lg flex items-center justify-center border border-amber-500/30"
                                            >
                                                <span class="text-amber-500 font-semibold">
                                                    {{ $loop->iteration }}
                                                </span>
                                            </div>
                                            <div>
                                                <h3 class="text-white font-semibold">
                                                    {{ $module["module"] }}
                                                </h3>
                                                <p class="text-content text-sm">{{ $module["lessons"] }} aulas</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-2 text-content text-sm">
                                            <x-heroicon-o-clock class="w-4 h-4" />
                                            <span>{{ $module["duration"] }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Requisitos --}}
                        <div
                            class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 mb-8 text-white"
                        >
                            <h2 class="text-2xl font-bold mb-6">Requisitos</h2>
                            <ul class="space-y-3 text-content">
                                @foreach ($course->requirements as $req)
                                    <li class="flex items-start space-x-3">
                                        <div class="w-2 h-2 bg-amber-500 rounded-full mt-2"></div>
                                        <span>{{ $req }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Instrutor --}}
                        <div
                            class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 text-white"
                        >
                            <h2 class="text-2xl font-bold mb-6">Seu Instrutor</h2>
                            <div class="flex items-start space-x-6 md:flex-row md:gap-0 flex-col gap-8">
                                <img
                                    src="{{ asset("storage/" . $course->instructor->user_image) }}"
                                    alt="{{ $course->instructor->name }}"
                                    class="w-24 h-24 rounded-2xl object-cover border-2 border-amber-500/30"
                                />
                                <div>
                                    <h3 class="text-xl font-bold mb-2">
                                        {{ $course->instructor->name }}
                                    </h3>
                                    <p class="text-content leading-relaxed">
                                        {{ $course->instructor->bio }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Sidebar --}}
                    <div class="lg:col-span-1">
                        <div class="sticky top-32">
                            <div
                                class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 text-white"
                            >
                                {{-- Preço --}}
                                <div class="mb-6">
                                    <div class="text-4xl font-bold mb-2">${{ $course->price }}</div>
                                    <p class="text-content">Pagamento único, acesso vitalício</p>
                                </div>

                                {{-- Botões CTA --}}
                                <a href="{{ route("planos") }}">
                                    <button
                                        class="w-full bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 px-6 py-4 rounded-xl font-semibold hover:shadow-lg hover:shadow-amber-500/50 hover:scale-105 transition-all duration-300 mb-4"
                                    >
                                        Matricule-se Agora
                                    </button>
                                </a>

                                <button
                                    class="w-full border border-amber-500/50 text-amber-400 px-6 py-4 rounded-xl font-semibold hover:bg-amber-500/10 transition-all duration-300 mb-6"
                                >
                                    Comprar Curso Separadamente
                                </button>

                                {{-- Inclui --}}
                                <div class="border-t border-amber-500/20 pt-6">
                                    <h3 class="text-white font-semibold mb-4">Este curso inclui:</h3>
                                    <div class="space-y-3 text-content">
                                        <div class="flex items-center space-x-3">
                                            <x-heroicon-o-play class="w-5 h-5 text-amber-500" />
                                            <span>{{ $course->lessons }} aulas em vídeo</span>
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

                                {{-- Última atualização --}}
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
