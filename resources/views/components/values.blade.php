@props([
    'values' => [
        [
            '🎯',
            'Foco na Missão',
            'Democratizar o ensino de robótica e tornar a tecnologia de ponta acessível a todos.'],
        [
            '💡',
            'Inovação em Primeiro Lugar',
            'Atualizamos constantemente nosso conteúdo com os avanços mais recentes em robótica e IA.',
        ],
        [
            '❤️',
            'Aluno em Primeiro Lugar',
            'Seu sucesso é o nosso sucesso. Oferecemos suporte personalizado em cada etapa.',
        ],
        [
            '🌍',
            'Comunidade Global',
            'Faça parte de uma rede mundial de entusiastas e profissionais de robótica.'
        ],
    ],
])

<section class="relative py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Nossos Valores</h2>
        <p class="text-lg max-w-2xl mx-auto">Os princípios que guiam tudo o que fazemos</p>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach ($values as [$icon, $title, $description])
            <div
                class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 hover:border-amber-500/40 transition-all duration-300 hover:shadow-xl hover:shadow-amber-500/10">
                <div
                    class="w-14 h-14 bg-gradient-to-br from-amber-500/20 to-yellow-500/20 rounded-xl flex items-center justify-center mb-6 border border-amber-500/30 text-3xl">
                    {{ $icon }}
                </div>
                <h3 class="text-xl font-semibold text-white mb-3">{{ $title }}</h3>
                <p class="leading-relaxed">{{ $description }}</p>
            </div>
        @endforeach
    </div>
</section>
