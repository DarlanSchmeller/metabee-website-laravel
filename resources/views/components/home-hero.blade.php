<section class="relative bg-zinc-900 pt-20 pb-16 overflow-hidden">
    <x-hexagon-background />
    <div class="absolute top-20 right-20 w-96 h-96 bg-amber-500/20 rounded-full filter blur-3xl animate-pulse"></div>
    <div
        class="absolute bottom-20 left-20 w-96 h-96 bg-yellow-500/20 rounded-full filter blur-3xl animate-pulse"
        style="animation-delay: 1s"
    ></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
            <div class="max-w-md mx-auto lg:max-w-none lg:mx-0">
                <a href="{{ route("cursos.index") }}">
                    <div
                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-amber-500/20 to-yellow-500/20 border border-amber-500/30 rounded-full text-sm font-medium text-amber-400 mb-6 transition-transform duration-300 hover:scale-105 hover:shadow-lg"
                    >
                        <x-heroicon-o-cube class="w-4 h-4 mr-2 text-amber-500" />
                        {{ $news_message }}
                    </div>
                </a>

                <h1 class="text-4xl lg:text-6xl font-bold text-white leading-tight mb-6">
                    Domine a
                    <span
                        class="bg-gradient-to-r from-amber-400 via-yellow-500 to-amber-600 bg-clip-text text-transparent"
                    >
                        Robótica
                    </span>
                    & construa o futuro
                </h1>

                <p class="text-lg text-gray-300 mb-8 leading-relaxed">
                    Junte-se a outros estudantes aprendendo programação, robótica, IA e automação de ponta. Do iniciante
                    ao especialista, temos o curso perfeito para sua jornada.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 mb-12">
                    <a
                        href="{{ route("planos") }}"
                        class="group bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 px-8 py-4 rounded-xl font-semibold hover:shadow-lg hover:shadow-amber-500/50 hover:scale-105 transition-all duration-300"
                    >
                        <span class="flex items-center justify-center">
                            Começar agora
                            <x-heroicon-o-arrow-right
                                class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform"
                            />
                        </span>
                    </a>

                    <a
                        href="{{ route("cursos.index") }}"
                        class="group flex items-center justify-center px-8 py-4 border border-amber-500/50 rounded-xl font-medium text-amber-400 hover:bg-amber-500/10 transition-all duration-300"
                    >
                        <x-heroicon-o-play class="mr-2 w-5 h-5" />
                        Visualizar Cursos
                    </a>
                </div>

                <div class="flex items-center space-x-8">
                    <div class="flex items-center">
                        <x-heroicon-o-users class="w-5 h-5 text-amber-500 mr-2" />
                        <span class="text-sm text-gray-300">500+ Estudantes</span>
                    </div>
                    <div class="flex items-center">
                        <x-heroicon-o-academic-cap class="w-5 h-5 text-amber-500 mr-2" />
                        <span class="text-sm text-gray-300">120+ Cursos</span>
                    </div>
                </div>
            </div>

            <div class="mt-16 lg:mt-0">
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-amber-500 to-yellow-500 rounded-3xl transform rotate-3 opacity-50"
                    ></div>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-amber-500/50 to-yellow-500/50 rounded-3xl blur-xl"
                    ></div>
                    <div
                        class="relative w-full h-96 rounded-3xl border border-amber-500/30 bg-gradient-to-br from-amber-400 via-orange-300 to-amber-300 shadow-2xl shadow-amber-500/20"
                    >
                        <img
                            src="{{ asset("images/robot.png") }}"
                            alt="Robô"
                            class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-8 w-auto h-[130%] object-contain"
                        />
                    </div>

                    <div
                        class="absolute -bottom-6 -right-6 bg-gray-900 border border-amber-500/30 rounded-2xl p-4 shadow-xl shadow-amber-500/20"
                    >
                        <div class="text-center">
                            <div class="text-2xl font-bold text-amber-500">98%</div>
                            <div class="text-sm text-gray-300">Taxa de Sucesso</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
