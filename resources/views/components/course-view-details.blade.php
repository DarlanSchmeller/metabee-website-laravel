@props([
    "course" => null,
    "rating" => null,
    "totalduration" => null,
    "totallessons" => null,
])

<div class="relative rounded-2xl overflow-hidden mb-8">
    <img src="{{ asset("storage/" . $course->image) }}" alt="{{ $course->title }}" class="w-full h-96 object-cover" />
    <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-transparent to-transparent"></div>
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

{{-- Stats --}}
<div class="flex flex-wrap gap-6 mb-8 text-white">
    <div class="flex items-center space-x-2">
        <x-heroicon-o-star class="w-5 h-5 text-amber-500" />
        <span class="font-semibold">{{ $rating }}</span>
    </div>
    <div class="flex items-center space-x-2">
        <x-heroicon-o-user-group class="w-5 h-5 text-amber-500" />
        <span class="text-content">{{ $course->students }} alunos</span>
    </div>
    <div class="flex items-center space-x-2">
        <x-heroicon-o-clock class="w-5 h-5 text-amber-500" />
        <span class="text-content">
            @if ($totalduration)
                {{ intdiv($totalduration, 60) ? intdiv($totalduration, 60) . "h " : "" }}
                {{ $totalduration % 60 ? $totalduration % 60 . "min" : "" }}
            @endif
        </span>
    </div>
    <div class="flex items-center space-x-2">
        <x-heroicon-o-book-open class="w-5 h-5 text-amber-500" />
        <span class="text-content">{{ $totallessons }} aulas</span>
    </div>
    <div class="flex items-center space-x-2">
        <x-heroicon-o-clipboard-document-list class="w-5 h-5 text-amber-500" />
        <span class="text-content">{{ $course->category }}</span>
    </div>
</div>

<div class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 mb-8 text-white">
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

<div class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 mb-8 text-white">
    <h2 class="text-2xl font-bold mb-6">O que você vai aprender</h2>
    <div class="grid md:grid-cols-2 gap-4 text-content">
        @foreach ($course->whatYouLearn as $item)
            <div class="flex items-start space-x-3">
                <x-heroicon-o-check-circle class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" />
                <span>{{ $item }}</span>
            </div>
        @endforeach
    </div>
</div>

<div class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 mb-8 text-white">
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

<div class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 mb-8 text-white">
    <h2 class="text-2xl font-bold mb-6">Currículo do Curso</h2>
    <div class="space-y-4">
        @foreach ($course->modules as $index => $module)
            <div
                class="flex flex-col gap-2 md:flex-row items-start md:items-center justify-start md:justify-between p-4 bg-gray-800/50 border border-amber-500/20 rounded-xl hover:border-amber-500/40 transition-all"
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
                            {{ $module->title }}
                        </h3>
                        <p class="text-content text-sm">{{ $module->lessons_count }} aulas</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2 text-content text-sm">
                    <x-heroicon-o-clock class="w-4 h-4" />
                    <span>
                        {{ $module->lessons_sum_duration >= 60 ? intdiv($module->lessons_sum_duration, 60) . "h " : "" }}
                        {{ $module->lessons_sum_duration % 60 }}m
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 mb-8 text-white">
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
<div class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 text-white">
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
