<section class="relative bg-gray-950 py-20 overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-amber-500/20 to-yellow-500/20 rounded-2xl mb-6 border border-amber-500/30">
                <x-heroicon-o-chat-bubble-left-ellipsis class="w-8 h-8 text-amber-500" />
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                O que nossos alunos dizem
            </h2>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                Junte-se a milhares de alunos satisfeitos que transformaram suas carreiras através dos nossos cursos.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($testimonials as $testimonial)
                <div class="group relative bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8 hover:border-amber-500/40 transition-all duration-300 hover:shadow-xl hover:shadow-amber-500/10">
                    
                    <div class="absolute -top-4 -right-4 w-12 h-12 bg-gradient-to-br from-amber-500 to-yellow-500 rounded-xl flex items-center justify-center opacity-80 group-hover:opacity-100 transition-opacity">
                        <x-heroicon-o-chat-bubble-left-ellipsis class="w-6 h-6 text-gray-900" />
                    </div>

                    <div class="flex space-x-1 mb-4">
                        @for ($i = 0; $i < $testimonial['rating']; $i++)
                            <x-heroicon-s-star class="w-5 h-5 text-amber-500" />
                        @endfor
                    </div>

                    <p class="text-gray-300 text-base leading-relaxed mb-6">
                        "{{ $testimonial['conteudo'] }}"
                    </p>

                    <div class="flex items-center space-x-4">
                        <img src="{{ $testimonial['imagem'] }}" alt="{{ $testimonial['nome'] }}" class="w-12 h-12 rounded-full object-cover border-2 border-amber-500/30" />
                        <div>
                            <h4 class="text-white font-semibold">{{ $testimonial['nome'] }}</h4>
                            <p class="text-gray-400 text-sm">{{ $testimonial['cargo'] }}</p>
                        </div>
                    </div>

                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-amber-500/0 via-amber-500/0 to-yellow-500/0 group-hover:from-amber-500/5 group-hover:via-yellow-500/5 group-hover:to-amber-500/5 transition-all duration-300"></div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <p class="text-gray-400 text-sm">
                Junte-se a <span class="text-amber-500 font-semibold">500+ alunos</span> que confiam em nós para sua educação
            </p>
        </div>
    </div>
</section>
