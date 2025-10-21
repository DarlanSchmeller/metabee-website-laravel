@props([
    'teamMembers' => [
        [
            'ceo.jpg',
            'Clistenes Grizafis Bento',
            'Presidente e Fundador',
            'Com uma sólida experiência na indústria no desenvolvimento de AMRs, Clistenes é o principal idealizador da MetaBee. Formado em Matemática e Engenharia de Software, ele combina conhecimento técnico com uma visão estratégica voltada para democratizar o acesso às tecnologias emergentes.',
        ],
        [
            'diretora.jpg',
            'Ana Caroline de Paula',
            'Diretora Educacional',
            'Mestre em Educação, Ana Caroline é a responsável pela criação dos materiais didáticos e pelas metodologias de ensino da MetaBee. Sua abordagem inovadora combina teoria e prática para oferecer uma experiência de aprendizado transformadora e acessível.',
        ],
        [
            'gerente.png',
            'Marcos Alexander de Paula',
            'Gerente administrativo',
            'Com mais de 20 anos de experiência como empresário, Marcos Alexander cuida da infraestrutura da MetaBee, garantindo que o laboratório, equipamentos e recursos estejam sempre disponíveis e em perfeito funcionamento.',
        ],
    ],
])

<section class="relative py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Nosso Time</h2>
        <p class="text-lg max-w-2xl mx-auto">Especialistas da indústria dedicados ao seu sucesso</p>
    </div>

    <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8 px-4">
        @foreach ($teamMembers as [$img, $nome, $cargo, $desc])
            <div
                class="group bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl overflow-hidden hover:border-amber-500/40 transition-all duration-300 hover:shadow-xl hover:shadow-amber-500/10">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/team/' . $img) }}" alt="{{ $nome }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-white mb-1">{{ $nome }}</h3>
                    <p class="text-amber-500 text-sm mb-3">{{ $cargo }}</p>
                    <p class="text-sm leading-relaxed">{{ $desc }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
