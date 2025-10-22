@props([
    "stats" => [["500+", "Alunos Ativos"], ["120+", "Cursos Disponíveis"], ["98%", "Taxa de Satisfação"], ["24h", "Suporte"]],
])

<section class="relative py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        @foreach ($stats as [$numero, $rotulo])
            <div>
                <div
                    class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-amber-400 to-yellow-500 bg-clip-text text-transparent mb-2"
                >
                    {{ $numero }}
                </div>
                <div class="text-sm md:text-base">{{ $rotulo }}</div>
            </div>
        @endforeach
    </div>
</section>
