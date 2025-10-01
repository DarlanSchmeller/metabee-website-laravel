@props([
    'stats' => [
        [
            'icon' => 'users',
            'value' => '500+',
            'label' => 'Estudantes Ativos',
            'color' => 'text-amber-400',
            'bgColor' => 'bg-amber-500/10',
            'borderColor' => 'border-amber-500/30',
        ],
        [
            'icon' => 'book-open',
            'value' => '120+',
            'label' => 'Cursos Profissionais',
            'color' => 'text-amber-400',
            'bgColor' => 'bg-amber-500/10',
            'borderColor' => 'border-amber-500/30',
        ],
        [
            'icon' => 'trophy',
            'value' => '98%',
            'label' => 'Taxa de Sucesso',
            'color' => 'text-amber-400',
            'bgColor' => 'bg-amber-500/10',
            'borderColor' => 'border-amber-500/30',
        ],
        [
            'icon' => 'support',
            'value' => '24/7',
            'label' => 'Suporte',
            'color' => 'text-amber-400',
            'bgColor' => 'bg-amber-500/10',
            'borderColor' => 'border-amber-500/30',
        ],
    ]
])

<section class="py-16 bg-gray-900 border-y border-amber-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($stats as $stat)
                <div class="text-center group">
                    <div class="inline-flex items-center justify-center w-16 h-16 {{ $stat['bgColor'] }} border {{ $stat['borderColor'] }} rounded-2xl mb-4 group-hover:scale-110 group-hover:shadow-lg group-hover:shadow-amber-500/20 transition-all duration-300">
                        @if ($stat['icon'] === 'users')
                            <x-heroicon-o-users class="w-8 h-8 {{ $stat['color'] }}" />
                        @elseif ($stat['icon'] === 'book-open')
                            <x-heroicon-o-book-open class="w-8 h-8 {{ $stat['color'] }}" />
                        @elseif ($stat['icon'] === 'trophy')
                            <x-heroicon-o-trophy class="w-8 h-8 {{ $stat['color'] }}" />
                        @elseif ($stat['icon'] === 'support')
                            <x-heroicon-o-lifebuoy class="w-8 h-8 {{ $stat['color'] }}" />
                        @endif
                    </div>
                    <div class="text-3xl font-bold text-amber-400 mb-2">{{ $stat['value'] }}</div>
                    <div class="text-gray-400 font-medium">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>
