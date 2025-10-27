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
                <button
                    class="group bg-gray-900 text-amber-400 border-2 border-amber-500/50 px-8 py-4 rounded-xl font-medium hover:bg-amber-500 hover:text-gray-900 transition-all duration-300"
                >
                    <span class="flex items-center justify-center">
                        Ver Todos os Cursos
                        <x-heroicon-o-arrow-right class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" />
                    </span>
                </button>
            </a>
        </div>
    </div>
</section>
