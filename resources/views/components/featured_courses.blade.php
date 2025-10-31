<section class="py-20 bg-gray-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-white mb-4">Cursos em Destaque</h2>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                Descubra nossos cursos mais populares de robótica, criados por especialistas da indústria e aprovados
                por milhares de estudantes no mundo todo.
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 mb-12">
            @foreach ($courses as $course)
                <x-course-card-alternative :course="$course" />
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ route("cursos.index") }}">
                <x-button
                    background="bg-gray-900  border-2 border-amber-500/50"
                    px="px-8"
                    py="py-4"
                    hover="hover:bg-amber-500 hover:text-gray-900"
                    scale=""
                    text="text-amber-400"
                    font="font-medium"
                >
                    <span class="flex items-center justify-center">
                        Ver Todos os Cursos
                        <x-heroicon-o-arrow-right class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" />
                    </span>
                </x-button>
            </a>
        </div>
    </div>
</section>
