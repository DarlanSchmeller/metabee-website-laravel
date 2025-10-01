<section class="relative py-20 overflow-hidden">
    <div class="absolute inset-0">
        <img 
            src="{{ asset('images/contato.jpg') }}" 
            alt="Fundo de Robótica" 
            class="w-full h-full object-cover"
        />
        <div class="absolute inset-0 bg-gradient-to-br from-gray-950/40 via-gray-900/70 to-gray-950/80"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-gray-900 to-gray-900/50 rounded-3xl p-12 border border-amber-500/20 shadow-2xl shadow-amber-500/10">
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-amber-500/20 to-yellow-500/20 rounded-2xl mb-6 border border-amber-500/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 0v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8m18 0L12 13 3 8"/>
                    </svg>
                </div>

                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Fale Conosco
                </h2>

                <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                    Tem dúvidas sobre nossos cursos? Quer saber mais sobre a Metabee? 
                    Nós adoraríamos ouvir você.
                </p>
            </div>

            @if (!$submitted)
            <form method="POST" action="{{ route('/') }}" class="space-y-6">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                            Nome Completo
                        </label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A12.042 12.042 0 0112 15c2.691 0 5.154.902 7.121 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                value="{{ old('name') }}" 
                                placeholder="João da Silva" 
                                class="w-full pl-12 pr-4 py-4 bg-gray-800/50 border border-amber-500/20 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
                                required
                            >
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                            Email
                        </label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 0v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8m18 0L12 13 3 8"/>
                            </svg>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                value="{{ old('email') }}" 
                                placeholder="joao@email.com" 
                                class="w-full pl-12 pr-4 py-4 bg-gray-800/50 border border-amber-500/20 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
                                required
                            >
                        </div>
                    </div>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-300 mb-2">
                        Mensagem
                    </label>
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-4 top-4 w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8-1.764 0-3.415-.507-4.793-1.374L3 20l1.374-4.207A8.963 8.963 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <textarea 
                            name="message" 
                            id="message" 
                            rows="5" 
                            placeholder="Conte-nos sobre suas dúvidas..." 
                            class="w-full pl-12 pr-4 py-4 bg-gray-800/50 border border-amber-500/20 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all resize-none"
                            required
                        >{{ old('message') }}</textarea>
                    </div>
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 px-8 py-4 rounded-xl font-semibold hover:shadow-lg hover:shadow-amber-500/50 hover:scale-105 transition-all duration-300 flex items-center justify-center space-x-2"
                >
                    <span>Enviar Mensagem</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </form>
            @else
            {{-- Success Message --}}
            <div class="py-12 text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-500/20 to-emerald-500/20 rounded-full mb-6 border border-green-500/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">Mensagem enviada!</h3>
                <p class="text-gray-400">
                    Obrigado por entrar em contato. Retornaremos em até 24 horas.
                </p>
            </div>
            @endif

            <div class="mt-6 text-center text-sm text-gray-500">
                Ao enviar esta mensagem, você concorda com nossa Política de Privacidade e Termos de Serviço.
            </div>
        </div>
    </div>
</section>
