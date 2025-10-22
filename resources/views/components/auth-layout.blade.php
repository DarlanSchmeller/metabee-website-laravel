@props(["title" => "", "subtitle" => ""])

<div class="relative w-screen min-h-screen flex flex-col lg:flex-row">
    {{-- Fullscreen Image --}}
    <div class="absolute inset-0">
        <img src="{{ asset("images/classroom.jpg") }}" alt="MetaBee Classroom" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-r from-black/65 via-black/75 to-black/95"></div>
    </div>

    {{-- Left side content (desktop only) --}}
    <div class="hidden lg:flex flex-1 relative z-10 items-center justify-center p-12">
        <div class="flex flex-col gap-6 max-w-lg">
            {{-- Logo --}}
            <a
                href="{{ route("home") }}"
                class="flex items-center space-x-3 w-max transform transition-transform duration-300 hover:scale-105"
            >
                <x-logo />
                <span
                    class="text-4xl font-bold drop-shadow-xl bg-gradient-to-r from-amber-400 via-yellow-400 to-amber-500 bg-clip-text text-transparent"
                >
                    MetaBee
                </span>
            </a>

            <h2 class="text-4xl md:text-4xl font-bold leading-tight text-white drop-shadow-xl">
                Aprenda robótica com os melhores instrutores
            </h2>
            <p class="text-gray-100 text-base md:text-xl drop-shadow-md mt-2">
                Mais de 500 alunos já transformaram suas carreiras com nossos cursos práticos e certificados
                reconhecidos.
            </p>

            {{-- Stats --}}
            <div class="flex flex-wrap gap-4 md:gap-8 pt-4">
                <div class="backdrop-blur-sm bg-zinc-900/50 rounded-lg p-3 text-center w-20 md:w-24">
                    <div class="text-2xl md:text-3xl font-bold text-amber-400">500+</div>
                    <div class="text-xs md:text-sm text-gray-200">Alunos</div>
                </div>
                <div class="backdrop-blur-sm bg-zinc-900/50 rounded-lg p-3 text-center w-20 md:w-24">
                    <div class="text-2xl md:text-3xl font-bold text-amber-400">120+</div>
                    <div class="text-xs md:text-sm text-gray-200">Cursos</div>
                </div>
                <div class="backdrop-blur-sm bg-zinc-900/50 rounded-lg p-3 text-center w-20 md:w-24">
                    <div class="text-2xl md:text-3xl font-bold text-amber-400">98%</div>
                    <div class="text-xs md:text-sm text-gray-200">Satisfação</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Right side form --}}
    <div class="flex-1 relative z-20 flex items-center justify-center px-6 sm:px-8 md:px-12 py-12 lg:py-0">
        <div class="w-full max-w-lg flex flex-col justify-center gap-6">
            {{-- Mobile logo --}}
            <div class="mb-6 text-center lg:hidden">
                <a href="{{ route("home") }}" class="flex items-center justify-center space-x-2">
                    <x-logo class="w-10 h-10" />
                    <h1
                        class="text-3xl font-bold drop-shadow-xl bg-gradient-to-r from-amber-400 via-yellow-400 to-amber-500 bg-clip-text text-transparent"
                    >
                        MetaBee
                    </h1>
                </a>
            </div>

            {{-- Welcome message --}}
            <div class="text-center mb-2 lg:mb-4">
                <h3 class="text-3xl font-bold text-white tracking-tight">
                    {{ $title }}
                </h3>
                <p class="text-gray-200 text-base mt-2">
                    {{ $subtitle }}
                </p>
            </div>

            {{-- Form container --}}
            <div
                class="relative bg-zinc-900/90 backdrop-blur-md border border-zinc-800 rounded-2xl p-6 md:p-10 shadow-lg"
            >
                {{ $slot }}
            </div>

            {{-- Mobile Stats --}}
            <div class="lg:hidden mt-6">
                <div class="flex flex-wrap justify-center gap-4 md:gap-8">
                    <div class="backdrop-blur-sm bg-zinc-900/50 rounded-lg p-3 text-center w-20 md:w-24">
                        <div class="text-2xl md:text-3xl font-bold text-amber-400">500+</div>
                        <div class="text-xs md:text-sm text-gray-200">Alunos</div>
                    </div>
                    <div class="backdrop-blur-sm bg-zinc-900/50 rounded-lg p-3 text-center w-20 md:w-24">
                        <div class="text-2xl md:text-3xl font-bold text-amber-400">120+</div>
                        <div class="text-xs md:text-sm text-gray-200">Cursos</div>
                    </div>
                    <div class="backdrop-blur-sm bg-zinc-900/50 rounded-lg p-3 text-center w-20 md:w-24">
                        <div class="text-2xl md:text-3xl font-bold text-amber-400">98%</div>
                        <div class="text-xs md:text-sm text-gray-200">Satisfação</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
