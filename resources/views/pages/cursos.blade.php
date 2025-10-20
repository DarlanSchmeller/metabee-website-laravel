<x-layout>
    @php
        $courses = [
            [
                'id' => 1,
                'title' => 'Introdução à Robótica',
                'category' => 'beginner',
                'description' =>
                    'Aprenda os fundamentos da robótica, incluindo mecânica básica, sensores e sistemas de controle.',
                'image' =>
                    'https://images.pexels.com/photos/8294614/pexels-photo-8294614.jpeg?auto=compress&cs=tinysrgb&w=800',
                'instructor' => 'Dra. Sarah Chen',
                'duration' => '8 semanas',
                'students' => '12.450',
                'rating' => 4.8,
                'price' => 49,
                'level' => 'Iniciante',
            ],
            [
                'id' => 2,
                'title' => 'IA Avançada para Robótica',
                'category' => 'advanced',
                'description' =>
                    'Domine algoritmos de aprendizado de máquina e redes neurais aplicadas a robôs autônomos.',
                'image' =>
                    'https://images.pexels.com/photos/8386440/pexels-photo-8386440.jpeg?auto=compress&cs=tinysrgb&w=800',
                'instructor' => 'Prof. Marcus Johnson',
                'duration' => '12 semanas',
                'students' => '8.230',
                'rating' => 4.9,
                'price' => 129,
                'level' => 'Avançado',
            ],
        ];
    @endphp

    <div class="min-h-screen bg-gray-950">
        <x-hero-section title="Explore Nossos" highlight="Cursos" :break-title="true"
            content="Escolha entre dezenas de cursos desenvolvidos por especialistas da indústria e avance do básico ao profissional.">
            {{-- Barra de Busca --}}
            <div class="max-w-2xl mx-auto mb-8">
                <div class="relative">
                    <x-heroicon-o-magnifying-glass
                        class="absolute left-4 top-1/2 transform -translate-y-1/2 w-6 h-6 text-gray-500" />
                    <input type="text" placeholder="Buscar cursos..."
                        class="w-full pl-12 pr-4 py-4 bg-gray-900/50 border border-amber-500/20 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all" />
                </div>
            </div>

            {{-- Categorias (estático) --}}
            <div class="flex flex-wrap justify-center gap-3">
                @php
                    $categories = [
                        ['icon' => 'book-open', 'label' => 'Todos'],
                        ['icon' => 'rocket-launch', 'label' => 'Iniciante'],
                        ['icon' => 'bolt', 'label' => 'Intermediário'],
                        ['icon' => 'light-bulb', 'label' => 'Avançado'],
                        ['icon' => 'cpu-chip', 'label' => 'IA & ML'],
                        ['icon' => 'wrench', 'label' => 'Hardware'],
                        ['icon' => 'code-bracket', 'label' => 'Programação'],
                    ];
                @endphp

                @foreach ($categories as $cat)
                    <button
                        class="flex items-center space-x-2 px-4 py-2 rounded-xl font-medium transition-all duration-300 bg-gray-900/50 text-gray-300 border border-amber-500/20 hover:border-amber-500/40">
                        <x-dynamic-component :component="'heroicon-o-' . $cat['icon']" class="w-5 h-5 text-amber-400" />
                        <span>{{ $cat['label'] }}</span>
                    </button>
                @endforeach
            </div>
        </x-hero-section>

        <x-courses-grid :courses="$courses" />

        <x-call-to-action title="Não encontrou o que procurava?"
            content="Estamos sempre adicionando novos cursos. Entre em contato para sugerir temas ou solicitar treinamentos personalizados para sua equipe."
            buttonText="Fale Conosco" :icon="true" />
    </div>

</x-layout>
