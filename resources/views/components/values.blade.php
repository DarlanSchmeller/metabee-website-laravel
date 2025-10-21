@props([
    'values' => [
        [
            'icon' => 'hand-raised',
            'title' => 'Foco na Missão',
            'description' => 'Democratizar o ensino de robótica e tornar a tecnologia de ponta acessível a todos.',
        ],
        [
            'icon' => 'light-bulb',
            'title' => 'Inovação em Primeiro Lugar',
            'description' => 'Atualizamos constantemente nosso conteúdo com os avanços mais recentes em robótica e IA.',
        ],
        [
            'icon' => 'heart',
            'title' => 'Aluno em Primeiro Lugar',
            'description' => 'Seu sucesso é o nosso sucesso. Oferecemos suporte personalizado em cada etapa.',
        ],
        [
            'icon' => 'globe-alt',
            'title' => 'Comunidade Global',
            'description' => 'Faça parte de uma rede mundial de entusiastas e profissionais de robótica.',
        ],
    ],
])

<section class="relative py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Nossos Valores</h2>
            <p class="text-content text-lg max-w-2xl mx-auto">Os princípios que guiam tudo o que fazemos</p>
        </div>

        <!-- Values Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($values as $value)
                <div
                    class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 hover:border-amber-500/40 transition-all duration-300 hover:shadow-xl hover:shadow-amber-500/10">
                    
                    <!-- Icon -->
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-amber-500/20 to-yellow-500/20 rounded-xl flex items-center justify-center mb-6 border border-amber-500/30 text-amber-400">
                        <x-dynamic-component :component="'heroicon-o-' . $value['icon']" class="w-8 h-8 stroke-current" />
                    </div>

                    <!-- Title -->
                    <h3 class="text-xl font-semibold text-white mb-3">{{ $value['title'] }}</h3>

                    <!-- Description -->
                    <p class="leading-relaxed text-gray-300">{{ $value['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
