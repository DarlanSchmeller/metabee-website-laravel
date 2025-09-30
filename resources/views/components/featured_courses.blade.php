@props([
    'courses' => [
        [
            'id' => 1,
            'title' => 'Fundamentos Completos de Robótica',
            'instructor' => 'Dra. Sarah Chen',
            'rating' => 4.9,
            'students' => 2840,
            'duration' => '12 horas',
            'price' => 99,
            'image' => 'https://images.pexels.com/photos/8294585/pexels-photo-8294585.jpeg?auto=compress&cs=tinysrgb&w=800',
            'level' => 'Iniciante',
            'tags' => ['Arduino', 'Sensores', 'Programação'],
        ],
        [
            'id' => 2,
            'title' => 'IA Avançada para Robótica',
            'instructor' => 'Prof. Michael Rodriguez',
            'rating' => 4.8,
            'students' => 1920,
            'duration' => '18 horas',
            'price' => 149,
            'image' => 'https://images.pexels.com/photos/8294577/pexels-photo-8294577.jpeg?auto=compress&cs=tinysrgb&w=800',
            'level' => 'Avançado',
            'tags' => ['Machine Learning', 'Visão Computacional', 'ROS'],
        ],
        [
            'id' => 3,
            'title' => 'Sistemas de Automação Industrial',
            'instructor' => 'Dr. James Wilson',
            'rating' => 4.7,
            'students' => 1540,
            'duration' => '15 horas',
            'price' => 129,
            'image' => 'https://images.pexels.com/photos/8294493/pexels-photo-8294493.jpeg?auto=compress&cs=tinysrgb&w=800',
            'level' => 'Intermediário',
            'tags' => ['PLC', 'SCADA', 'HMI'],
        ],
    ]
])

@php
    function getLevelColor($level) {
        return match ($level) {
            'Iniciante' => 'bg-green-100 text-green-800',
            'Intermediário' => 'bg-yellow-100 text-yellow-800',
            'Avançado' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
@endphp

<section class="py-20 bg-zinc-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-white mb-4">
                Cursos em Destaque
            </h2>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                Descubra nossos cursos mais populares de robótica, criados por especialistas da indústria
                e aprovados por milhares de estudantes no mundo todo.
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 mb-12">
            @foreach ($courses as $course)
                <div class="group bg-gray-900 rounded-2xl border border-amber-500/20 shadow-xl shadow-amber-500/10 hover:shadow-2xl hover:shadow-amber-500/20 hover:border-amber-500/40 transition-all duration-300 overflow-hidden">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $course['image'] }}" alt="{{ $course['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                        
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ getLevelColor($course['level']) }}">
                                {{ $course['level'] }}
                            </span>
                        </div>

                        <div class="absolute top-4 right-4 bg-gray-900/90 backdrop-blur-sm border border-amber-500/30 rounded-full p-2 shadow-lg">
                            <div class="flex items-center space-x-1">
                                <x-heroicon-s-star class="w-4 h-4 text-amber-500 fill-current" />
                                <span class="text-sm font-semibold text-amber-400">{{ $course['rating'] }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2 group-hover:text-amber-400 transition-colors">
                            {{ $course['title'] }}
                        </h3>

                        <p class="text-gray-400 mb-4">por {{ $course['instructor'] }}</p>

                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach ($course['tags'] as $tag)
                                <span class="px-3 py-1 bg-amber-500/10 text-amber-400 border border-amber-500/30 rounded-full text-xs font-medium">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>

                        <div class="flex items-center space-x-4 text-sm text-gray-400 mb-6">
                            <div class="flex items-center">
                                <x-heroicon-o-users class="w-4 h-4 mr-1" />
                                {{ number_format($course['students'], 0, ',', '.') }} alunos
                            </div>
                            <div class="flex items-center">
                                <x-heroicon-o-clock class="w-4 h-4 mr-1" />
                                {{ $course['duration'] }}
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="text-2xl font-bold text-amber-400">
                                R${{ $course['price'] }}
                            </div>
                            <button class="group/btn bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 px-6 py-3 rounded-lg font-semibold hover:shadow-lg hover:shadow-amber-500/50 hover:scale-105 transition-all duration-300">
                                <span class="flex items-center">
                                    Inscreva-se
                                    <x-heroicon-o-arrow-right class="ml-2 w-4 h-4 group-hover/btn:translate-x-1 transition-transform" />
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center">
            <button class="group bg-gray-900 text-amber-400 border-2 border-amber-500/50 px-8 py-4 rounded-xl font-medium hover:bg-amber-500 hover:text-gray-900 transition-all duration-300">
                <span class="flex items-center justify-center">
                    Ver Todos os Cursos
                    <x-heroicon-o-arrow-right class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" />
                </span>
            </button>
        </div>
    </div>
</section>
